<?php
/*
 * This is the Store's search page.
 * Results for all queries will be shown via this template.
 * It supports pagination, as well as user-defined layout/sorting.
 */
	require_once LIB_PATH . '/paginator/paginator.php';
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
				AND ad_photos.display_order = 1 ";
	
	$conn	=	db_connect(AL_DB, $this->userData);
	if (isset($_GET['category']))
	{
		$category	=	htmlspecialchars($_GET['category'], ENT_QUOTES);
		$q			.=	"JOIN listing_category ON general_listings.id = listing_category.listingID
						AND listing_category.categoryID = $category";
	}
	if (isset($_GET['q']))
	{
		$qs			=	htmlspecialchars($_GET['q'], ENT_QUOTES);
		$qs			=	explode(' ', $qs);
// 		$q			.=	"WHERE MATCH(description) AGAINST('micro*' IN BOOLEAN MODE)";
	}
	$pg		=	new Paginator($conn, $q);
?>
<div class="store-results">
	<?php echo $q . "\n\n"; ?>
	<?php print_r($qqq); ?>
</div>