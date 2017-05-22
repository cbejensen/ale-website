<?php 
/*
 * This is the migrator of records from the old database structure to
 * the new one. 
 * It gets the data for each old record and creates a new one.
 */

require_once '../resources/config.php';
class OldRecord 
{
	public $aleAsset;
	public $list;
	private $conn;
	
	public function __construct($aleAsset, $list, &$oldConn)
	{
		$this->conn		=	$oldConn;
		$this->aleAsset	=	$aleAsset;
		switch ($this->list)
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
							WHERE allitems.aleAsset = $this->aleAsset";
				$r		=	db_query($q, $this->conn);
				$r->data_seek(0);
				$this->data	=	$r->fetch_array(MYSQLI_ASSOC);
				break;
		}
	}
}