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
