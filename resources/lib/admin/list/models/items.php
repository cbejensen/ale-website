<?php 
/*
 * This subclass is responsible for the itemlist.
 */
class ItemList extends DataList
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
		$this->url['subsect']		=	'inventory';
		$this->url['ltype']			=	'itm';
		$this->ltype	=	'items';
		$this->breadcrumbs[]	=	array(
				'anchor'	=>	'Home',
				'src'		=>	'?controller=admin&action=home&subsect=home&title=Home'
		);
		$this->breadcrumbs[]	=	array(
				'anchor'	=>	'Inventory',
				'src'		=>	'?controller=admin&action=showList&subsect=inventory&title=List%20Test&ltype=itm&lscp=all&rp=1&srt_f=019&srt_d=asc'
		);
		$this->initFields();
		$this->setFilters();
		$this->setPaginationOptions();
		$this->setQuery();
		$this->setData();
		$this->setTitle();
		$this->links	=	$this->createLinks(4, $this->list_class);
		$this->setOptions();
		$this->setTools();
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
		// Item Status Field (For Status Thumbnails).
		$itemStatus	=	InvItem::getStatus($dataRow['aleAsset'], $this->conn);
		$imgs		=	array();
		foreach ($itemStatus as $stat)
		{
			$imgs[]	=	array(
					'name'	=>	$stat[0],
					'src'	=>	"img/interface/status_$stat[0].png",
					'alt'	=>	$stat[1]
					);
		}
		$status	=	$imgs;
		$row['item_status']	=	$status;
		$this->fieldMeta[$k++]	=	array(
				'field'	=>	'item_status',
				'label'	=>	'Status'
		);
		
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
				case 'users.last_name':
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
				case 'users.first_name':
					$row['modified_by']	=	$dataRow['first_name'] . ' ' . $dataRow['last_name'];
					$this->fieldMeta[$k++]	=	array(
							'field'	=>	'modified_by',
							'label'	=>	'Modified By'
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
	
	private function setTools()
	{
		$this->tools[]	=	array(	
				'name'	=>	'Export',
				'action'=>	'doThis()'
		);
		$this->tools[]	=	array(	
				'name'	=>	'Delete',
				'action'=>	'deleteInvItems()'
		);
		
		if ($this->lscope != 'complete')
		{
			$this->tools[]	=	array(
					'name'	=>	'Commit',
					'action'=>	'commitInvItems()'
			);
			$this->tools[]	=	array(
					'name'	=>	'Mark Complete',
					'action'=>	'markInvItemsComplete()'
			);
		}
		
		if ($this->lscope != 'review')
		{
			$this->tools[]	=	array(
					'name'	=>	'Create Listings',
					'action'=>	'doThis()'
			);
			$this->tools[]	=	array(
					'name'	=>	'Withdraw Listings',
					'action'=>	'doThis()'
			);
		}
	}
	
	private function setTitle()
	{
		switch ($this->lscope)
		{
			case 'all':
				$title					=	'All Items';
				$this->breadcrumbs[]	=	array(
						'anchor'	=>	'All Inventory',
						'src'		=>	''
				);
				break;
			case 'complete':
				$title					=	'Complete Items';
				$this->breadcrumbs[]	=	array(
						'anchor'	=>	'Completed Inventory',
						'src'		=>	''
				);
				break;
			case 'review':
				$title					=	'Review Items';
				$this->breadcrumbs[]	=	array(
						'anchor'	=>	'Review List',
						'src'		=>	''
				);
				break;
		}
		$this->title 	=	$title;
		$this->url['title']		=	urlencode($title);
	}
	
	private function setOptions()
	{
		$options	=	ItemList::getOptions($this->conn);
		foreach ($options as $key => $value)
		{
			$this->options[$key]	=	$value;
		}
	}
	
	public static function getOptions($conn)
	{
		$options	=	array();
		$spec		=	array(
				array(
						'key'		=>	'vendors',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, vendor FROM vendors WHERE active=1 ORDER BY vendor",
						'subject'	=>	function($row){return $row['vendor'];}
				),
				array(
						'key'		=>	'mnfrs',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, mnfr FROM manufacturers WHERE active=1 ORDER BY mnfr",
						'subject'	=>	function($row){return $row['mnfr'];}
				),
				array(
						'key'		=>	'brands',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, brand FROM brands WHERE active=1 ORDER BY brand",
						'subject'	=>	function($row){return $row['brand'];}
				),
				array(
						'key'		=>	'batch',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, batch_name FROM inv_batch ORDER BY batch_name",
						'subject'	=>	function($row){return $row['batch_name'];}
				),
				array(
						'key'		=>	'prev_owner',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, prev_owner FROM emp_prev_owners ORDER BY prev_owner",
						'subject'	=>	function($row){return $row['prev_owner'];}
				),
				array(
						'key'		=>	'status',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, status FROM item_status ORDER BY status",
						'subject'	=>	function($row){return $row['status'];}
				),
// 				array(
// 						'key'		=>	'batch',
// 						'idKey'		=>	'id',
// 						'query'		=>	"SELECT id, batch_name FROM inv_batch ORDER BY batch_name",
// 						'subject'	=>	'batch_name'
// 				),
				array(
						'key'		=>	'functions',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, function_desc FROM models WHERE active=1",
						'subject'	=>	function($row){return $row['function_desc'];}
				),
				array(
						'key'		=>	'tracks',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, track FROM item_track",
						'subject'	=>	function($row){return $row['track'];}
				),
				array(
						'key'		=>	'item_condition',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, item_condition FROM item_condition",
						'subject'	=>	function($row){return $row['item_condition'];}
				),
				array(
						'key'		=>	'cosmetic',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, cosmetic FROM cosmetic_status",
						'subject'	=>	function($row){return $row['cosmetic'];}
				),
				array(
						'key'		=>	'testing',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, testing FROM testing_status",
						'subject'	=>	function($row){return $row['testing'];}
				),
				array(
						'key'		=>	'shipping_class',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, shipping_class FROM shipping_class",
						'subject'	=>	function($row){return $row['shipping_class'];}
				),
				array(
						'key'		=>	'emp_status',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, status FROM emp_status",
						'subject'	=>	function($row){return $row['status'];}
				),
				array(
						'key'		=>	'models',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, model, function_desc FROM models WHERE active=1 ORDER BY model",
						'subject'	=>	function($row){return $row['model'] . ' [' . $row['function_desc'] .']';}
				),
				array(
						'key'		=>	'model_mnfr',
						'idKey'		=>	'',
						'query'		=>	"SELECT mnfrID, modelID FROM model_mnfr WHERE active=1",
						'subject'	=>	function($row){return array('mnfr'=>$row['mnfrID'], 'model'=>$row['modelID']);}
				),
				array(
						'key'		=>	'mnfr_brand',
						'idKey'		=>	'',
						'query'		=>	"SELECT mnfrID, brandID FROM mnfr_brand WHERE active=1",
						'subject'	=>	function($row){return array('mnfr'=>$row['mnfrID'], 'brand'=>$row['brandID']);}
				),
				array(
						'key'		=>	'users',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, first_name, last_name FROM users",
						'subject'	=>	function($row){return $row['first_name'] . ' ' . $row['last_name'];}
				),
				array(
						'key'		=>	'emp_category',
						'idKey'		=>	'id',
						'query'		=>	"SELECT id, category, subcategory FROM emp_category",
						'subject'	=>	function($row){return array('category'=>$row['category'], 'subcategory'=>$row['subcategory']);}
				),
				array(
						'key'		=>	'ale_category',
						'idKey'		=>	'ale_category',
						'query'		=>	"SELECT id, ale_category, ale_subcategory FROM ale_category ORDER BY ale_category, ale_subcategory",
						'subject'	=>	function($row){return $row['ale_subcategory'];}
				),
		);
		
		foreach ($spec as $specs)
		{
			$q	=	$specs['query'];
			$r	=	db_query($q, $conn);
			for ($j = 0 ; $j < $r->num_rows ; $j++)
			{
				$r->data_seek($j);
				$row		=	$r->fetch_array(MYSQLI_ASSOC);
				if ($specs['key'] == 'ale_category') {
					$options[$specs['key']][$row[$specs['idKey']]][$row['id']]	=	$specs['subject']($row);
				}
				elseif ($specs['idKey'] !== '') {
					$options[$specs['key']][$row[$specs['idKey']]]	=	$specs['subject']($row);
				} else {
					$options[$specs['key']][]	=	$specs['subject']($row);
				}
			}
		}
		return $options;
	}
}
