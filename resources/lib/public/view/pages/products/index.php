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
<main class="products-main site-main">
	<h1 class="section-head">Products &amp; Services</h1>
	<section class="auto-solutions-section">
		<div class="auto-solutions-wrap">
			<h1 class="section-head">Premium Automation Solutions</h1>
			<div class="auto-solutions-column">
				<img src="" alt="">
				<h2 class="section-head">Integrated Automation</h2>
				<p>Integrating devices to your liquid handling platform can 
				improve	the process flow and overall throughput in your lab.
				ALE has experience integrating devices and confidence in our
				ability to customize a solution for your needs.</p>
				<a href="">Learn More</a>
			</div>
			<div class="auto-solutions-column">
				<img src="" alt="">
				<h2 class="section-head">Installation &amp; Training</h2>
				<p>Installation and training will help you deliver timely
				results. Following the manufacturer's installation procedures
				is imperative for the overall performance of your systems.
				ALE provides top-quality installation and training, addressing
				both regulatory and safety concerns.</p>
				<a href="">Learn More</a>
			</div>
			<div class="auto-solutions-column">
				<img src="" alt="">
				<h2 class="section-head">Application Development &amp; Service</h2>
				<p>Providing a total solution from pre-sales evaluation to post-sales
				support is critical for the success of your lab. The team at ALE is
				capable of providing first-rate application method templates, hardware,
				software technical support and service contracts.</p>
				<a href="">Learn More</a>
			</div>
		</div>
	</section>
	<section class="premium-equipment-section">
		<img src="" alt="">
		<h1 class="section-head">Premium Equipment</h1>
		<span>ALE provides tested, reconditioned, and refurbished equipment: reliable products
		backed by outstanding service. <!-- Link prior stmt to testimonials? --></span>
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
	</section>
	<section class="hve-ads-section">
		<h1 class="section-head">Featured Premium Equipment</h1>
		<?php //getFeaturedEquipment(); ?>
	</section>
	<section class="new-equipment-section">
		<h1 class="section-head">New Arrivals</h1>
		<?php //getNewArrivals(); ?>
	</section>
	<section class="monthly-specials-section">
		<h1 class="section-head">Monthly Equipment Specials</h1>
		<?php //getMontlySpecials(); ?>
	</section>
	<section class="waters-equipment-section">
		<h1 class="section-head">WATERS Analytical Equipment</h1>
		<?php //getWatersEquipment(); ?>
	</section>
	<section class="outlet-ad-section">
		<img src="" alt="">
		<h1 class="section-head">Outlet Equipment</h1>
		<span>As-Is instrumentation on our eBay store.</span>
		<p>We specialize in pre-owned, biotech, pharmaceutical,
		and basic research laboratory equipment. Many of our listings
		feature fully tested, functional equipment, and we offer units
		"as-is" and "for parts" at discounted prices. We also carry
		lab supplies and consumables.</p>
		<a href="">View Catalog</a>
	</section>
</main>
