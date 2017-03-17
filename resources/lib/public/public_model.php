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
					a.mnfr, 		b.model, 		b.function_desc, 	c.brand, 			
					d.title_extn,	d.description, 	d.price, 			d.item_condition, 	
					d.testing,		d.warranty,		d.components, 		d.condition_note,
					f.url,			f.alt,			f.display_order
					FROM
					manufacturers a, 		models b, 				brands c,
					general_listings d, 	adverts_listings e,		ad_photos f
					WHERE
					a.id	=	d.mnfrID AND
					b.id	=	d.modelID AND
					c.id	=	d.brandID AND
					d.id	=	e.listingID AND
					d.id	=	f.listingID AND
					e.type	=	'featured' AND
					e.start_date	<=	DATE(NOW()) AND
					e.end_date		>	DATE(NOW());";
		
		/*
		 * THIS QUERY NEEDS TO BE REFORMED WITH JOINS/UNIONS
		 */
		
		$r		=	db_query($q, $conn);
		$count	=	10; //$r->num_rows;
		for ($j = 0 ; $j < $count ; $j++)
		{
			$r->data_seek($j);
			$ad		=	$r->fetch_array(MYSQLI_ASSOC);
			$title	=	"{$ad['mnfr']} {$ad['brand']} {$ad['model']} {$ad['function_desc']} {$ad['title_extn']}"; 
			include PUBLIC_PATH . '/view/inc/ads/featured_ad.php';
		}
	}
}