<?php

class SubitemList extends DataList
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
		$this->url['ltype']			=	'sub';
		$this->ltype	=	'subitem_of';
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
				//case 'models.model':
				//case 'brands.brand':
				//case 'models.function_desc':
				case 'itemlist.title_extn':
				case 'general_listings.title_extn':
					continue;
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
// 				case 'subitem_of':
// 					$from	.=	' LEFT JOIN subitem_of ON manufacturers.subitem_of = subitem_of.id';
// 					break;
// 				case 'models':
// 					$from	.=	' LEFT JOIN models ON general_listings.modelID = models.id';
// 					break;
// 				case 'brands':
// 					$from	.=	' LEFT JOIN brands ON general_listings.brandID = brands.id';
// 					break;
			}
		}
		return $from;
	}
	
	private function setTitle()
	{
		switch ($this->lscope)
		{
			case 'all':
				$title	=	'All QB Master Items';
				break;
			case 'complete':
				$title	=	'Complete QB Master Items';
				break;
			case 'review':
				$title	=	'Review QB Master Items';
				break;
		}
		$this->title 	=	$title;
		$this->url['title']		=	urlencode($title);
	}
}