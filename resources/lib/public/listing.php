<?php 
/*
 * The GenListing class represents the state of a SINGLE general listing. 
 * It also includes static methods for manipulation 
 * of the general listing records.
 */

class GenListing
{
	public $ad		=	array(	'id'			=>	null,
								'mnfrID'		=>	null,
								'modelID'		=>	null,
								'brandID'		=>	null,
								'title_extn'	=>	null,
								'description'	=>	null,
								'price'			=>	null,
								'item_condition'=>	null,
								'testing'		=>	null,
								'warranty'		=>	null,
								'components'	=>	null,
								'condition_note'=>	null,
								'mnfr'			=>	null,
								'model'			=>	null,
								'function_desc'	=>	null,
								'brand'			=>	null
						);
	public $photos	=	array(	'url'	=>	array(),
								'alt'	=>	array(),
								'date'	=>	array()
						);
	public $title;
	private $conn;
	
	public function __construct($id, &$conn)
	{
		$this->ad['id']		=	htmlspecialchars($id, ENT_QUOTES);
		$this->conn			=	$conn;
		
		// Get listing data
		try {
			$r				=	$this->getListingData();
			if (!$r)
			{
				throw new Exception('DB returned 0 results for supplied general listing ID.');
			}
		} catch (Exception $e) {
			// return false? log error?
			throw new Exception($e->getMessage);
		}
		
		
		// Set listing title
		$this->setTitle();
		
		
		// Get photos
		try {
			$r				=	$this->setPhotos();
			if (!$r)
			{
				error_log("[General Listing #$id] No photos found.");
				//throw new Exception('DB returned 0 photos for supplied general listing ID.');
			}
		} catch (Exception $e) {
			// return false? log error?
			throw new Exception($e->getMessage);
		}
	}
	
	public function getPhotos($class = '')
	{
		$imgs	=	array();
		$k		=	1;
		foreach ($this->photos['url'] as $photo)
		{
			$imgs[]	=	array(	'url'	=>	$this->photos['url'][$k],
								'alt'	=>	$this->photos['alt'][$k]
						);
			$k++;
		}
		foreach ($imgs as $img)
		{
			include	PUBLIC_PATH . '/view/inc/ads/img.php';
		}
	}
	
	private function getListingData()
	{
		$a			=	array();
		$q			=	'SELECT
						a.id, a.mnfrID, a.modelID, a.brandID, a.title_extn,
						a.description, a.price, a.item_condition, a.testing,
						a.warranty, a.components, a.condition_note,
						b.mnfr, c.model, c.function_desc, d.brand
						FROM general_listings a
						LEFT JOIN manufacturers b ON a.mnfrID = b.id
						LEFT JOIN models c ON a.modelID = c.id
						LEFT JOIN brands d ON a.brandID = d.id
						WHERE a.id=? AND a.active=1;';
		$stmt		=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('i', $this->ad['id']);
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
		if ($r->num_rows == 0)
		{
			// Error
			$result	=	false;
		} else {
			$r->data_seek(0);
			$listing		=	$r->fetch_array(MYSQLI_ASSOC);
			
			foreach ($this->ad as $key => $value)
			{
				if ($listing[$key] == '') continue;
				else {
					$this->ad[$key]	=	$listing[$key];
				}
			}
			
			$result	=	true;
		}
		return $result;
	}
	
	private function setTitle()
	{
		$title									=	$this->ad['mnfr'] . ' ';
		if (!empty($this->ad['brand'])) $title	.=	$this->ad['brand'] . ' ';
		if (!empty($this->ad['model'])) $title	.=	$this->ad['model'] . ' ';
		$title									.=	$this->ad['function_desc'] . ' ';
		$title									.=	$this->ad['title_extn'];
		$this->title							=	$title;
	}
	
	private function setPhotos()
	{
		$q		=	"SELECT url, alt, time_added
					FROM ad_photos
					WHERE listingID=?
					ORDER BY display_order;";
		$stmt				=	$this->conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('prepare() failed: ' . htmlspecialchars($this->conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('i', $this->ad['id']);
		if ($rc === false)
		{
			throw new Exception('bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$r		=	$stmt->execute();
		if ($r === false)
		{
			throw new Exception('execute() failed: ' . htmlspecialchars($stmt->error));
		}
		$r 		= 	$stmt->get_result();
		$count	=	$r->num_rows;
		if ($count === 0)
		{
			$r	=	false;
		} else {
			$k 		=	1; // Index for photo display order
			for ($j = 0 ; $j < $count ; $j++)
			{
				$r->data_seek($j);
				$img	=	$r->fetch_array(MYSQLI_ASSOC);
				$this->photos['url'][$k]	=	$img['url'];
				$this->photos['alt'][$k]	=	$img['alt'];
				$this->photos['date'][$k]	=	$img['time_added'];
				$k++;
			}
			$r	=	true;
		}
		return $r;
	}
	
	public function updateListing()
	{
		
	}
	
	public static function createListing()
	{
		
	}
	
	public static function deleteListing()
	{
		
	}
}
