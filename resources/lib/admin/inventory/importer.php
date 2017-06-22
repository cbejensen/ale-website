<?php

class ItemImporter
{
	private $conn;
	private $items	=	array();
	private $pass	=	array();
	private $errors	=	array();
	
	public function __construct($conn)
	{
		$this->conn	=	$conn;
	}
	
	public function setImportData($json)
	{
// 		echo json_encode($json);
		for ($i = 1 ; $i < count($json) ; $i++)
		{
			$this->items[]	=	$json[$i];
		}
		foreach ($this->items as &$item)
		{
			foreach ($item as $key => $value)
			{
				$item[$key]	=	$item[$key]['value'];
			}
		}
// 		print_r($this->items);
	}
	
	public function import()
	{
		foreach ($this->items as $item)
		{
			$this->conn->autocommit(false);
			$this->conn->begin_transaction();
			try {
				$this->createRecords($item);
				$this->conn->commit();
				$this->pass[]	=	$item['aleAsset'];
			} catch (Exception $e) {
				$this->conn->rollback();
				$this->errors[$item['aleAsset']]	=	array(
						'aleAsset'	=>	$item['aleAsset'],
						'error'		=>	$e->getMessage()
				);
				ini_set('error_log', LOGS_PATH . '/app-errors.log');
				error_log('Item Import Error on ' . $item['aleAsset'] . ': ' . $e->getMessage());
			}
		}
	}
	
	public function getReport()
	{
		$report	=	array(
				'pass'	=>	$this->pass,
				'error'	=>	$this->errors
		);
		return $report;
	}
	
	public function numErrors()
	{
		return count($this->errors);
	}
	
	private function createRecords($item)
	{
		$item['mnfrID']	=	$this->getMnfrId($item['mnfr']);
		$item['modelID']=	$this->getModelId($item['model']);
		$item['brandID']=	$this->getBrandId($item['brand']);
		$this->addToItemlist($item);
		$this->addToAccounting($item);
		switch ($item['track'])
		{
			case 2:
			case 4:
			case 5:
				$this->addToEmp($item);
				break;
			case 6:
				if ($item['vendor'] === 1 )
				{
					$this->addToEmp($item);
				}
		}
	}
	
