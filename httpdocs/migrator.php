<?php 
/*
 * This is the migrator of records from the old database structure to
 * the new one. 
 * It gets the data for each old record and creates a new one.
 * 
 * Requires 2 files (other than config.php):
 * 		The new functions.php
 * 		The old-db login file
 */

require_once '../resources/config.php';
class NewRecord
{
	public $oldRec;
	public $data	=	array();
	private $conn;
	
	public function __construct($oldRecord, &$conn)
	{
		$this->conn		=	$conn;
		$this->oldRec	=	$oldRecord;
		$this->addRecord();
		$this->addPhotos();
		$this->addCategories();
	}
	
	private function addRecord()
	{
		/*
		 * A few things need to be done before an itemlist entry can be made:
		 * 
		 * The aleAsset needs to be separated from the prefix. Then, using that prefix, 
		 * recorded track, and EMP status, determine new track.
		 * 
		 * The recorded testing status must be searched against the new records for an id
		 * to be entered into the itemlist table
		 * 
		 * Same must be done for:
		 * 		testing
		 * 		cosmetic
		 * 		condition
		 * 		shipping class
		 * 		emp previous owner
		 * 		emp status
		 * 
		 * Vendor records must be created.
		 * 
		 * Batch records must be created.
		 * Models
		 * Manufacturers
		 * Brands
		 * 
		 * EMP category must be set (but it should be all ready to go).
		 * 
		 * ALE CATEGORIES MUST BE SET
		 * USE PREP STMTS FOR MODEL/MNFR/BRANDS/SUBITEMS
		 * 
		 * 
		 *
		 */
		try {
			$this->setAsset();
			$this->setTesting();
			$this->setCosmetic();
			$this->setCondition();
			$this->setShipping();
			$this->setPrevOwner();
			$this->setEmpStatus();
			$this->setVendor();
			$this->setSubitemOf();
			$this->setMnfr();
			$this->setModel();
			$this->setBrand();
			$this->setBatch();
			$this->setData();
			
			// INSERT NEW ITEM RECORDS
			$this->insertItem();
			$this->addPhotos();
			$this->addCategories();
		} catch (Exception $e) {
			$q	=	"INSERT INTO migrator_error (type, asset, note) VALUES ";
			$q	.=	"(?,?,?)";
			
			$stmt	=	$this->conn->prepare($q);
			if ($stmt === false)
			{
				throw new Exception('mig_err: prepare() failed: ' . htmlspecialchars($this->conn->error));
			}
			// Bind Parameters
			$msg	=	'Failed Record';
			$emsg	=	$e->getMessage();
			$rc		=	$stmt->bind_param("sss",
					$msg, $this->oldRec->data['aleAsset'], $emsg
					);
			if ($rc === false)
			{
				throw new Exception('mig_err: bind_param() failed: ' . htmlspecialchars($stmt->error));
			}
			// Execute
			$rc		=	$stmt->execute();
			if ($rc === false)
			{
				throw new Exception('mig_err: execute() failed: ' . htmlspecialchars($stmt->error));
			}
		}
		
	}
	
