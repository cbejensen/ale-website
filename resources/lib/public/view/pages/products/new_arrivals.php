<?php
/*
 * This is the Newly-Arrived Equipment page, under the Products & Services section.
 * This page contains information about the products that have recently arrived and/or
 * made available. They can be any item, Premium or apparatus.
 */
?>
<main class="list-main site-main pageContent">
	<h1 class="section-head">Newly-Arrived Equipment</h1>
	<!-- <p class="subhead">Located in nearby Milford, MA, Waters Corp. provides state-of-the-art
	analytical laboratory equipment, specializing in Ultra Perfomance Liquid Chromatography (UPLC).</p>-->
	<div class="list-wrap">
		<?php $this->model->getAds($this->userData, 'newly-arrived', 'list'); ?>
	</div>
</main>