	private function getMnfrId($mnfr)
	{
		$q		=	"SELECT id FROM manufacturers WHERE mnfr=?";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false) {
			throw new Exception('getMnfrId: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('s', $mnfr);
		if ($rc === false) {
			throw new Exception('getMnfrId: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false) {
			throw new Exception('getMnfrId: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r 		= $stmt->get_result();
		if ($r->num_rows === 0)
		{
			$id	=	$this->addToManufacturers(strtoupper($mnfr));
		} else {
			$r->data_seek(0);
			$row	=	$r->fetch_array(MYSQLI_ASSOC);
			$id		=	$row['id'];
		}
		return $id;
	}
	
	private function getModelId($model)
	{
		$q		=	"SELECT id FROM models WHERE model=?";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false) {
			throw new Exception('getModelId: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('s', $model);
		if ($rc === false) {
			throw new Exception('getModelId: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false) {
			throw new Exception('getModelId: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r 		= $stmt->get_result();
		if ($r->num_rows === 0)
		{
			$id	=	$this->addToModels($model);
		} else {
			$r->data_seek(0);
			$row	=	$r->fetch_array(MYSQLI_ASSOC);
			$id		=	$row['id'];
		}
		return $id;
	}
	
	private function getBrandId($brand)
	{
		if ($brand === '') {
			$id	=	null;
		} else {
			$q		=	"SELECT id FROM brands WHERE brand=?";
			$stmt	=	$this->conn->prepare($q);
			if ($stmt === false) {
				throw new Exception('getBrandId: prepare() failed: ' . htmlspecialchars($this->conn->error));
			}
			// Bind Parameters
			$rc		=	$stmt->bind_param('s', $brand);
			if ($rc === false) {
				throw new Exception('getBrandId: bind_param() failed: ' . htmlspecialchars($stmt->error));
			}
			$rc		=	$stmt->execute();
			if ($rc === false) {
				throw new Exception('getBrandId: execute() failed: ' . htmlspecialchars($stmt->error));
			}
			$r 		= $stmt->get_result();
			if ($r->num_rows === 0)
			{
				$id	=	$this->addToBrands($brand);
			} else {
				$r->data_seek(0);
				$row	=	$r->fetch_array(MYSQLI_ASSOC);
				$id		=	$row['id'];
			}
		}
		return $id;
	}
	
	private function addToItemList($item)
	{
		if ($item['aleAsset'] == 10002) throw new Exception('TEST');
		$q	=	"INSERT INTO itemlist (
				aleAsset, 	track, 		mnfrID, 
				modelID, 	brandID, 	addtl_model, 
				serial_num,	price,
				mpn,		wh_location,quantity,
				batch, 		yom,		
				weight,		ship_class)
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt		=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('addToItemList: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('iiiiississiiiii', 
				$item['aleAsset'],		$item['track'],		$item['mnfrID'],
				$item['modelID'],		$item['brandID'],	$item['addtl_model'],
				$item['serial'],		$item['price'],
				$item['mpn'],			$item['wh_location'],$item['quantity'],
				$item['batch'],			$item['yom'],
				$item['weight'],		$item['shipping']
				);
		if ($rc === false)
		{
			throw new Exception('addToItemList: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('addToItemList: execute() failed: ' . htmlspecialchars($stmt->error));
		}
	}
	
	private function addToAccounting($item)
	{
		$q	=	"INSERT INTO item_accounting (
				aleAsset,	vendorID,	cost)
				VALUES (?,?,?)";
		$stmt		=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('addToAccounting: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('iii', 
				$item['aleAsset'],		$item['vendor'],		$item['cost']
				);
		if ($rc === false)
		{
			throw new Exception('addToAccounting: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('addToAccounting: execute() failed: ' . htmlspecialchars($stmt->error));
		}
	}
	
	private function addToEmp($item)
	{
		$q	=	"INSERT INTO emp (
				aleAsset,	nibr,	tm0,
				sap,		status,
				src_building,		src_floor,
				src_room)
				VALUES (?,?,?,?,?,?,?,?)";
		$stmt		=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('addToEmp: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('isssisss',
				$item['aleAsset'],		$item['nibr'],		$item['tm0'],
				$item['sap'],			$item['emp_status'],
				$item['building'],		$item['floor'],		$item['room']
				);
		if ($rc === false)
		{
			throw new Exception('addToEmp: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('addToEmp: execute() failed: ' . htmlspecialchars($stmt->error));
		}
	}
	
	private function addToManufacturers($mnfr)
	{
		$q		=	"INSERT INTO manufacturers (mnfr, subitem_of) VALUES (?, 3)";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false) {
			throw new Exception('addToManufacturers: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('s', $mnfr);
		if ($rc === false) {
			throw new Exception('addToManufacturers: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false) {
			throw new Exception('addToManufacturers: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		return $this->conn->insert_id;
	}
	
	private function addToModels($model)
	{
		$q		=	"INSERT INTO models (model) VALUES (?)";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false) {
			throw new Exception('addToModels: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('s', $model);
		if ($rc === false) {
			throw new Exception('addToModels: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false) {
			throw new Exception('addToModels: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		return $this->conn->insert_id;
	}
	
	private function addToBrands($brand)
	{
		$q		=	"INSERT INTO brands (brand) VALUES (?)";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false) {
			throw new Exception('addToBrands: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('s', $brand);
		if ($rc === false) {
			throw new Exception('addToBrands: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false) {
			throw new Exception('addToBrands: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		return $this->conn->insert_id;
	}
	
	public static function getTracks($conn)
	{
		$q	=	"SELECT id, track FROM item_track";
		$r	=	db_query($q, $conn);
		$tracks	=	array();
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row				=	$r->fetch_array(MYSQLI_ASSOC);
			$tracks[$row['track']]	=	$row['id'];
		}
		return $tracks;
	}
	
	public static function getTakenAssets($conn)
	{
		$q	=	"SELECT aleAsset FROM itemlist";
		$r	=	db_query($q, $conn);
		$assets	=	array();
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$assets[]	=	$row['aleAsset'];
		}
		return $assets;
	}
	
	public static function getVendors($conn)
	{
		$q	=	"SELECT id, vendor FROM vendors";
		$r	=	db_query($q, $conn);
		$vendors	=	array();
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$vendors[$row['vendor']]	=	$row['id'];
		}
		return $vendors;
	}
	
	public static function getShippingClasses($conn)
	{
		$q	=	"SELECT id, shipping_class FROM shipping_class";
		$r	=	db_query($q, $conn);
		$ship	=	array();
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$ship[$row['shipping_class']]	=	$row['id'];
		}
		return $ship;
	}
	
	public static function getEmpStatuses($conn)
	{
		$q	=	"SELECT id, status FROM emp_status";
		$r	=	db_query($q, $conn);
		$stat	=	array();
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$stat[$row['status']]	=	$row['id'];
		}
		$stat['']	=	null;
		return $stat;
	}
	
	public static function getTools()
	{
		$tools	=	array();
		$tools[]=	array(
				'name'	=>	'Submit',
				'action'=>	'submitNewEquipment()'
		);
		$tools[]=	array(
				'name'	=>	'Clear',
				'action'=>	'clearSpreadsheet()'
		);
		$tools[]=	array(
				'name'	=>	'Add Spreadsheet',
				'action'=>	'addDataDialog()'
		);
		$tools[]=	array(
				'name'	=>	'Add Blank Row',
				'action'=>	'addBlankRow()'
		);
		return $tools;
	}
}