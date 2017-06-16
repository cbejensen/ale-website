<?php
/*
 * The DataList class models the graphical list interfaces.
 * Upon construction of an object, the list will populate based on 
 * given parameters (or defaults).
 *
 */

class DataList extends Paginator
{
	public	$ltype, 
			$lscope, 
			$searchKey, 
			$sortField,
			$sortOrder,
			$links,
			$result_pg,
			$list_class,
			$title;
	
	public 	$url			=	array();
	public	$breadcrumbs	=	array();
	public	$tools			=	array();
	
	public 	$data			=	array();
	public	$rows			=	array();
	public	$options		=	array();
			
	protected 	$fieldMap 	=	array();
	protected	$fields		=	array();
	public		$fieldMeta	=	array();
	
	public function __construct(&$conn)
	{
		/*
		 * Sets list type, list scope, the search term, sort field,
		 * sort order, the table fields, pagination options, and the data for each list item.
		 */
		$this->conn		=	$conn;
		$this->url['controller']	=	'admin';
		$this->url['action']		=	'showList';
		$this->setFieldMap();
		$this->setListType();
		$this->setListScope();
		$this->setSearchKey();
		$this->setFields();
		$this->setSortField();
		$this->setPaginationOptions();
		$this->setQuery();
		$this->setData();
		$this->links	=	$this->createLinks(4, $this->list_class);
		$this->setOptions();
	}
	
	public function getHeaders()
	{
		require	ADMIN_PATH . '/list/list_head.php';
	}
	
	public function getRows()
	{
		if (isset($_POST['isAjax']))
		{
			$rows	=	array();
			foreach ($this->data as $row)
			{
				$cells	=	$this->getCells($row);
				$rows[]	=	$cells;
			}
			echo json_encode($rows);
		} else {
			$class	=	0;
			foreach ($this->data as $row)
			{
				require ADMIN_PATH . '/list/list_row.php';
				$class++;
			}
		}
	}
	
	public function sendUpdates()
	{
		$json	=	array(
				'rows'		=>	$this->rows,
				'results'	=>	$this->total
		);
		echo json_encode($json);
	}
	
	protected function initFields()
	{
		$this->setFieldMap();
		$this->setFields();
	}
	
	protected function setFieldMap()
	{
		/*
		 * Takes no args, simply goes into database to retreive names of necessary fields.
		 */
		$q		=	"SELECT id, field_name, label FROM field_map";
		$r		=	db_query($q, $this->conn);
		$count	=	$r->num_rows;
		for ($j = 0 ; $j < $count ; $j++)
		{
			$r->data_seek($j);
			$row						=	$r->fetch_array(MYSQLI_ASSOC);
			$this->fieldMap[$row['id']]	=	array('field_name' => $row['field_name'], 'label' => $row['label']);
		}
	}
	
	protected function setFields()
	{
		/*
		 * Sets the fields property, which is an array of field names.
		 * This property represents the default fields, based on entries in the database, in addition to any added fields.
		 */
		$q		=	"SELECT default_fields.field_name, field_map.label FROM default_fields
		LEFT JOIN field_map ON default_fields.field_name = field_map.field_name
		WHERE list='$this->ltype' AND field_order!=0 ORDER BY field_order";
		$r		=	db_query($q, $this->conn);
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row			=	$r->fetch_array(MYSQLI_ASSOC);
			$this->fields[]	=	array('field_name' => $row['field_name'], 'label' => $row['label']);
		}
		
		
		
