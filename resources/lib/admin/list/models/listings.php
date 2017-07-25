<?php

class ListingList extends DataList
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
		$this->url['subsect']		=	'gen_listings';
		$this->url['ltype']			=	'lis';
		$this->ltype	=	'listings';
		$this->breadcrumbs[]	=	array(
				'anchor'	=>	'Home',
				'src'		=>	'?controller=admin&action=home&subsect=home&title=Home'
		);
		$this->breadcrumbs[]	=	array(
				'anchor'	=>	'General Listings',
				'src'		=>	'?controller=admin&action=showList&subsect=gen_listings&title=All%20Listings&ltype=lis&lscp=all&rp=1&srt_f=037&srt_d=asc'
		);
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
// 		echo htmlentities($this->url);
		foreach ($this->data as $row)
		{
			$cells			=	$this->getCells($row);
			$this->rows[$row['id']]	=	$cells;
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
// 		// Item Status Field (For Status Thumbnails).
// 		$itemStatus	=	InvItem::getStatus($dataRow['aleAsset'], $this->conn);
// 		$imgs		=	array();
// 		foreach ($itemStatus as $stat)
// 		{
// 			$imgs[]	=	array(
// 					'src'	=>	"img/interface/status_$stat[0].png",
// 					'alt'	=>	$stat[1]
// 			);
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
				case 'general_listings.title_extn':
					continue;
					break;
					// If the field is an inv. item's asset #, add its prefix
// 				case 'itemlist.aleAsset':
// 					$row['id']		=	$dataRow['suffix'] . $dataRow['aleAsset'];
// 					$row['num_asset']		=	$dataRow['aleAsset'];
// 					$this->fieldMeta[$k++]	=	array(
// 							'field'	=>	'aleAsset',
// 							'label'	=>	'Asset'
// 					);
// 					break;
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
	
	protected function getFromClause($default_table, $tables)
	{
		$from		=	" FROM $default_table";
		
		//print_r($tables);
		
		foreach ($tables as $tf)
		{
			switch ($tf)
			{
				case 'manufacturers':
					$from	.=	' LEFT JOIN manufacturers ON general_listings.mnfrID = manufacturers.id';
					break;
				case 'models':
					$from	.=	' LEFT JOIN models ON general_listings.modelID = models.id';
					break;
				case 'brands':
					$from	.=	' LEFT JOIN brands ON general_listings.brandID = brands.id';
					break;
// 				case 'item_track':
// 					$from	.=	' LEFT JOIN item_track ON itemlist.track = item_track.id';
// 					break;
// 				case 'inv_batch':
// 					$from	.=	' LEFT JOIN inv_batch ON itemlist.batch = inv_batch.id';
// 					break;
// 				case 'vendors':
// 					$from	.=	' LEFT JOIN item_accounting ON itemlist.aleAsset = item_accounting.aleAsset';
// 					$from	.=	' LEFT JOIN vendors ON item_accounting.vendorID = vendors.id';
			}
		}
		return $from;
	}
	
	private function setTitle()
	{
		switch ($this->lscope)
		{
			case 'all':
				$title	=	'All Listings';
				$this->breadcrumbs[]	=	array(
						'anchor'	=>	'All Listings',
						'src'		=>	''
				);
				break;
			case 'complete':
				$title	=	'Complete Listings';
				$this->breadcrumbs[]	=	array(
						'anchor'	=>	'Complete Only',
						'src'		=>	''
				);
				break;
			case 'review':
				$title	=	'Review Listings';
				$this->breadcrumbs[]	=	array(
						'anchor'	=>	'Under Review',
						'src'		=>	''
				);
				break;
			case 'active':
				$title	=	'Active Listings';
				$this->breadcrumbs[]	=	array(
						'anchor'	=>	'All Active',
						'src'		=>	''
				);
				break;
			case 'inactive':
				$title	=	'Inactive Listings';
				$this->breadcrumbs[]	=	array(
						'anchor'	=>	'All Inactive',
						'src'		=>	''
				);
				break;
		}
		$this->title 	=	$title;
		$this->url['title']		=	urlencode($title);
	}
}