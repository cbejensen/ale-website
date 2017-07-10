<?php 
/*
 * This subclass is responsible for the itemlist.
 */
class ExportList extends ItemList
{
	public function __construct(&$conn)
	{
		/*
		 * Sets list type, list scope, the search term, sort field,
		 * sort order, the table fields, pagination options, and the data for each list item.
		 */
		if (!isset($_SESSION['item_export'])) throw new Exception('No Items have been selected for export.');
		$this->conn		=	$conn;
		$this->url['controller']	=	'admin';
		$this->url['action']		=	'showList';
		$this->url['subsect']		=	'inventory';
		$this->url['ltype']			=	'exp';
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
				'label'	=>	'',
				'table'	=> 	''
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
				'label'	=>	'Status',
				'table'	=> 	''
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
							'label'	=>	'Asset',
							'table'	=>	$field['field_name']
							//'action'=>	'sortList()'
					);
					break;
				case 'manufacturers.mnfr':
					$row['title']	=	$dataRow['mnfr'].' '.$dataRow['brand'].' '.$dataRow['model'].' '.$dataRow['function_desc'].' '.$dataRow['title_extn'];
					$this->fieldMeta[$k++]	=	array(
							'field'	=>	'title',
							'label'	=>	'Title',
							'table'	=>	$field['field_name']
					);
					break;
				case 'users.first_name':
					$row['modified_by']	=	$dataRow['first_name'] . ' ' . $dataRow['last_name'];
					$this->fieldMeta[$k++]	=	array(
							'field'	=>	'modified_by',
							'label'	=>	'Modified By',
							'table'	=>	'users.last_name'
					);
					break;
					// By default, just add the contents of the field to the column
				default:
					$f			=	explode('.', $field['field_name']);
					$row[$f[1]]	=	$dataRow[$f[1]];
					$this->fieldMeta[$k++]	=	array(
							'field'	=>	$f[1],
							'label'	=>	$field['label'],
							'table'	=>	$field['field_name']
					);
			}
		}
		return $row;
	}
	
	private function setTools()
	{
		$this->tools[]	=	array(	
				'name'	=>	'ALE QB',
				'action'=>	'exportToFile(\'quickbooks\')'
		);
		$this->tools[]	=	array(	
				'name'	=>	'Nov QB',
				'action'=>	'exportToFile(\'quickbooks_nov\')'
		);
		$this->tools[]	=	array(
				'name'	=>	'Ch. Advr.',
				'action'=>	'exportToFile(\'channelAdvisor\')'
		);
		$this->tools[]	=	array(
				'name'	=>	'EMP',
				'action'=>	'exportToFile(\'emp\')'
		);
	}
	
	private function setTitle()
	{
		$title	=	'Export Inventory';
		$this->breadcrumbs[]	=	array(
				'anchor'	=>	'Export to File',
				'src'		=>	''
		);
		$this->title 	=	$title;
		$this->url['title']		=	urlencode($title);
	}
	
	protected function getWhereClause($table, $tables)
	{
		switch ($this->lscope)
		{
			case 'all':
			default:
				$where	=	' WHERE (';
				foreach ($_SESSION['item_export'] as $exp)
				{
					$where	.=	'itemlist.aleAsset='.$exp.' OR ';
				}
				$where	=	substr($where, 0, -3) .	')';
				if (isset($this->searchKey)) {
					$where	.= 	' (';
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
// 		echo $this->query.$where;
		return $where;
	}
}