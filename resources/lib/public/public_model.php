<?php
/*
 * The Public model manipulates the state of the application as it relates 
 * to the public webpages.
 */

class PublicModel
{	
	public function getFeaturedAds($userData)
	{
		$conn	=	db_connect(AL_DB, $userData);
		
		$q		=	"SELECT
					general_listings.title_extn,	general_listings.description,
					general_listings.price,			general_listings.item_condition,
					general_listings.testing,		general_listings.warranty,
					general_listings.components,	general_listings.condition_note,
					manufacturers.mnfr, 			models.model,
					models.function_desc,
					brands.brand,					ad_photos.url,
					ad_photos.alt
					FROM general_listings
					LEFT JOIN manufacturers ON general_listings.mnfrID = manufacturers.id
					LEFT JOIN models ON general_listings.modelID = models.id
					LEFT JOIN brands ON general_listings.brandID = brands.id
					LEFT JOIN ad_photos ON general_listings.id = ad_photos.listingID 
					AND ad_photos.display_order = 1
                    JOIN adverts_listings ON general_listings.id = adverts_listings.listingID 
					AND adverts_listings.type = 'featured' 
					AND adverts_listings.start_date <= DATE(NOW()) 
					AND adverts_listings.end_date > DATE(NOW());";
		
		$r		=	db_query($q, $conn);
		($r->num_rows < 10) ? $count = $r->num_rows : $count = 10;
		for ($j = 0 ; $j < $count ; $j++)
		{
			$r->data_seek($j);
			$ad		=	$r->fetch_array(MYSQLI_ASSOC);
			$title	=	"{$ad['mnfr']} {$ad['brand']} {$ad['model']} {$ad['function_desc']} {$ad['title_extn']}"; 
			include PUBLIC_PATH . '/view/inc/ads/featured_ad.php';
		}
	}
}