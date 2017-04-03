<?php
/*
 * This is the Monthly Specials page, under the Products & Services section.
 * This page contains information about the products we'd like to push in the
 * given month. These will mostly be automation-related equipment, as opposed to
 * more general apparatus.
 */
?>
<main class="list-main site-main pageContent">
	<h1 class="section-head">Monthly Specials</h1>
	<!-- <p class="subhead">Located in nearby Milford, MA, Waters Corp. provides state-of-the-art
	analytical laboratory equipment, specializing in Ultra Perfomance Liquid Chromatography (UPLC).</p>-->
	<div class="list-wrap">
		<?php $this->model->getAds($this->userData, 'monthly-special', 'list'); ?>
	</div>
</main>