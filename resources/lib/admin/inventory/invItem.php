<?php

class InvItem
{
	public 		$aleAsset;
	protected 	$conn;
	
	public 		$assetType	=	array(); // ['track'], ['suffix']
	public 		$photos		=	array(); // [ord]['url'], ['added'], ['update']
	public 		$categories	=	array(); // []['category'], ['subcategory']
	public 		$data		=	array(); // aliases: emp_category, emp_subcategory, m_desc (model), b_desc (batch), emp_status, emp_desc (status desc)
	
	public function __construct($aleAsset, &$conn, $data = 0)
	{
		/* Given an item's aleAsset number, compile basic info.
		 * This info is useful for the functionalities of the item list, 
		 * Such as:
		 * 		Sorting, 
		 * 		Tooltips/Overviews, 
		 * 		Search
		 */ 
		$this->conn		=	$conn;
		$this->validateAleAsset($aleAsset);
		$this->setAssetType();
		if ($data === 0)
		{
			$this->setData();
			$this->setPhotos();
			$this->setCategories();
		} elseif ($data !== 0) {
			// Optionally, if supplied with the data (perhaps saved in the session), 
			// simply compile it from the array.
			$this->compileData($data);
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
			$type				=	InvItem::getAssetType($this->aleAsset, $this->conn);
			$this->assetType	=	$type;
		} catch (Excpetion $e) {
			throw new Exception('Could not get Asset-Type: '. $e->getMessage());
		}
	}
	
