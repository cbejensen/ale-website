<?php
/*
 * This is the Store's search page.
 * Results for all queries will be shown via this template.
 * It supports pagination, as well as user-defined layout/sorting.
 */
	require_once LIB_PATH . '/paginator/paginator.php';
	$select	=	"SELECT
				general_listings.id,
				general_listings.title_extn,	general_listings.description,
				general_listings.price,			general_listings.item_condition,
				general_listings.testing,		general_listings.warranty,
				general_listings.components,	general_listings.condition_note,
				manufacturers.mnfr, 			models.model,
				models.function_desc,
				brands.brand,					ad_photos.url,
				ad_photos.alt";

//				( (1.3 * (MATCH(manufacturers.mnfr) AGAINST ('detect*' IN BOOLEAN MODE))) + (0.6 * (MATCH(general_listings.description) AGAINST ('detect*' IN BOOLEAN MODE)))) AS relevance
	$from	=	" FROM general_listings
				LEFT JOIN manufacturers ON general_listings.mnfrID = manufacturers.id
				LEFT JOIN models ON general_listings.modelID = models.id
				LEFT JOIN brands ON general_listings.brandID = brands.id
				LEFT JOIN ad_photos ON general_listings.id = ad_photos.listingID
				AND ad_photos.display_order = 1 ";
	
	$conn	=	db_connect(AL_DB, $this->userData);
	if (isset($_GET['category']))
	{
		$category		=	explode(',', htmlspecialchars($_GET['category'], ENT_QUOTES)); // Category accepts two comma-separated arguments. The second is the mode of getCategoryName()
		$category_name	=	getCategoryName($category[0], $category[1]);
		$from			.=	"JOIN listing_category ON general_listings.id = listing_category.listingID
							AND listing_category.categoryID = $category[0] ";
	}
	if (isset($_GET['q']))
	{
		$oqs		=	htmlentities($_GET['q'], ENT_QUOTES);
		$qs			=	explode(' ', $oqs);
		$where		=	"WHERE (general_listings.active=1) AND (";
		$select		.=	', (';
		foreach ($qs as $key)
		{
			$where	.=	"MATCH(general_listings.description) AGAINST('$key*' IN BOOLEAN MODE) OR
						MATCH(components) AGAINST('$key*' IN BOOLEAN MODE) OR
						MATCH(item_condition) AGAINST('$key*' IN BOOLEAN MODE) OR
						MATCH(manufacturers.mnfr) AGAINST('$key*' IN BOOLEAN MODE) OR
						MATCH(models.model) AGAINST('$key*' IN BOOLEAN MODE) OR
						MATCH(models.function_desc) AGAINST('$key*' IN BOOLEAN MODE) OR
						MATCH(brands.brand) AGAINST('$key*' IN BOOLEAN MODE) OR ";
			$select	.=	"(1.3 * (MATCH(manufacturers.mnfr) AGAINST ('$key*' IN BOOLEAN MODE))) + (1.3 * (MATCH(models.model) AGAINST ('$key*' IN BOOLEAN MODE))) + (1.3 * (MATCH(models.function_desc) AGAINST ('$key*' IN BOOLEAN MODE))) + (0.6 * (MATCH(general_listings.description) AGAINST ('$key*' IN BOOLEAN MODE))) + ";
		}
		$where	=	substr($where, 0, -3); // Remove last " OR"
		$where	.=	") ORDER BY RELEVANCE DESC";
		$select	=	substr($select, 0, -3); // Remove last " + "
		$select	.=	') AS relevance ';
	} else {
		$where	=	"WHERE general_listings.active=1";
	}
	$q		=	$select . $from . $where;
	$pg		=	new Paginator($conn, $q);
// 	$limit	=	(isset($_GET['limit'])) ? htmlspecialchars($_GET['limit'], ENT_QUOTES) : null;
	if (isset($_GET['limit']) && is_numeric($_GET['limit']))
	{
		$limit	=	$_GET['limit'];
	} elseif (isset($_COOKIE['serp-limit'])) {
		$limit	=	$_COOKIE['serp-limit'];
	} else {
		$limit	=	null;
	}
	$rp		=	(isset($_GET['rp'])) ? htmlspecialchars($_GET['rp'], ENT_QUOTES) : null;
	$lc		=	(isset($_GET['lc'])) ? htmlspecialchars($_GET['lc'], ENT_QUOTES) : null;
// 	$layout	=	(isset($_GET['lo'])) ? htmlspecialchars($_GET['lo'], ENT_QUOTES) : null;
	if (isset($_GET['lo']))
	{
		$layout	=	htmlspecialchars($_GET['lo'], ENT_QUOTES);
	} elseif (isset($_COOKIE['serp-format'])) {
		$layout	=	$_COOKIE['serp-format'];
	} else {
		$layout	=	null;
	}
	$r		=	$pg->getPageData($limit, $rp);
	$links	=	$pg->createLinks(4, $lc);
?>
<div class="store-results">
	<?php if (!empty($oqs)) : ?>
	<h1 class="section-head">Search Results for "<?php echo $oqs; ?>"</h1>
	<?php else : ?>
	<h1 class="section-head"><?php echo $category_name; ?></h1>
	<?php endif; ?>
	<?php if ($r->page == 1) : ?>
		<h2><?php echo $r->total . ' results'; ?></h2>
	<?php else : ?>
		<h2><?php echo 'Page ' . $r->page . ' of ' . $r->total . ' results'; ?></h2>
	<?php endif; ?>
	<?php 
		Paginator::getSearchToolbar();
		$ad_i	=	0;
		$i		=	0;
		foreach ($r->data as $ad)
		{
			$title	=	"{$ad['mnfr']} {$ad['brand']} {$ad['model']} {$ad['function_desc']} {$ad['title_extn']}";
			$url	=	"?controller=public&action=listing&section=store&title=$title&ltype=general&id={$ad['id']}";
			switch ($layout)
			{
				case 'grid':
					include PUBLIC_PATH . '/view/inc/ads/featured_ad.php';
					break;
				case 'list':
					include PUBLIC_PATH . '/view/inc/ads/list_item.php';
					break;
				default:
					include PUBLIC_PATH . '/view/inc/ads/featured_ad.php';
			}
			$i++;
		}
		echo $links;
	?>
</div>