	private function insertItem()
	{
		try {
		// Itemlist
			$q	=	"INSERT INTO itemlist (
					aleAsset, 		track, 			mnfrID, 	modelID, 	brandID, 	addtl_model,
					serial_num,		title_extn, 	price, 		mpn,		wh_location, quantity, 	batch, yom,
					condition_note, item_condition, testing, 	weight, 	ship_class, cosmetic, 	components,
					warranty, 		reviewed, 		date_added, date_completed
					)
					VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";	//25
			$stmt	=	$this->conn->prepare($q);
			if ($stmt === false)
			{
				throw new Exception('Itemlist: prepare() failed: ' . htmlspecialchars($this->conn->error));
			}
			// Bind Parameters
			$rc		=	$stmt->bind_param("iiiiisssissiissiiiiisiiss",
					$this->data['aleAsset'],	$this->data['track'], 		$this->data['mnfr'], 			$this->data['model'],
					$this->data['brand'], 		$this->data['addtl_model'], $this->data['serial_num'], 		$this->data['title_extn'],
					$this->data['price'], 		$this->data['mpn'], 		$this->data['wh_location'], 	$this->data['quantity'],
					$this->data['batch'], 		$this->data['yom'], 		$this->data['condition_note'], $this->data['item_condition'],
					$this->data['testing'], 	$this->data['weight'], 		$this->data['ship_class'], 		$this->data['cosmetic'],
					$this->data['components'], 	$this->data['warranty'], 	$this->data['reviewed'], 		$this->data['date_added'],
					$this->data['date_completed']
					);
			if ($rc === false)
			{
				throw new Exception('Itemlist: bind_param() failed: ' . htmlspecialchars($stmt->error));
			}
			// Execute
			$rc		=	$stmt->execute();
			if ($rc === false)
			{
				throw new Exception('Itemlist: execute() failed: ' . htmlspecialchars($stmt->error));
			}
			
			
		// Model_Mnfr
			$q		=	"INSERT IGNORE INTO model_mnfr (modelID, mnfrID) VALUES (?,?)";
			$stmt	=	$this->conn->prepare($q);
			if ($stmt === false)
			{
				throw new Exception('Model_Mnfr: prepare() failed: ' . htmlspecialchars($this->conn->error));
			}
			// Bind Parameters
			$rc		=	$stmt->bind_param("ii",	$this->data['model'], $this->data['mnfr']);
			if ($rc === false)
			{
				throw new Exception('Model_Mnfr: bind_param() failed: ' . htmlspecialchars($stmt->error));
			}
			// Execute
			$rc		=	$stmt->execute();
			if ($rc === false)
			{
				throw new Exception('Model_Mnfr: execute() failed: ' . htmlspecialchars($stmt->error));
			}
			
		// Model_Brand
			if (!empty($this->data['brand'])) {
				$q		=	"INSERT IGNORE INTO model_brand (modelID, brandID) VALUES (?,?)";
				$stmt	=	$this->conn->prepare($q);
				if ($stmt === false)
				{
					throw new Exception('Model_Brand: prepare() failed: ' . htmlspecialchars($this->conn->error));
				}
				// Bind Parameters
				$rc		=	$stmt->bind_param("ii",	$this->data['model'], $this->data['brand']);
				if ($rc === false)
				{
					throw new Exception('Model_Brand: bind_param() failed: ' . htmlspecialchars($stmt->error));
				}
				// Execute
				$rc		=	$stmt->execute();
				if ($rc === false)
				{
					throw new Exception('Model_Brand: execute() failed: ' . htmlspecialchars($stmt->error));
				}
				
		// Mnfr Brand
				$q		=	"INSERT IGNORE INTO mnfr_brand (mnfrID, brandID) VALUES (?,?)";
				$stmt	=	$this->conn->prepare($q);
				if ($stmt === false)
				{
					throw new Exception('Mnfr Brand: prepare() failed: ' . htmlspecialchars($this->conn->error));
				}
				// Bind Parameters
				$rc		=	$stmt->bind_param("ii",	$this->data['mnfr'], $this->data['brand']);
				if ($rc === false)
				{
					throw new Exception('Mnfr Brand: bind_param() failed: ' . htmlspecialchars($stmt->error));
				}
				// Execute
				$rc		=	$stmt->execute();
				if ($rc === false)
				{
					throw new Exception('Mnfr Brand: execute() failed: ' . htmlspecialchars($stmt->error));
				}
			}
		// Accounting
			$q	=	"INSERT INTO item_accounting (
					aleAsset, vendorID, cost
					)
					VALUES (?,?,?)";
			$stmt	=	$this->conn->prepare($q);
			if ($stmt === false)
			{
				throw new Exception('item_accounting: prepare() failed: ' . htmlspecialchars($this->conn->error));
			}
			// Bind Parameters
			$rc		=	$stmt->bind_param("iii",
						$this->data['aleAsset'], $this->data['vendorID'], $this->data['cost']
						);
			if ($rc === false)
			{
				throw new Exception('item_accounting: bind_param() failed: ' . htmlspecialchars($stmt->error));
			}
			// Execute
			$rc		=	$stmt->execute();
			if ($rc === false)
			{
				throw new Exception('item_accounting: execute() failed: ' . htmlspecialchars($stmt->error));
			}
			