	private function getFieldData($fields)
	{
		// UNUSED!!!
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
		// UNUSED!!
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
	
	private function setData()
	{
		// Get the data from the database
		$q		=	"SELECT 
					manufacturers.mnfr,		models.model,			models.function_desc,	models.description as m_desc,
					brands.brand,			itemlist.addtl_model,	itemlist.serial_num,	itemlist.title_extn,
					itemlist.price,			itemlist.mpn,			itemlist.wh_location,	itemlist.quantity,
					inv_batch.batch_name, 	inv_batch.description as b_desc,				itemlist.yom,			
					itemlist.condition_note,
					item_condition.item_condition,					testing_status.testing,	itemlist.weight,
					shipping_class.shipping_class,					cosmetic_status.cosmetic,
					itemlist.components,	itemlist.warranty,		itemlist.ale_qb,		itemlist.nov_qb,
					itemlist.ebay,			itemlist.active,		itemlist.reviewed,		itemlist.date_received,
					itemlist.date_added,	itemlist.last_update,	itemlist.date_completed,itemlist.modified_by,
					vendors.vendor,			item_accounting.cost,	emp.nibr,				emp.tm0,
					emp.sap,				emp_status.status as emp_status,				emp_status.description as emp_desc, 
					emp_category.category as emp_category,
					emp_category.subcategory as emp_subcategory,	emp.nbv,
					emp.img_url,			emp_prev_owners.prev_owner,						emp.src_building,
					emp.src_floor,			emp.src_room
					FROM itemlist
					LEFT JOIN manufacturers ON itemlist.mnfrID = manufacturers.id
					LEFT JOIN models ON itemlist.modelID = models.id
					LEFT JOIN brands ON itemlist.brandID = brands.id
					LEFT JOIN inv_batch ON itemlist.batch = inv_batch.id
					LEFT JOIN item_condition ON itemlist.item_condition = item_condition.id
					LEFT JOIN testing_status ON itemlist.testing = testing_status.id
					LEFT JOIN shipping_class ON itemlist.ship_class = shipping_class.id
					LEFT JOIN cosmetic_status ON itemlist.cosmetic = cosmetic_status.id
					LEFT JOIN item_accounting ON itemlist.aleAsset = item_accounting.aleAsset
					LEFT JOIN vendors ON item_accounting.vendorID = vendors.id
					LEFT JOIN emp ON itemlist.aleAsset = emp.aleAsset
					LEFT JOIN emp_prev_owners ON emp.prev_owner = emp_prev_owners.id
					LEFT JOIN emp_category ON emp.category = emp_category.id
					LEFT JOIN emp_status ON emp.status = emp_status.id
					WHERE itemlist.aleAsset = ?
					";
		$stmt		=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('InvItem Data SELECT: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('i', $this->aleAsset);
		if ($rc === false)
		{
			throw new Exception('InvItem Data SELECT: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('InvItem Data SELECT: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r 			=	$stmt->get_result();
		$r->data_seek(0);
		$row		=	$r->fetch_array(MYSQLI_ASSOC);
		$this->data	=	$row;
		$this->data['aleAsset']	=	$this->aleAsset;
		$this->data['track']	=	$this->assetType['track'];
		$this->data['prefix']	=	$this->assetType['suffix'];
	}
	
	private function setPhotos()
	{
		$q		=	"SELECT img_url, img_order, date_added, last_update
					 FROM item_photos WHERE aleAsset=?";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Set Photos: prepare() failed: ' . htmlspecialchars($conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param("i", $this->aleAsset);
		if ($rc === false)
		{
			throw new Exception('Set Photos: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		// Execute
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Set Photos: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r		=	$stmt->get_result();
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row								=	$r->fetch_array(MYSQLI_ASSOC);
			$this->photos[$row['img_order']]	=	array(	
														'url'	=>	$row['img_url'],
														'added'	=>	$row['date_added'],
														'update'=>	$row['last_update']
													);
		}
	}
	
	private function setCategories()
	{
		$q		=	"SELECT id, ale_category, ale_subcategory FROM ale_category
					LEFT JOIN item_category ON ale_category.id = item_category.category
					WHERE item_category.aleAsset = ?";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Set Photos: prepare() failed: ' . htmlspecialchars($conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param("i", $this->aleAsset);
		if ($rc === false)
		{
			throw new Exception('Set Photos: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		// Execute
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Set Photos: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r		=	$stmt->get_result();
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row								=	$r->fetch_array(MYSQLI_ASSOC);
			$this->categories[]	=	array(
										'id'			=>	$row['id'],
										'category'		=>	$row['ale_category'],
										'subcategory'	=>	$row['ale_subcategory']
									);
		}
	}
	
	public static function getAssetType($aleAsset, $conn)
	{
		// Returns FALSE if no records were found, RESULT ARRAY if success, throws exceptions on error. 
		$q	=	"SELECT item_track.track, item_track.suffix FROM
				itemlist
				LEFT JOIN item_track ON itemlist.track = item_track.id
				WHERE itemlist.aleAsset=?";
		
		$stmt	=	$conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Get Asset Type: prepare() failed: ' . htmlspecialchars($conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param("i", $aleAsset);
		if ($rc === false)
		{
			throw new Exception('Get Asset Type: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		// Execute
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Get Asset Type: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r		=	$stmt->get_result();
		if ($r->num_rows == 0)
		{
			// No data found!
			throw new Exception('Get Asset Type: No data found.');
		} else {
			$r->data_seek(0);
			$result		=	$r->fetch_array(MYSQLI_ASSOC);
		}
		return $result;
	}
	
	public static function getStatus($aleAsset, &$conn)
	{
		$status = array();
		$q		=	"SELECT item_status.status, item_status.description
					FROM item_status
					LEFT JOIN status ON status.status = item_status.id
					LEFT JOIN itemlist ON status.aleAsset = itemlist.aleAsset
					WHERE itemlist.aleAsset = ?";
		$stmt		=	$conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Status SELECT: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('i', $aleAsset);
		if ($rc === false)
		{
			throw new Exception('Status SELECT: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Status SELECT: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r 		= $stmt->get_result();
		for ($j = 0 ; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$row		=	$r->fetch_array(MYSQLI_ASSOC);
			$status[]	=	array($row['status'], $row['description']);
		}
		return $status;
	}
}