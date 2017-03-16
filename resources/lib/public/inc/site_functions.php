<?php 

function getFeaturedAds($userData)
{
	$conn	=	db_connect(AL_DB, $userData);
	
	$q		=	"SELECT 
				a.mnfr, b.model, c.brand, d.title_extn,
				d.description, d.price, d.item_condition, d.testing,
				d.warranty, d.components, d.condition_note 
				FROM
				manufacturers a, models b, brands c,
				general_listings d, adverts_listings e
				WHERE
				a.id	=	d.mnfrID AND
				b.id	=	d.modelID AND
				c.id	=	d.brandID AND
				d.id	=	e.listingID AND
				e.type	=	'featured' AND
				e.start_date	<=	DATE(NOW()) AND
				e.end_date		>	DATE(NOW());";
	
	
}
