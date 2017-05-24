<?php 
/*
 * This is the migrator of records from the old database structure to
 * the new one. 
 * It gets the data for each old record and creates a new one.
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
		 *
		 */
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
		
		try {
			// Itemlist
			$q	=	"INSERT INTO";
			$r	=	db_query($q, $this->conn);
			if (!$r)
			{
				throw new Exception('INSERT INTO itemlist: Failed');
			}
			// Accounting
			$q	=	"INSERT INTO";
			$r	=	db_query($q, $this->conn);
			if (!$r)
			{
				throw new Exception('INSERT INTO item_accounting: Failed');
			}
			// Novartis EMP, if applicable
			if ($this->data['track'] == 2 || $this->data['track'] == 4 || $this->data['track'] == 5)
			{
				$q	=	"INSERT INTO";
				$r	=	db_query($q, $this->conn);
				if (!$r)
				{
					throw new Exception('INSERT INTO emp: Failed');
				}
			}
		} catch (Exception $e) {
			$q	=	"INSERT INTO migrator_error (type, asset, note) VALUES ";
			$q	.=	"('Failed Record', '{$this->oldRec->data['aleAsset']}', '{$e->getMessage()}')";
			$r	=	db_query($q, $this->conn);
		}
	}
	
	private function addPhotos()
	{
		
	}
	
	private function addCategories()
	{
		
	}
	
	private function setAsset()
	{
		$aleAsset	=	$this->oldRec->data['aleAsset'];
		if (is_numeric(substr($aleAsset, 0, 1)))
		{
			$this->data['aleAsset']	=	$aleAsset;
			$this->data['track']	=	8;
		}
		elseif (is_numeric(substr($aleAsset, 1, 1)))
		{
			$this->data['aleAsset']	=	substr($aleAsset, 1);
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
			$this->data['aleAsset']	=	substr($aleAset, 2);
			$this->data['track']	=	5;
		}
		else
		{
			throw new Exception('ALE Asset is invalid');
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
		
		$q	=	"INSERT IGNORE INTO vendors (vendor) VALUES ('{$this->oldRec->data['vendor']}')";
		$r	=	db_query($q, $this->conn);
		
		$q	=	"SELECT id FROM vendors WHERE vendor='{$this->oldRec->data['vendor']}'";
		$r	=	db_query($q, $this->conn);
		$r->data_seek(0);
		$row					=	$r->fetch_array(MYSQLI_ASSOC);
		$this->data['vendorID']	=	$row['id'];
	}
	
	private function setSubitemOf()
	{
		$q	=	"INSERT IGNORE INTO subitem_of (subitem_of) VALUES ('{$this->oldRec->data['subitem_of']}')";
		$r	=	db_query($q, $this->conn);
		
		$q	=	"SELECT id FROM subitem_of WHERE subitem_of='{$this->oldRec->data['subitem_of']}'";
		$r	=	db_query($q, $this->conn);
		$r->data_seek(0);
		$row						=	$r->fetch_array(MYSQLI_ASSOC);
		$this->data['subitem_of']	=	$row['id'];
	}
	
	private function setMnfr()
	{
		$q	=	"INSERT IGNORE INTO manufacturers (mnfr, subitem_of) VALUES ('{$this->oldRec->data['mnfr']}', {$this->data['subitem_of']})";
		$r	=	db_query($q, $this->conn);
		
		$q	=	"SELECT id FROM manufacturers WHERE mnfr='{$this->oldRec->data['mnfr']}'";
		$r	=	db_query($q, $this->conn);
		$r->data_seek(0);
		$row					=	$r->fetch_array(MYSQLI_ASSOC);
		$this->data['mnfr']		=	$row['id'];
	}
	
	private function setModel()
	{
		$q	=	"INSERT IGNORE INTO models (model, function_desc) VALUES ('{$this->oldRec->data['model']}', '{$this->data['titleFuncDescription']}')";
		$r	=	db_query($q, $this->conn);
		
		$q	=	"SELECT id FROM models WHERE model='{$this->oldRec->data['model']}'";
		$r	=	db_query($q, $this->conn);
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
		$q	=	"INSERT IGNORE INTO brands (brand) VALUES ('{$this->oldRec->data['brand']}')";
		$r	=	db_query($q, $this->conn);
		
		$q	=	"SELECT id FROM brands WHERE brand='{$this->oldRec->data['brand']}'";
		$r	=	db_query($q, $this->conn);
		$r->data_seek(0);
		$row						=	$r->fetch_array(MYSQLI_ASSOC);
		$this->data['brand']		=	$row['id'];
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
		$this->setData();
		
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
							FROM allitems
							LEFT JOIN alestorelistings ON  allitems.aleListingID = alestorelistings.aleListingID
							LEFT JOIN all_accounting ON allitems.aleAsset = all_accounting.aleAsset
							LEFT JOIN itemsforemp ON allitems.aleAsset = itemsforemp.aleAsset
							LEFT JOIN manufacturers ON allitems.mnfrID = manufacturers.mnfrID
							LEFT JOIN models ON alestorelistings.modelID = models.modelID
							LEFT JOIN brands ON allitems.brandID = brands.brandID
							LEFT JOIN vendors ON all_accounting.vendorID = vendors.vendorID
							WHERE allitems.aleAsset = '$this->aleAsset'";
				$r		=	db_query($q, $this->conn);
				$r->data_seek(0);
				$this->data	=	$r->fetch_array(MYSQLI_ASSOC);
				
				// Set photos
				$q		=	"SELECT imgUrl, imgOrder FROM photosalestore WHERE aleAsset='$this->aleAsset'";
				$r		=	db_query($q, $this->conn);
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
				$r->data_seek(0);
				$row	=	$r->fetch_array(MYSQLI_NUM);
				$alid	=	$row[0];
				
				$q		=	"SELECT categoryID FROM listing_category WHERE aleListingID = $alid";
				$r		=	db_query($q, $this->conn);
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
								'user'	=>	'jack',
								'pass'	=>	'thisisthedb'
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
	if ($k == $stop) break;
	else $k++;
	$record		=	new OldRecord($asset, 'itemlist', $oldConn);
	print_r($record->data);
	print_r($record->photos);
	print_r($record->catIDs);
// 	$newRecord	=	new NewRecord($record, $newConn);
// 	break;
}
echo 'Done';
