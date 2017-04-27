<?php 
/*
 * This is the index of the Store section of the site.
 * It should contain prompts and links to each of the subsections, which
 * are also accessible by the top nav menu.
 * 
 * Jack Brown
 * April 13, 2017
 */
?>

<header class="store-head">
	<h1 class="section-head pageContent">Equipment Catalog</h1>
	<p class="subhead page-subtitle">We offer a wide range of products and services, including our specialty service,
	developing Premium Automation Solutions for laboratories to help improve their throughput, efficiency,
	and reproducibility.  We also have a large, dynamic selection of specialized laboratory equipment, as well as more
	general lab apparatus.</p>
</header>
<section class="new-equipment-ad-section ads-section">
	<div class="new-equip-wrap">
		<h2 class="section-head pageContent">New Arrivals</h2>
		<?php //getNewArrivals(); ?>
		<img id="leftArrow" class="left-arrow" src="img/interface/left-arrow.png" alt="Click here to browse the previous equipment" onclick="moveFeaturedAds(0, 0);">
		<div class="ads-wrap">
			<?php $this->model->getAds($this->userData, 'newly-arrived', 'cards'); ?>
		</div>
		<img id="rightArrow" class="right-arrow" src="img/interface/right-arrow.png" alt="Click here to browse the next equipment" onclick="moveFeaturedAds(1, 0)">
	</div>
</section>
<!-- <section class="monthly-specials-ad-section ads-section"> -->
<!-- 	<div class="specials-wrap"> -->
<!-- 		<h2 class="section-head pageContent">Monthly Equipment Specials</h2> -->
	 		<?php //getMontlySpecials(); ?>
<!--		<img id="leftArrow" class="left-arrow" src="img/interface/left-arrow.png" alt="Click here to browse the previous equipment" onclick="moveFeaturedAds(0, 1);">-->
<!-- 		<div class="ads-wrap"> -->
			<?php //$this->model->getAds($this->userData, 'monthly-special', 'cards'); ?>
<!-- 		</div> -->
<!--		<img id="rightArrow" class="right-arrow" src="img/interface/right-arrow.png" alt="Click here to browse the next equipment" onclick="moveFeaturedAds(1, 1)">-->
<!-- 	</div> -->
<!-- </section> -->
<section class="hve-ads-section ads-section">
	<div class="hve-wrap">
		<h2 class="section-head pageContent">Featured Premium Equipment</h2>
		<p class="subhead pageContent" style="margin-left: 0;">ALE provides tested, reconditioned, and refurbished equipment: reliable products
		backed by outstanding service.</p>
		<?php //getFeaturedEquipment(); ?>
		<img id="leftArrow" class="left-arrow" src="img/interface/left-arrow.png" alt="Click here to browse the previous equipment" onclick="moveFeaturedAds(0, 2);">
		<div class="ads-wrap">
			<?php $this->model->getAds($this->userData, 'featured', 'cards'); ?>
		</div>
		<img id="rightArrow" class="right-arrow" src="img/interface/right-arrow.png" alt="Click here to browse the next equipment" onclick="moveFeaturedAds(1, 2)">
	</div>
</section>
<section class="outlet-ad-section pageContent" style="padding-left: 1rem;">
		<img src="" alt="">
		<h2 class="section-head">Outlet Store</h2>
		<span>As-Is instrumentation on our eBay store.</span>
		<p>We specialize in pre-owned, biotech, pharmaceutical,
		and basic research laboratory equipment. Many of our listings
		feature fully tested, functional equipment, and we offer units
		"as-is" and "for parts" at discounted prices. We also carry
		lab supplies and consumables.</p>
		<a href="" class="gradient-button">View Catalog</a>
	</section>
