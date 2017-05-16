<?php

class InvItem
{
	public 		$aleAsset;
	protected 	$conn;
	
	public 		$assetType	=	array();
	public 		$photos		=	array();
	public 		$data		=	array();
	
	public function __construct($aleAsset, &$conn, $fields = 0, $data = 0)
	{
		// Given an item's aleAsset number, compile basic info.
		// This info is useful for the functionalities of the item list, such as:
		// Sorting, Tooltips/Overviews, Search
		$this->conn		=	$conn;
		$this->validateAleAsset($aleAsset);
		$this->setAssetType();
		if ($fields != 0 && $data === 0)
		{
			$this->getFieldData($fields);
		} elseif ($fields === 0 && $data != 0) {
			$this->setFieldData($data);
		}
		
	}
	
	private function validateAleAsset($aleAsset)
	{
		if (is_numeric($aleAsset))
		{
			$this->aleAsset		=	(int) $aleAsset;
		} else {
			throw new Exception('Type Error: Ale Asset must be an integer.');
		}
	}
	
	private function setAssetType()
	{
		try {
			$type				=	InvItem::getAssetType($this->aleAsset);
			$this->assetType	=	$type;
		} catch (Excpetion $e) {
			throw new Exception('Could not get Asset-Type: '. $e->getMessage());
		}
	}
	
	private function getFieldData($fields)
	{
		// Given the fields requested, set the data property.
		// Test case: given tracks.track, manufacturers.mnfr, models.model, itemlist.yom
		$select = 'SELECT itemlist.aleAsset, ';
		$from	= 'FROM itemlist ';
		$join	= '';
		$where	= 'WHERE itemlist.aleAsset=?';
		$joined_tables	=	array();
		foreach ($fields as $table => $field)
		{
			$select		.=	"$table.$field, ";
			if ($table != 'itemlist' && !in_array($table, $joined_tables))
			{
				$join	.=	InvItem::getJoinStmt($field) . ' ';
			}
			$joined_tables[]	=	$table;
		}
		
	}
	
	private static function getJoinStmt($field)
	{
		switch ($field)
		{
			case 'mnfr':
				$join	=	'LEFT JOIN manufacturers ON itemlist.mnfrID = manufacturers.id';
				break;
			case 'model':
			case 'function_desc':
				$join	=	'LEFT JOIN models ON itemlist.modelID = models.id';
				break;
			case 'brand':
				$join	=	'LEFT JOIN brands ON itemlist.brandID = brands.id';
				break;
			case 'batch':
				$join	=	'LEFT JOIN batches ON itemlist.batch = batches.id';
				break;
			case '':
				break;
		}
		return $join;
	}
	
	public function getData()
	{
		// Get the data from
	}
	
	public static function getAssetType($aleAsset)
	{
		// Returns FALSE if no records were found, RESULT ARRAY if success, throws exceptions on error. 
		$q	=	"SELECT itemlist.assetType, asset_type.type, asset_type.suffix FROM
				itemlist
				LEFT JOIN asset_type ON itemlist.assetType = asset_type.id
				WHERE itemlist.aleAsset=?";
		
		$stmt	=	$conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('DB Query Error: prepare() failed: ' . htmlspecialchars($conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param("i", $aleAsset);
		if ($rc === false)
		{
			throw new Exception('DB Query Error: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		// Execute
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('DB Query Error: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r		=	$stmt->getResult();
		if ($r->num_rows == 0)
		{
			// No data found!
			throw new Exception('No data found.');
		} else {
			$r->data_seek(0);
			$result		=	$r->fetch_array(MYSQLI_ASSOC);
		}
		return $result;
	}
}