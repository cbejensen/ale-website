<?php
/*
 * The List class models the graphical list interfaces.
 *
 * Users must be logged in, and should be authorized and validated with each request.
 */

class DataList
{
	public	$ltype, 
			$lscope, 
			$query, 
			$sortField;
	
	private $fieldMap 	=	array();
	private $fields		=	array();
	private $conn;
	
	public function __construct(&$conn)
	{
		/*
		 * Sets list type, list scope, the search term, and the table fields.
		 */
		$this->conn		=	$conn;
		$this->setFieldMap();
		$this->setListType();
		$this->setListScope();
		$this->setSearchQuery();
		$this->setFields();
		$this->setSortField();
	}
	
	private function setFieldMap()
	{
		/*
		 * Takes no args, simply goes into database to retreive names of necessary fields.
		 */
		$q		=	"SELECT id, field_name FROM field_map";
		$r		=	db_query($q, $this->conn);
		$count	=	$r->num_rows;
		for ($j = 0 ; $j < $count ; $j++)
		{
			$r->data_seek($j);
			$row						=	$r->fetch_array(MYSQLI_ASSOC);
			$this->fieldMap[$row['id']]	=	$row['field_name'];	
		}
	}
	
	private function setListType()
	{
		/* 
		 * Determine which list to generate.
		 * Takes no args, looks for $_GET['ltype'], the URL param for "list type"
		 */
		if (isset($_GET['ltype']))
		{
			switch ($_GET['ltype'])
			{
				case 'itm':
					$this->ltype	=	'items';
					break;
				case 'lis':
					$this->ltype	=	'listings';
					break;
				case 'ads':
					$this->ltype	=	'ads';
					break;
				case 'sub':
					$this->ltype	=	'subitem_of';
					break;
				case 'mnf':
					$this->ltype	=	'mnfr';
					break;
				case 'mod':
					$this->ltype	=	'models';
					break;
				case 'brd':
					$this->ltype	=	'brands';
					break;
				case 'lbl':
					$this->ltype	=	'labels';
					break;
				default:
					throw new Exception('Invalid List Type');
					break;
			}
		} else {
			throw new Exception('Missing List Type');
		}
	}
	
	private function setListScope()
	{
		/*
		 * Set the scope property. This property determines the set of results based on completion/review status.
		 * Takes no args, looks for $_GET['lscp'], the URL param for 'list scope'
		 */ 
		if (isset($_GET['lscp']))
		{
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
				default:
					throw new Exception('Invalid List Scope');
					break;
			}
		} else {
			$this->lscope	=	'all';
		}
	}
	
	private function setSearchQuery()
	{
		/* 
		 * Sets the query property, which is used to filter results based on the terms given.
		 * Set $query as the given input, else set it to NULL if not supplied.
		 * 
		 */
		if (isset($_GET['q']))
		{
			$this->query	=	$_GET['q'];
		} else {
			$this->query	=	null;
		}
	}
	
	private function setFields()
	{
		/*
		 * Sets the fields property, which is an array of field names.
		 * Takes no args, looks for $_GET['f'], which is a comma-separated array of field ids.
		 * This method takes those ids and maps them to their names, complete with table prefixes.
		 */
		if (isset($_GET['f']))
		{
			$fields	=	explode(',', $_GET['f']);
			foreach ($fields as $fieldId)
			{
				if (in_array($fieldId, $this->fieldMap))
				{
					$this->fields[]	=	$this->fieldMap[$fieldId];
				} else {
					// Given ID did not have map value.
					// Throw notice? Log warning?
					continue;
				}
			}
		}
	}
	
	private function setSortField()
	{
		/*
		 * Sets the sortField property, which determines the field to sort by.
		 * Default to ALE Asset is $_GET['srt_f' is not set.
		 * Given the id of a field, map it to its name.
		 */
		if (isset($_GET['srt_f']))
		{
			if (in_array($_GET['srt_f'], $this->fieldMap))
			{
				$this->sortField	=	$this->fieldMap[$_GET['srt_f']];
			} else {
				// Defaults to ALE Asset if given id is invalid, sends error report
				$this->sortField	=	'itemlist.aleAsset';
				// THROW NOTICE
			}
		} else {
			// Defaults to ALE Asset if $_GET['srt_f'] is not set.
			$this->sortField	=	'itemlist.aleAsset';
		}
	}
	
	public function setData()
	{
		/*
		 * Given parameters set at construction of object, gather data from the database.
		 * Returns void, sets $data parameter, an array representative of each item in the list.
		 * Two-dimensional - parameters for each item can be accessed via its db table id.
		 */
		switch ($this->ltype)
		{
			case 'items':
				
				'SELECT
				general_listings.id,
				general_listings.title_extn,	general_listings.description,
				general_listings.price,			general_listings.item_condition,
				general_listings.testing,		general_listings.warranty,
				general_listings.components,	general_listings.condition_note,
				manufacturers.mnfr, 			models.model,
				models.function_desc,
				brands.brand,					ad_photos.url,
				ad_photos.alt';
		}
	}
}