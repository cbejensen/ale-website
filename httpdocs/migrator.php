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
	private $conn;
	
	public function __construct($oldRecord, &$conn)
	{
		$this->conn		=	$conn;
		$this->oldRec	=	$oldRecord;
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
		 *
		 */
	}
	
	private function addPhotos()
	{
		
	}
	
	private function addCategories()
	{
		
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
				// Missing: photos, item category
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


$oldUser	=	array(	'db'	=>	array(
								'user'	=>	'jack',
								'pass'	=>	'thisisthedb'
						),
								'user'	=>	array(
									'name'		=>	'Guest'
							)
					);
$oldConn		=	db_connect('old_db', $oldUser);
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

foreach ($aleAsset as $asset)
{
	$record	=	new OldRecord($asset, 'itemlist', $oldConn);
	print_r($record->data);
	print_r($record->photos);
	print_r($record->catIDs);
	break;
}
