<?php
$q		=	"SELECT
			general_listings.id,
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
			AND adverts_listings.type = '$adType' 
			AND adverts_listings.start_date <= DATE(NOW()) 
			AND adverts_listings.end_date > DATE(NOW()) WHERE general_listings.active=1
			ORDER BY RAND();";