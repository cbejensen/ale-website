<?php 
/*
 * The Listing class represents the state of a listing. 
 * It also includes static methods for manipulation 
 * of the listing records.
 */

class Listing
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
		$this->ad['id']		=	$id;
		$this->conn			=	$conn;
		// Get listing data
		$q					=	"SELECT
								a.*, b.mnfr, c.model, c.function_desc, d.brand
								FROM general_listings a
								LEFT JOIN manufacturers b ON a.mnfrID = b.id
								LEFT JOIN models c ON a.modelID = c.id
								LEFT JOIN brands d ON a.brandID = d.id
								WHERE a.id=$id;";
		$r	=	db_query($q, $this->conn);
		if ($r->num_rows == 0)
		{
			// Error
		}
		$r->data_seek(0);
		$listing		=	$r->fetch_array(MYSQLI_ASSOC);
		foreach ($this->ad as $key => $value)
		{
			if ($listing[$key] == '') continue;
			else {
				$this->ad[$key]	=	$listing[$key];
			}
		}
		// Set listing title
		$this->title	=	$this->ad['mnfr'] . ' ';
		if (!empty($this->ad['brand'])) $this->title	.=	$this->ad['brand'] . ' ';
		if (!empty($this->ad['model'])) $this->title	.=	$this->ad['model'] . ' ';
		$this->title	.=	$this->ad['function_desc'] . ' ';
		$this->title	.=	$this->ad['title_extn'];
		// Get photos
		$q		=	"SELECT url, alt, time_added 
					FROM ad_photos 
					WHERE listingID={$this->ad['id']}
					ORDER BY display_order;";
		$r		=	db_query($q, $this->conn);
		$count	=	$r->num_rows;
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