		/*
		 * Looks for $_GET['f'], which is a comma-separated array of additional field ids.
		 * This method takes those ids and maps them to their names, complete with table prefixes.
		 */
		if (isset($_GET['f']))
		{
			$this->url['f']	= $_GET['f'];
			$fields	=	explode(',', $_GET['f']);
			foreach ($fields as $fieldId)
			{
				if (in_array($fieldId, $this->fieldMap))
				{
					$this->fields[]	=	array('field_name' => $this->fieldMap[$fieldId]['field_name'], 'label' => $this->fieldMap[$fieldId]['label']);
				} else {
					// Given ID did not have map value.
					// Throw notice? Log warning?
					continue;
				}
			}
		}
	}

	protected function setFilters()
	{
		$this->setListScope();
		$this->setSearchKey();
		$this->setSortField();
	}
	
	protected function setListScope()
	{
		/*
		 * Set the scope property. This property determines the set of results based on completion/review status.
		 * Takes no args, looks for $_GET['lscp'], the URL param for 'list scope'
		 */
		if (isset($_GET['lscp']))
		{
			$this->url['lscp'] = $_GET['lscp'];
			switch ($_GET['lscp'])
			{
				case 'all':
					$this->lscope	=	'all';
					break;
				case 'complete':
					$this->lscope	=	'complete';
					break;
				case 'review':
					$this->lscope	=	'review';
					break;
				case 'active':
					$this->lscope	=	'active';
					break;
				case 'inactive':
					$this->lscope	=	'inactive';
					break;
				default:
					throw new Exception('Invalid List Scope');
					break;
			}
		} else {
			$this->lscope	=	'all';
		}
	}
	
	protected function setSearchKey()
	{
		/*
		 * Sets the searchKey property, which is used to filter results based on the terms given.
		 * Set $searchKey as an array of the given input (delimited by spaces), else set it to NULL if not supplied.
		 *
		 */
		if (isset($_GET['q']))
		{
			$q				=	mysql_entities_fix_string($this->conn, $_GET['q']);
			$this->searchKey	=	explode(' ', $q);
			$this->url['q']	= urlencode($_GET['q']);
		} else {
			$this->searchKey	=	null;
		}
	}
	
	protected function setSortField()
	{
		/*
		 * Sets the sortField property, which determines the field to sort by.
		 * Default to ALE Asset is $_GET['srt_f' is not set.
		 * Given the id of a field, map it to its name.
		 */
		if (isset($_GET['srt_f']))
		{
			if (array_key_exists($_GET['srt_f'], $this->fieldMap))
			{
				$this->sortField	=	$this->fieldMap[$_GET['srt_f']]['field_name'];
				$this->url['srt_f']			=	$_GET['srt_f'];
			} else {
				// Defaults to ALE Asset if given id is invalid, sends error report
				$this->sortField	=	'itemlist.aleAsset';
				// THROW NOTICE
			}
		} else {
			// Defaults to ALE Asset if $_GET['srt_f'] is not set.
			$this->sortField	=	'itemlist.aleAsset';
		}
		
		if (isset($_GET['srt_d']))
		{
			$this->url['srt_d']	= $_GET['srt_d'];
			switch ($_GET['srt_d'])
			{
				case 'asc':
					$this->sortOrder	=	'ASC';
					break;
				case 'desc':
					$this->sortOrder	=	'DESC';
					break;
				default:
					$this->sortOrder	=	'ASC';
			}
		}
	}
	
	protected function setPaginationOptions()
	{
		/*
		 * Set pagination options. 
		 * The limit is the number of results per page.
		 * The result_pg is the current page of results
		 * The list class styles the pagination links.
		 * Each property is set to null by default.
		 */ 
		if (isset($_GET['limit']) && is_numeric($_GET['limit']))
		{
			$this->limit	=	$_GET['limit'];
		} elseif (isset($_COOKIE['list-limit'])) {
			$this->limit	=	$_COOKIE['list-limit'];
		} else {
			$this->limit	=	null;
		}
		$this->result_pg	=	(isset($_GET['rp'])) ? htmlspecialchars($_GET['rp'], ENT_QUOTES) : null;
		$this->list_class	=	(isset($_GET['lc'])) ? htmlspecialchars($_GET['lc'], ENT_QUOTES) : null;
	}
	
	protected function setQuery()
	{
		/* 
		 * Define default table/field, to be used for query construction. 
		 * This is the table that will have other tables joined to it.
		 */
		switch ($this->ltype)
		{
			case 'items':
				$default_table	=	array('itemlist', 'aleAsset');
				break;
			case 'listings':
				$default_table	=	array('general_listings', 'id');
				break;
			case 'gl_ads':
				$default_table	=	array('adverts_listings', 'id');
				break;
			case 'item_ads':
				$default_table	=	array('adverts_items', 'id');
				break;
			case 'subitem_of':
				$default_table	=	array('subitem_of', 'id');
				break;
			case 'mnfr':
				$default_table	=	array('manufacturers', 'id');
				break;
			case 'models':
				$default_table	=	array('models', 'id');
				break;
			case 'brands':
				$default_table	=	array('brands', 'id');
				break;
			case 'labels':
				$default_table	=	array('labels', 'id');
				break;
			case 'vendors':
				$default_table	=	array('vendors', 'id');
				break;
			case 'batches':
				$default_table	=	array('inv_batch', 'id');
				break;
			default:
				throw new Exception('Invalid list type.');
				break;
		}
		
		// $tables[$x] is to contain a set of unique table names, necessary for the JOIN clauses of the query.
		$tables		=	array();
		foreach ($this->fields as $field)
		{
			$table		=	explode('.', $field['field_name']);
			if ($table[0] == $default_table[0]) continue; // Keep the default table out of the JOIN clauses.
			$tables[]	=	$table[0];
		}
		$tables 	=	array_unique($tables); // Ensure a table is JOINed once.
		
		// Construct the query
		$select		=	$this->getSelectClause($default_table[0] . '.' . $default_table[1]);
		$from		=	$this->getFromClause($default_table[0], $tables);
		$where		=	$this->getWhereClause($default_table[0], $tables);
		
		// Add order clause, set query
		$order			=	" ORDER BY $this->sortField $this->sortOrder";
		$this->query	=	$select . $from . $where . $order;
		
	}
	
	protected function getSelectClause($default_field)
	{
		$select		=	"SELECT $default_field, ";
		foreach ($this->fields as $field)
		{
			if ($field['field_name'] == $default_field) continue;
			$select	.=	$field['field_name'] . ', ';
		}
		$select		=	substr($select, 0, -2); // Remove last comma and space
		return $select;
	}
	
	protected function getFromClause($default_table, $tables)
	{
		$from		=	" FROM $default_table";
		
		//print_r($tables);
		
		foreach ($tables as $tf)
		{
			switch ($tf)
			{
				case 'manufacturers':
					$from	.=	' LEFT JOIN manufacturers ON itemlist.mnfrID = manufacturers.id';
					break;
				case 'models':
					$from	.=	' LEFT JOIN models ON itemlist.modelID = models.id';
					break;
				case 'brands':
					$from	.=	' LEFT JOIN brands ON itemlist.brandID = brands.id';
					break;
				case 'item_track':
					$from	.=	' LEFT JOIN item_track ON itemlist.track = item_track.id';
					break;
				case 'inv_batch':
					$from	.=	' LEFT JOIN inv_batch ON itemlist.batch = inv_batch.id';
					break;
				case 'vendors':
					$from	.=	' LEFT JOIN item_accounting ON itemlist.aleAsset = item_accounting.aleAsset';
					$from	.=	' LEFT JOIN vendors ON item_accounting.vendorID = vendors.id';
			}
		}
		return $from;
	}
	
	protected function getWhereClause($table, $tables)
	{
		switch ($this->lscope)
		{
			case 'all':
				if (isset($this->searchKey)) {
					$where	= 	' WHERE (';
				} else {
					$where	=	'';
				}
				break;
			case 'complete':
				$where	=	" WHERE $table.reviewed=1";
				if (isset($this->searchKey)) {
					$where .= ' AND (';
				}
				break;
			case 'review':
				$where	=	" WHERE $table.reviewed=0";
				if (isset($this->searchKey)) {
					$where .= ' AND (';
				}
				break;
			case 'active':
				$where	=	" WHERE $table.active=1";
				if (isset($this->searchKey)) {
					$where .= ' AND (';
				}
				break;
			case 'inactive':
				$where	=	" WHERE $table.active=0";
				if (isset($this->searchKey)) {
					$where .= ' AND (';
				}
				break;
		}
		
		if (isset($this->searchKey)) {
			foreach ($tables as $tf)
			{
				switch ($tf)
				{
					case 'manufacturers':
							foreach ($this->searchKey as $key)
							{
								$where	.=	" manufacturers.mnfr LIKE '%$key%' OR";
							}
						break;
					case 'models':
							foreach ($this->searchKey as $key)
							{
								$where	.=	" models.model LIKE '%$key%' OR 
											models.function_desc LIKE '%$key%' OR";
							}
						break;
					case 'brands':
							foreach ($this->searchKey as $key)
							{
								$where	.=	" brands.brand LIKE '%$key%' OR";
							}
						break;
				}
			}
			$where			=	substr($where, 0, -3); // Remove last ' OR'
			$where 			.= ')'; // Pairs with the paren opened at first switch, applied when $this->searchKey is set.
		}
		return $where;
	}
	
	protected function setData()
	{
		/*
		 * Given parameters set at construction of object, gather data from the database.
		 * Returns void, sets $data parameter, an array representative of each item in the list.
		 * Two-dimensional - parameters for each item can be accessed via its db table id.
		 */
		
		// Get results
		$r	=	$this->getPageData($this->limit, $this->result_pg, 1);
		
		// Declare field to use as $this->data index
		switch ($this->ltype)
		{
			case 'items':
				$id	=	'aleAsset';
				break;
			case 'labels':
				$id	=	'label_num';
				break;
			default:
				$id	=	'id';
		}
		
		// Populate list data
		for ($j = 0 ; $j < $r->count ; $j++)
		{
			$this->data[$r->data[$j][$id]]	=	$r->data[$j];	
		}
		
		$this->url['page']	=	$this->page;
	}
	
	// 	private function setListType()
	// 	{
	// 		/*
	// 		 * Determine which list to generate.
	// 		 * Takes no args, looks for $_GET['ltype'], the URL param for "list type"
	// 		 */
	// 		if (isset($_GET['ltype']))
		// 		{
		// 			switch ($_GET['ltype'])
		// 			{
		// 				case 'itm':
		// 					$this->ltype	=	'items';
		// 					break;
		// 				case 'lis':
		// 					$this->ltype	=	'listings';
		// 					break;
		// 				case 'ads':
		// 					$this->ltype	=	'ads';
		// 					break;
		// 				case 'sub':
		// 					$this->ltype	=	'subitem_of';
		// 					break;
		// 				case 'mnf':
		// 					$this->ltype	=	'mnfr';
		// 					break;
		// 				case 'mod':
		// 					$this->ltype	=	'models';
		// 					break;
		// 				case 'brd':
		// 					$this->ltype	=	'brands';
		// 					break;
		// 				case 'lbl':
		// 					$this->ltype	=	'labels';
		// 					break;
		//				case 'sub':
		//					$this->ltype	=	'subitems';
		// 					break;
		// 				case 'ven':
		// 					$this->ltype	=	'vendors';
		// 					break;
		// 				case 'bat':
		// 					$this->ltype	=	'batches';
		// 					break;
		// 				default:
		// 					throw new Exception('Invalid List Type');
		// 					break;
		// 			}
		// 		} else {
		// 			throw new Exception('Missing List Type');
		// 		}
		// 	}
}