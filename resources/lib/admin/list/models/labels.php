<?php 
/*
 * This subclass is responsible for the itemlist.
 */
class LabelList extends DataList
{
	public function __construct(&$conn)
	{
		/*
		 * Sets list type, list scope, the search term, sort field,
		 * sort order, the table fields, pagination options, and the data for each list item.
		 */
		$this->conn		=	$conn;
		$this->url['controller']	=	'admin';
		$this->url['action']		=	'showList';
		$this->url['subsect']		=	'misc_records';
		$this->url['ltype']			=	'lbl';
		$this->ltype	=	'labels';
		$this->initFields();
		$this->setFilters();
		$this->setPaginationOptions();
		$this->setQuery();
		$this->setData();
		$this->setTitle();
		$this->links	=	$this->createLinks(4, $this->list_class);
		//$this->setOptions();
	}
	
	public function setRows()
	{
		foreach ($this->data as $row)
		{
			$cells			=	$this->getCells($row);
			$this->rows[]	=	$cells;
		}
	}
	
	protected function getCells($dataRow)
	{
		$row	=	array(); // The output array of cell content
		$k		=	0;
		
		// Select Field (For Checkboxes). Enables selection of multiple items.
		$select				=	'';
		$row['select']		=	$select;
		$this->fieldMeta[$k++]	=	array(
				'field'	=>	'select',
				'label'	=>	''
		);
		// Label Range Field
// 		$ranges		=	array();
// 		foreach ($dataRow as $row)
// 		{
// 			$ranges[]	=	array(
// 					'src'	=>	"img/interface/status_$stat[0].png",
// 					'alt'	=>	$stat[1]
// 					);
// 		}
// 		$status	=	$imgs;
// 		$row['item_status']	=	$status;
// 		$this->fieldMeta[$k++]	=	array(
// 				'field'	=>	'item_status',
// 				'label'	=>	'Status'
// 		);
		
		// Begin default rows
		foreach ($this->fields as $field)
		{
			/*
			 * THIS SWITCH can be used to alter the default rendering of a field.
			 * The default setting creates a column with the label on file, and inserts the raw data.
			 */
			switch ($field['field_name'])
			{
				// If the field is an inv. item's prefix, skip creating a column
				case 'item_track.suffix':
				case 'models.model':
				case 'brands.brand':
				case 'models.function_desc':
				case 'itemlist.title_extn':
					continue;
					break;
					// If the field is an inv. item's asset #, add its prefix
				case 'itemlist.aleAsset':
					$row['aleAsset']		=	$dataRow['suffix'] . $dataRow['aleAsset'];
					$row['id']				=	$dataRow['aleAsset'];
					$this->fieldMeta[$k++]	=	array(
							'field'	=>	'aleAsset',
							'label'	=>	'Asset'
					);
					break;
				case 'manufacturers.mnfr':
					$row['title']	=	$dataRow['mnfr'].' '.$dataRow['brand'].' '.$dataRow['model'].' '.$dataRow['function_desc'].' '.$dataRow['title_extn'];
					$this->fieldMeta[$k++]	=	array(
							'field'	=>	'title',
							'label'	=>	'Title'
					);
					break;
					// By default, just add the contents of the field to the column
				default:
					$f			=	explode('.', $field['field_name']);
					$row[$f[1]]	=	$dataRow[$f[1]];
					$this->fieldMeta[$k++]	=	array(
							'field'	=>	$f[1],
							'label'	=>	$field['label']
					);
			}
		}
		return $row;
	}
	
	protected function setQuery()
	{
		/*
		 * Define default table/field, to be used for query construction.
		 * This is the table that will have other tables joined to it.
		 */
// 		$default_table	=	array('asset_labels', 'label_num');
			
		
// 		// $tables[$x] is to contain a set of unique table names, necessary for the JOIN clauses of the query.
// 		$tables		=	array();
// 		foreach ($this->fields as $field)
// 		{
// 			$table		=	explode('.', $field['field_name']);
// 			if ($table[0] == $default_table[0]) continue; // Keep the default table out of the JOIN clauses.
// 			$tables[]	=	$table[0];
// 		}
// 		$tables 	=	array_unique($tables); // Ensure a table is JOINed once.
		
		// Construct the query
// 		$select		=	$this->getSelectClause($default_table[0] . '.' . $default_table[1]);
// 		$from		=	$this->getFromClause($default_table[0], $tables);
// 		$where		=	$this->getWhereClause($default_table[0], $tables);
		$q	=	"SELECT label_num, asset_type, purpose, serial_num, yom, notes, value, assigned_by, date_added
				FROM asset_labels";
		
		// Add order clause, set query
		//$order			=	" ORDER BY $this->sortField $this->sortOrder";
		$this->query	=	$q;// . $order;
		
	}
	
