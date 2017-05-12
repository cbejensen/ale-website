<?php
/*
 * The List class models the graphical list interfaces.
 *
 * Users must be logged in, and should be authorized and validated with each request.
 */

class DataList
{
	public	$ltype, $lscope;
	
	private $fieldMap 	=	array(	1	=>	'',
			2	=>	'',
			3	=>	'',
			4	=>	'',
			5	=>	'',
			6	=>	'',
	);
	private $fields		=	array();
	
	public function __construct()
	{
		$this->setListType();
		$this->setListScope();
		$this->setSearchQuery();
		$this->setFields();
	}
	
	private function setListType()
	{
		// Determine which list to generate.
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
		// Determine the scope of the given list.
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
		// Set $query as the given input, else set it to NULL if not supplied.
		if (isset($_GET['q']))
		{
			$this->query	=	$_GET['q'];
		} else {
			$this->query	=	null;
		}
	}
	
	private function setFields()
	{
		if (isset($_GET['f']))
		{
			$fields	=	explode(',', $_GET['f']);
			foreach ($fields as $fieldId)
			{
				if (in_array($fieldId, $this->fieldMap))
				{
					$this->fields[]	=	$this->fieldMap[$fieldId];
				} else {
					// Throw notice? Log warning?
					continue;
				}
			}
		}
	}
	
	private function setSortField()
	{
		// Determine which field to sort by, default to ALE Asset.
		if (isset($_GET['srt_f']))
		{
			if (in_array($_GET['srt_f'], $this->fieldMap))
			{
				
			} else {
				
			}
		} else {
			
		}
	}
	
}