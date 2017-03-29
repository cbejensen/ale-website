<?php 
/*
 * This is the index of the Products and Services section of the site.
 * It should contain prompts and links to each of the subsections, which
 * are also accessible by the top nav menu.
 * 
 * The Premium Automation solutions have the top spot,
 * but there should be a number of listings/ads on the page as well.
 * 
 * Jack Brown
 * March 7, 2017
 */
?>
<script src="../resources/lib/public/js/public.js"></script>
<main class="products-main site-main">
	<h1 class="section-head pageContent">Products &amp; Services</h1>
	<p class="subhead page-subtitle pageContent">We offer a wide range of products and services, including our specialty services,
	developing premium Automation Solutions for laboratories to help improve their throughput, effieciency,
	and reproducibility. We also have a large, dynamic selection of specialized laboratory equipment, as well as more
	general lab apparatus.</p>
	<section class="auto-solutions-section">
		<div class="auto-solutions-wrap pageContent">
			<h2 class="section-head">Premium Automation Solutions</h2>
			<div class="auto-solutions-column">
				<img class="material" src="img/content/system_integration.png" alt="Biotech Laboratory Automation via Equipment Integration">
				<h3 class="section-head">Integrated Automation</h3>
				<p>Integrating devices to your liquid handling platform can 
				improve	the process flow and overall throughput in your lab.
				ALE has experience integrating devices and confidence in our
				ability to customize a solution for your needs.</p>
				<a href="" class="gradient-button">Learn More</a>
			</div>
			<div class="auto-solutions-column">
				<img class="material" src="img/content/system_installation.png" alt="Installation of an automated Liquid Handling workstation for biological applications">
				<h3 class="section-head">Installation &amp;&nbsp;Training</h3>
				<p>Installation and training will help you deliver timely
				results. Following the manufacturer's installation procedures
				is imperative for the overall performance of your systems.
				ALE provides top-quality installation and training, addressing
				both regulatory and safety concerns.</p>
				<a href="" class="gradient-button">Learn More</a>
			</div>
			<div class="auto-solutions-column">
				<img class="material" src="img/content/applications.png" alt="A Mass Spectrometer as part of an itegrated system developed for proteomic applications">
				<h3 class="section-head">Application Development &amp;&nbsp;Service</h3>
				<p>Providing a total solution from pre-sales evaluation to post-sales
				support is critical for the success of your lab. The team at ALE is
				capable of providing first-rate application method templates, hardware,
				software technical support and service contracts.</p>
				<a href="" class="gradient-button">Learn More</a>
			</div>
		</div>
	</section><!-- 
	<section class="premium-equipment-section material">
		<div class="prem-equip-wrap pageContent">
			<img src="" alt="">
			<h2 class="section-head">Premium Equipment</h2>
			<span>ALE provides tested, reconditioned, and refurbished equipment: reliable products
			backed by outstanding service. --> <!-- Link prior stmt to testimonials? --> <!-- </span>
			<span>Our extensive, premium inventory includes:</span>
			<ul>
				<li>Liquid handlers</li>
				<li>Laboratory automation instruments</li>
				<li>HPLC, FPLC, GC, and Mass Spectrometry Analytical Systems</li>
				<li>Thermal cyclers</li>
				<li>PCR systems</li>
				<li>DNA sequencers</li>
				<li>Imaging Systems</li>
				<li>Microplate readers &amp; washers</li>
			</ul>
			<a href="">View Catalog</a>
		</div>
	</section> -->
	<section class="hve-ads-section material ads-section">
		<div class="hve-wrap">
			<h2 class="section-head pageContent">Featured Premium Equipment</h2>
			<p class="subhead pageContent">ALE provides tested, reconditioned, and refurbished equipment: reliable products
			backed by outstanding service.</p>
			<?php //getFeaturedEquipment(); ?>
			<img id="leftArrow" class="left-arrow" src="img/interface/left-arrow.png" alt="Click here to browse the previous equipment" onclick="moveFeaturedAds(0, 0);">
			<div class="ads-wrap">
				<?php $this->model->getFeaturedAds($this->userData); ?>
			</div>
			<img id="rightArrow" class="right-arrow" src="img/interface/right-arrow.png" alt="Click here to browse the next equipment" onclick="moveFeaturedAds(1, 0)">
		</div>
	</section>
	<?php 
	/*
	 * 	An ad section requires the following:
	 * 		- section	->	.ads-section
	 * 		- wrapper	->	.ads-wrap
	 * 		- section	->	NOT .pageContent
	 */
	 ?>
	<section class="new-equipment-section material ads-section">
		<div class="new-equip-wrap">
			<h2 class="section-head pageContent">New Arrivals</h2>
			<?php //getNewArrivals(); ?>
			<img id="leftArrow" class="left-arrow" src="img/interface/left-arrow.png" alt="Click here to browse the previous equipment" onclick="moveFeaturedAds(0, 1);">
			<div class="ads-wrap">
				<?php $this->model->getFeaturedAds($this->userData); ?>
			</div>
			<img id="rightArrow" class="right-arrow" src="img/interface/right-arrow.png" alt="Click here to browse the next equipment" onclick="moveFeaturedAds(1, 1)">
		</div>
	</section>
	<section class="monthly-specials-section material ads-section">
		<div class="specials-wrap">
			<h2 class="section-head pageContent">Monthly Equipment Specials</h2>
			<?php //getMontlySpecials(); ?>
			<img id="leftArrow" class="left-arrow" src="img/interface/left-arrow.png" alt="Click here to browse the previous equipment" onclick="moveFeaturedAds(0, 2);">
			<div class="ads-wrap">
				<?php $this->model->getFeaturedAds($this->userData); ?>
			</div>
			<img id="rightArrow" class="right-arrow" src="img/interface/right-arrow.png" alt="Click here to browse the next equipment" onclick="moveFeaturedAds(1, 2)">
		</div>
	</section>
	<section class="waters-equipment-section material ads-section">
		<div class="waters-wrap">
			<h2 class="section-head pageContent">WATERS Analytical Equipment</h2>
			<?php //getWatersEquipment(); ?>
			<img id="leftArrow" class="left-arrow" src="img/interface/left-arrow.png" alt="Click here to browse the previous equipment" onclick="moveFeaturedAds(0, 3);">
			<div class="ads-wrap">
				<?php $this->model->getFeaturedAds($this->userData); ?>
			</div>
			<img id="rightArrow" class="right-arrow" src="img/interface/right-arrow.png" alt="Click here to browse the next equipment" onclick="moveFeaturedAds(1, 3)">
		</div>
	</section>
	<section class="outlet-ad-section material pageContent">
		<img src="" alt="">
		<h2 class="section-head">Outlet Equipment</h2>
		<span>As-Is instrumentation on our eBay store.</span>
		<p>We specialize in pre-owned, biotech, pharmaceutical,
		and basic research laboratory equipment. Many of our listings
		feature fully tested, functional equipment, and we offer units
		"as-is" and "for parts" at discounted prices. We also carry
		lab supplies and consumables.</p>
		<a href="">View Catalog</a>
	</section>
</main>