		// Novartis EMP, if applicable
			// emp_status, emp_category, emp_img_url
			if ($this->data['track'] == 2 || $this->data['track'] == 4 || $this->data['track'] == 5)
			{
				$q	=	"INSERT INTO emp (
						aleAsset, nibr, tm0, sap, status, category, nbv, img_url, prev_owner,
						src_building, src_floor, src_room
						)
						VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
				$stmt	=	$this->conn->prepare($q);
				if ($stmt === false)
				{
					throw new Exception('emp: prepare() failed: ' . htmlspecialchars($this->conn->error));
				}
				// Bind Parameters
				$rc		=	$stmt->bind_param("isssiiisisss",
						$this->data['aleAsset'], $this->data['nibr'], $this->data['tm0'],
						$this->data['sap'], $this->data['emp_status'], $this->data['emp_category'],
						$this->data['nbv'], $this->data['emp_img_url'], $this->data['prev_owner'],
						$this->data['src_building'], $this->data['src_floor'], $this->data['src_room']
						);
				if ($rc === false)
				{
					throw new Exception('emp: bind_param() failed: ' . htmlspecialchars($stmt->error));
				}
				// Execute
				$rc		=	$stmt->execute();
				if ($rc === false)
				{
					throw new Exception('emp: execute() failed: ' . htmlspecialchars($stmt->error));
				}
			}
		} catch (Exception $e) {
			$q	=	"INSERT INTO migrator_error (type, asset, note) VALUES ";
			$q	.=	"(?,?,?)";
			
			$stmt	=	$this->conn->prepare($q);
			if ($stmt === false)
			{
				throw new Exception('mig_err: prepare() failed: ' . htmlspecialchars($this->conn->error));
			}
			// Bind Parameters
			$msg	=	'Failed Record';
			$emsg	=	$e->getMessage();
			$rc		=	$stmt->bind_param("sss",
					$msg, $this->oldRec->data['aleAsset'], $emsg
					);
			if ($rc === false)
			{
				throw new Exception('mig_err: bind_param() failed: ' . htmlspecialchars($stmt->error));
			}
			// Execute
			$rc		=	$stmt->execute();
			if ($rc === false)
			{
				throw new Exception('mig_err: execute() failed: ' . htmlspecialchars($stmt->error));
			}
		}
	}
	
	private function addPhotos()
	{
		$photos	=	$this->oldRec->photos;
		$q		=	"INSERT INTO item_photos (aleAsset, img_url, img_order) VALUES ";
		foreach ($photos as $key => $value)
		{
			$q	.=	"({$this->data['aleAsset']}, '$value', $key), ";
		}
		$q		=	substr($q, 0, -2); // Remove last comma/space
		$r		=	db_query($q, $this->conn);
	}
	
	private function addCategories()
	{
		$cats	=	$this->oldRec->catIDs;
		$q		=	"INSERT IGNORE INTO item_category (aleAsset, category) VALUES ";
		foreach ($cats as $cat)
		{
			$q	.=	"({$this->data['aleAsset']}, $cat), ";
		}
		$q		=	substr($q, 0, -2); // Remove last comma/space
		$r		=	db_query($q, $this->conn);
	}
	
	private function setAsset()
	{
		$aleAsset	=	$this->oldRec->data['aleAsset'];
		if (is_numeric(substr($aleAsset, 0, 1))) // Checks first char
		{
			$this->data['aleAsset']	=	$aleAsset;
			$this->data['track']	=	8;
		}
		elseif (is_numeric(substr($aleAsset, 1, 1))) // Checks second char
		{
			$this->data['aleAsset']	=	substr($aleAsset, 1); // gets all but first letter
			switch (substr($aleAsset, 0, 1))
			{
				case 'A':
					$this->data['track']	=	1;
					break;
				case 'N':
					switch ($this->oldRec->data['empStatus'])
					{
						case 'purch_avail':
							$this->data['track']	=	5;
							break;
						case 'req_testing':
						case 'upload_ready':
							$this->data['track']	=	4;
							break;
						case 'not_emp':
						default:
							$this->data['track']	=	2;	
							break;
					}
					break;
				case 'C':
					$this->data['track']	=	6;
					break;
				default:
					$this->data['track']	=	8;
			}
		}
		elseif (is_numeric(substr($aleAsset, 2, 1)))
		{
			$this->data['aleAsset']	=	substr($aleAsset, 2);
			$this->data['track']	=	5;
		}
		else
		{
			throw new Exception($aleAsset . ' ALE Asset is invalid');
		}
	}
	
	private function setTesting()
	{
		switch ($this->oldRec->data['testing'])
		{
			case 'Powers Up':
				$this->data['testing']	=	3;
				break;
			case 'Tested':
				$this->data['testing']	=	1;
				break;
			case 'AS-IS':
				$this->data['testing']	=	4;
				break;
			default:
				$this->data['testing']	=	2;
		}
	}
	
	private function setCosmetic()
	{
		switch ($this->oldRec->data['cosmetic'])
		{
			case 'used':
				$this->data['cosmetic']	=	1;
				break;
			case 'like-new':
				$this->data['cosmetic']	=	2;
				break;
			case 'orig-packaging':
				$this->data['cosmetic']	=	5;
				break;
			case 'new':
				$this->data['cosmetic']	=	4;
				break;
			case 'refurb':
				$this->data['cosmetic']	=	3;
				break;
			default:
				$this->data['cosmetic']	=	1;
		}
	}
	
	private function setCondition()
	{
		switch ($this->oldRec->data['itemCondition'])
		{
			case 'new':
				$this->data['item_condition']	=	2;
				break;
			case 'like-new':
				$this->data['item_condition']	=	3;
				break;
			case 'used':
				$this->data['item_condition']	=	1;
				break;
			default:
				$this->data['item_condition']	=	1;
		}
	}
	
	private function setShipping()
	{
		switch ($this->oldRec->data['ShippingClass'])
		{
			case 'LAB-SM':
				$this->data['ship_class']	=	1;
				break;
			case 'LAB-MED':
				$this->data['ship_class']	=	2;
				break;
			case 'LAB-LG':
				$this->data['ship_class']	=	3;
				break;
			case 'LAB-XL':
				$this->data['ship_class']	=	4;
				break;
			case 'LAB-LTL':
				$this->data['ship_class']	=	5;
				break;
			default:
				$this->data['ship_class']	=	4;
		}
	}
	
	private function setPrevOwner()
	{
		switch ($this->oldRec->data['prev_owner'])
		{
			case '1':
				$this->data['prev_owner']	=	1;
				break;
			case '2':
				$this->data['prev_owner']	=	2;
				break;
			case '3':
				$this->data['prev_owner']	=	3;
				break;
			case '4':
				$this->data['prev_owner']	=	4;
				break;
			case '6':
				$this->data['prev_owner']	=	5;
				break;
			default:
				$this->data['prev_owner']	=	5;
		}
	}
	
	private function setEmpStatus()
	{
		switch ($this->oldRec->data['empStatus'])
		{
			case 'not_emp':
				$this->data['emp_status']	=	4;
				break;
			case 'upload_ready':
				$this->data['emp_status']	=	2;
				break;
			case 'purch_avail':
				$this->data['emp_status']	=	1;
				break;
			case 'req_testing':
				$this->data['emp_status']	=	3;
				break;
			default:
				$this->data['emp_status']	=	4;
		}
	}
	
	private function setVendor()
	{
		switch ($this->oldRec->data['vendor'])
		{
			case 'Novartis Inst. of Biomedical Research-V':
				$this->oldRec->data['vendor']	=	'Novartis Inst. of Biomedical Research';
				break;
		}
		//INSERT
		$q	=	"INSERT IGNORE INTO vendors (vendor) VALUES (?)";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('vendor: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param("s", $this->oldRec->data['vendor']);
		if ($rc === false)
		{
			throw new Exception('vendor: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		// Execute
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('vendor: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		// SELECT
		$q	=	"SELECT id FROM vendors WHERE vendor=?";
		$stmt		=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('s', $this->oldRec->data['vendor']);
		if ($rc === false)
		{
			throw new Exception('bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r = $stmt->get_result();
		$r->data_seek(0);
		$row					=	$r->fetch_array(MYSQLI_ASSOC);
		$this->data['vendorID']	=	$row['id'];
	}
	
	private function setSubitemOf()
	{
		// INSERT INTO subitem_of
		$q	=	"INSERT IGNORE INTO subitem_of (subitem_of) VALUES (?)";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Subitem_of INSERT: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param("s", $this->oldRec->data['subitem_of']);
		if ($rc === false)
		{
			throw new Exception('Subitem_of INSERT: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		// Execute
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Subitem_of INSERT: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		
		// SELECT id FROM subitem_of
		$q	=	"SELECT id FROM subitem_of WHERE subitem_of=?";
		$stmt		=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Subitem_of SELECT: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('s', $this->oldRec->data['subitem_of']);
		if ($rc === false)
		{
			throw new Exception('Subitem_of SELECT: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Subitem_of SELECT: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r = $stmt->get_result();
		$r->data_seek(0);
		$row						=	$r->fetch_array(MYSQLI_ASSOC);
		$this->data['subitem_of']	=	$row['id'];
	}
	
	private function setMnfr()
	{
		// INSERT
		$q	=	"INSERT IGNORE INTO manufacturers (mnfr, subitem_of) VALUES (?,?)";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Mnfr INSERT: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param("si", $this->oldRec->data['mnfr'], $this->data['subitem_of']);
		if ($rc === false)
		{
			throw new Exception('Mnfr INSERT: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		// Execute
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Mnfr INSERT: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		
		// SELECT
		$q	=	"SELECT id FROM manufacturers WHERE mnfr=?";
		$stmt		=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Mnfr SELECT: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('s', $this->oldRec->data['mnfr']);
		if ($rc === false)
		{
			throw new Exception('Mnfr SELECT: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Mnfr SELECT: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r = $stmt->get_result();
		$r->data_seek(0);
		$row					=	$r->fetch_array(MYSQLI_ASSOC);
		$this->data['mnfr']		=	$row['id'];
	}
	
	private function setModel()
	{
		// INSERT 
		$q	=	"INSERT IGNORE INTO models (model, function_desc, description) VALUES (?,?,?)";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Model INSERT: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param("sss", 	$this->oldRec->data['model'], 
												$this->oldRec->data['titleFuncDescription'], 
												$this->oldRec->data['descGeneral']);
		if ($rc === false)
		{
			throw new Exception('Model INSERT: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		// Execute
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Model INSERT: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		
		// SELECT
		$q	=	"SELECT id FROM models WHERE model=?";
		$stmt		=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Model SELECT: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('s', $this->oldRec->data['model']);
		if ($rc === false)
		{
			throw new Exception('Model SELECT: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Model SELECT: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r = $stmt->get_result();
		$r->data_seek(0);
		$row						=	$r->fetch_array(MYSQLI_ASSOC);
		$this->data['model']		=	$row['id'];
	}
	
	private function setBrand()
	{
		if (empty($this->oldRec->data['brand'])) 
		{
			$this->data['brand']	=	null;
			return;
		}
		// INSERT
		$q	=	"INSERT IGNORE INTO brands (brand) VALUES (?)";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Brand INSERT: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param("s", 	$this->oldRec->data['brand']);
		if ($rc === false)
		{
			throw new Exception('Brand INSERT: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		// Execute
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Brand INSERT: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		
		// SELECT
		$q	=	"SELECT id FROM brands WHERE brand=?";
		$stmt		=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Brand SELECT: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('s', $this->oldRec->data['brand']);
		if ($rc === false)
		{
			throw new Exception('Brand SELECT: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Brand SELECT: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r = $stmt->get_result();
		$r->data_seek(0);
		$row						=	$r->fetch_array(MYSQLI_ASSOC);
		$this->data['brand']		=	$row['id'];
	}
	
	private function setBatch()
	{
		if (empty($this->oldRec->data['source_desc']))
		{
			$this->data['batch']	=	null;
			return;
		}
		$desc	=	'Old batch, added prior to v3.0';
		// INSERT
		$q	=	"INSERT IGNORE INTO inv_batch (batch_name, description) VALUES (?,?)";
		$stmt	=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Batch INSERT: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param("ss", $this->oldRec->data['source_desc'], $desc);
		if ($rc === false)
		{
			throw new Exception('Batch INSERT: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		// Execute
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Batch INSERT: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		// SELECT
		$q	=	"SELECT id FROM inv_batch WHERE batch_name=?";
		$stmt		=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Batch SELECT: prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('s', $this->oldRec->data['source_desc']);
		if ($rc === false)
		{
			throw new Exception('Batch SELECT: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Batch SELECT: execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r = $stmt->get_result();
		$r->data_seek(0);
		$row						=	$r->fetch_array(MYSQLI_ASSOC);
		$this->data['batch']		=	$row['id'];
	}
	
	private function setData()
	{
		$old							=	$this->oldRec->data;
		$this->data['wh_location']		=	$old['whLocation'];
		$this->data['price']			=	(int) $old['price'];
		$this->data['title_extn']		=	$old['titleExtn'];
		$this->data['yom']				=	$old['yom'];
		$this->data['weight']			=	(int) $old['weight'];
		$this->data['components']		=	$old['components'];
		$this->data['condition_note']	=	$old['conditionNote'];
		$this->data['quantity']			=	(int) $old['quantity'];
		$this->data['serial_num']		=	$old['serialNumber'];
		$this->data['date_added']		=	$old['date_added'];
		$this->data['date_completed']	=	$old['date_added'];
		$this->data['mpn']				=	$old['mpn'];
		$this->data['addtl_model']		=	$old['addtl_model'];
		$this->data['description']		=	$old['descGeneral'];
		$this->data['cost']				=	(int) $old['cost'];
		$this->data['nibr']				=	$old['nibr'];
		$this->data['tm0']				=	$old['tm0'];
		$this->data['sap']				=	$old['sap'];
		$this->data['emp_category']		=	(int) $old['empCategoryID'];
		$this->data['nbv']				=	(int) $old['nbv'];
		$this->data['emp_img_url']		=	str_replace('images/', 'img/novartis/', $old['emp_img_url']);
		$this->data['src_building']		=	$old['src_building'];
		$this->data['src_floor']		=	$old['src_floor'];
		$this->data['src_room']			=	$old['src_room'];
		$this->data['reviewed']			=	1;
		
		foreach ($this->data as $key => $value)
		{
			if ($this->data[$key] !== 0 && empty($this->data[$key]))
			{
				$this->data[$key] = null;
			}
		}
	}
}
class OldRecord 
{
	public $aleAsset;
	public $list;
	public $data	=	array();
	public $photos	=	array();
	public $catIDs	=	array();
	private $conn;
	
	public function __construct($aleAsset, $list, &$oldConn)
	{
		$this->conn		=	$oldConn;
		$this->aleAsset	=	$aleAsset;
		switch ($list)
		{
			case 1:
			case 'review':
				$this->list	=	'review';
				break;
			case 2:
			case 'itemlist':
				$this->list	=	'itemlist';
				break;
			default:
				throw new Exception('Invaild list.');
				break;
		}
		try {
			$this->setData();
		} catch (Exception $e)
		{
			$q	=	"INSERT INTO migrator_error (type, asset, note) VALUES ";
			$q	.=	"(?,?,?)";
			
			$stmt	=	$this->conn->prepare($q);
			if ($stmt === false)
			{
				throw new Exception('mig_err: prepare() failed: ' . htmlspecialchars($this->conn->error));
			}
			// Bind Parameters
			$msg	=	'Failed Record';
			$emsg	=	$e->getMessage();
			$rc		=	$stmt->bind_param("sss",
					$msg, $this->aleAsset, $emsg
					);
			if ($rc === false)
			{
				throw new Exception('mig_err: bind_param() failed: ' . htmlspecialchars($stmt->error));
			}
			// Execute
			$rc		=	$stmt->execute();
			if ($rc === false)
			{
				throw new Exception('mig_err: execute() failed: ' . htmlspecialchars($stmt->error));
			}
		}
		
	}
	
	private function setData()
	{
		switch ($this->list)
		{
			case 'review':
				$q		=	"SELECT * FROM inventory_submissions WHERE aleAsset='$this->aleAsset'";
				$r		=	db_query($q, $this->conn);
				$count	=	$r->num_rows;
				$r->data_seek(0);
				$this->data	=	$r->fetch_array(MYSQLI_ASSOC);
				break;
			case 'itemlist':
				// Set all data except: photos, item category
				$q		=	"SELECT allitems.*,  alestorelistings.*, all_accounting.*, itemsforemp.*, manufacturers.*,
							models.*, brands.*, vendors.*
							FROM db_old.allitems
							LEFT JOIN alestorelistings ON  allitems.aleListingID = alestorelistings.aleListingID
							LEFT JOIN all_accounting ON allitems.aleAsset = all_accounting.aleAsset
							LEFT JOIN itemsforemp ON allitems.aleAsset = itemsforemp.aleAsset
							LEFT JOIN manufacturers ON allitems.mnfrID = manufacturers.mnfrID
							LEFT JOIN models ON alestorelistings.modelID = models.modelID
							LEFT JOIN brands ON allitems.brandID = brands.brandID
							LEFT JOIN vendors ON all_accounting.vendorID = vendors.vendorID
							WHERE allitems.aleAsset = '$this->aleAsset'";
				$r		=	db_query($q, $this->conn);
				if (!$r || $r->num_rows===0) {
					throw new Exception('ALE Asset get item data failed: ' . $this->aleAsset);
				}
				$r->data_seek(0);
				$this->data	=	$r->fetch_array(MYSQLI_ASSOC);
				$this->data['aleAsset']=$this->aleAsset;
// 				print_r($this->data);
				
				// Set photos
				$q		=	"SELECT imgUrl, imgOrder FROM photosalestore WHERE aleAsset='$this->aleAsset'";
				$r		=	db_query($q, $this->conn);
				if (!$r) {
					throw new Exception('ALE Asset get photo data failed: ' . $this->aleAsset);
				}
				for ($j = 0 ; $j < $r->num_rows ; $j++)
				{
					$r->data_seek($j);
					$row							=	$r->fetch_array(MYSQLI_ASSOC);
					$row['imgUrl']					=	str_replace('images', 'img', $row['imgUrl']);
					$this->photos[$row['imgOrder']]	=	$row['imgUrl'];
				}
				
				// Set categories
				$q		=	"SELECT aleListingID from alestorelistings WHERE modelID = {$this->data['modelID']}";
				$r		=	db_query($q, $this->conn);
				if (!$r) {
					throw new Exception('ALE Asset get listingID data failed: ' . $this->aleAsset);
				}
				$r->data_seek(0);
				$row	=	$r->fetch_array(MYSQLI_NUM);
				$alid	=	$row[0];
				
				$q		=	"SELECT categoryID FROM listing_category WHERE aleListingID = $alid";
				$r		=	db_query($q, $this->conn);
				if (!$r) {
					throw new Exception('ALE Asset get category data failed: ' . $this->aleAsset);
				}
				for ($j = 0 ; $j < $r->num_rows ; $j++)
				{
					$r->data_seek($j);
					$row			=	$r->fetch_array(MYSQLI_ASSOC);
					$this->catIDs[]	=	$row['categoryID'];
				}
				break;
		}
	}
}

// Establish Connections
$oldUser	=	array(	'db'	=>	array(
								'user'	=>	'admin',
								'pass'	=>	'euphrates8@N@N@$'
								),
						'user'	=>	array(
								'name'		=>	'Guest'
								)
						);
$newUser	=	array(	'db'	=>	array(
								'user'	=>	'admin',
								'pass'	=>	'euphrates8@N@N@$'
								),
						'user'	=>	array(
								'name'	=>	'admin'
								)
						);
$oldConn		=	db_connect('old_db', $oldUser);
$newConn		=	db_connect(AL_DB, $newUser);


// Collect all asset numbers from the old db
$aleAsset	=	array();
echo '<pre>';
$q			=	'SELECT aleAsset FROM allitems';
$r			=	db_query($q, $oldConn);
for ($j = 0 ; $j < $r->num_rows ; $j++)
{
	$r->data_seek($j);
	$row		=	$r->fetch_array(MYSQLI_ASSOC);
	$aleAsset[]	=	$row['aleAsset'];
}

// Get the data from the old record, convert it to a new record
$stop	=	3;
$k		=	0;
foreach ($aleAsset as $asset)
{
// 	if ($k == $stop) break;
// 	else $k++;
	$record		=	new OldRecord($asset, 'itemlist', $oldConn);
	print_r($record->data);
// 	print_r($record->photos);
// 	print_r($record->catIDs);
 	$newRecord	=	new NewRecord($record, $newConn);
 	//print_r($newRecord->data);
// 	break;
}
echo 'Done';