	protected function setData()
	{
		/*
		 * Given parameters set at construction of object, gather data from the database.
		 * Returns void, sets $data parameter, an array representative of each item in the list.
		 * Two-dimensional - parameters for each item can be accessed via its db table id.
		 */
		
		// Get results
		$r	=	db_query($this->query, $this->conn);
		
		$results	=	array();
		$count		=	0;
		
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		//while ($row = $r->fetch_array(MYSQLI_ASSOC))
		{
			$r->data_seek($j);
			$row = $r->fetch_array(MYSQLI_ASSOC);
// 			print_r($row['label_num']);
			static $first_run	=	true;
			static $restart		=	false;
			static $begin		=	0;
			static $prev		=	0;
			
			
			if ($first_run === true) {
				$begin		=	$row['label_num'];
				$prev		=	array(
						'label_num'		=>	$row['label_num'],
						'asset_type'	=>	$row['asset_type'],
						'assigned_by'	=>	$row['assigned_by'],
						'notes'			=>	$row['notes']
				);
				$first_run	=	false;
				continue;
			}
			
			if ($j == $r->num_rows - 1) 
			{
				if ($restart === true) {
					$results[]			=	$row;
					$count++;
					break;
				} else {
					$row['label_num']	=	$begin . ' - ' . $row['label_num'];
					$prev				=	array(
							'label_num'		=>	$row['label_num'],
							'asset_type'	=>	$row['asset_type'],
							'assigned_by'	=>	$row['assigned_by'],
							'notes'			=>	$row['notes']
					);
					$results[]			=	$row;
					$count++;
					break;
				}
			}
			
			if ($restart === true) {
				$begin		=	$row['label_num'] - 1;
				$prev		=	array(
						'label_num'		=>	$row['label_num'],
						'asset_type'	=>	$row['asset_type'],
						'assigned_by'	=>	$row['assigned_by'],
						'notes'			=>	$row['notes']
				);
				$restart	=	false;
				continue;
			}
			
			// If the current label is one more than the prev., reset the 'prev' val and continue
			if ($row['label_num'] == 1 + $prev['label_num'] &&
				$row['asset_type'] == $prev['asset_type'] &&
				$row['assigned_by'] == $prev['assigned_by'] &&
				$row['notes'] == $prev['notes']) {
					$prev	=	array(
							'label_num'		=>	$row['label_num'],
							'asset_type'	=>	$row['asset_type'],
							'assigned_by'	=>	$row['assigned_by'],
							'notes'			=>	$row['notes']
					);
				continue;
			} else {
				if ($begin == $prev['label_num']) {
					$row['label_num']	=	$begin;
				} else {
					$row['label_num']	=	$begin . ' - ' . $prev['label_num'];
				}
					$prev				=	array(
							'label_num'		=>	$row['label_num'],
							'asset_type'	=>	$row['asset_type'],
							'assigned_by'	=>	$row['assigned_by'],
							'notes'			=>	$row['notes']
					);
				$results[]			=	$row;
				$count++;
				$restart			=	true;
			}
		}
		
		// Populate list data
		for ($j = 0 ; $j < $count ; $j++)
		{
			$this->data[$results[$j]['label_num']]	=	$results[$j];
		}
	}
	
	private function setTitle()
	{
		switch ($this->lscope)
		{
			case 'all':
				$title	=	'All Labels';
				break;
// 			case 'complete':
// 				$title	=	'Complete General Listing Ads';
// 				break;
// 			case 'review':
// 				$title	=	'Review General Listing Ads';
// 				break;
		}
		$this->title 	=	$title;
		$this->url['title']	=	urlencode($title);
	}
	
	private function setOptions()
	{
		// Vendors
		$q		=	"SELECT id, vendor FROM vendors WHERE active=1 ORDER BY vendor";
		$r		=	db_query($q, $this->conn);
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$this->options['vendors'][$row['id']]	=	$row['vendor'];
		}
		
		// Manufacturers
		$q		=	"SELECT id, mnfr FROM manufacturers WHERE active=1 ORDER BY mnfr";
		$r		=	db_query($q, $this->conn);
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$this->options['mnfrs'][$row['id']]	=	$row['mnfr'];
		}
		
		// Models
		$q		=	"SELECT id, model, function_desc FROM models WHERE active=1 ORDER BY model";
		// 		$q		=	"SELECT model_mnfr.modelID, models.model FROM model_mnfr
		// 					JOIN models ON model_mnfr.modelID = models.id
		// 					WHERE models.active=1 ORDER BY models.model";
		$r		=	db_query($q, $this->conn);
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$this->options['models'][$row['id']]	=	$row['model'] . ' [' . $row['function_desc'] .']';
		}
		
		// Brands
		$q		=	"SELECT id, brand FROM brands WHERE active=1 ORDER BY brand";
		$r		=	db_query($q, $this->conn);
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$this->options['brands'][$row['id']]	=	$row['brand'];
		}
		
		// Batches
		$q		=	"SELECT id, batch_name FROM inv_batch ORDER BY batch_name";
		$r		=	db_query($q, $this->conn);
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$this->options['batch'][$row['id']]	=	$row['batch_name'];
		}
		
		// Nov. Prev. Owners
		$q		=	"SELECT id, prev_owner FROM emp_prev_owners ORDER BY prev_owner";
		$r		=	db_query($q, $this->conn);
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$this->options['prev_owner'][$row['id']]	=	$row['prev_owner'];
		}
		
		// Statuses
		$q		=	"SELECT id, status FROM item_status ORDER BY status";
		$r		=	db_query($q, $this->conn);
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$this->options['status'][$row['id']]	=	$row['status'];
		}
		
		// model_mnfr
		$q		=	"SELECT mnfrID, modelID FROM model_mnfr WHERE active=1";
		$r		=	db_query($q, $this->conn);
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$this->options['model_mnfr'][]	=	array('mnfr'=>$row['mnfrID'], 'model'=>$row['modelID']);
		}
		
		// mnfr_brand
		$q		=	"SELECT mnfrID, brandID FROM mnfr_brand WHERE active=1";
		$r		=	db_query($q, $this->conn);
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$this->options['mnfr_brand'][]	=	array('mnfr'=>$row['mnfrID'], 'brand'=>$row['brandID']);
		}
		
		//functions
		$q		=	"SELECT id, function_desc FROM models WHERE active=1";
		$r		=	db_query($q, $this->conn);
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$this->options['functions'][$row['id']]	=	$row['function_desc'];
		}
	}
}
