<?php
/*
 * This is the Waters Equipment page, under the Products & Services section.
 * This page contains information about the products related to our
 * partnership with Waters Corp., in Milford, MA
 */
?>
<main class="list-main site-main pageContent">
	<h1 class="section-head">Analytical Equipment by Waters Corp.</h1>
	<p class="subhead">Located in nearby Milford, MA, Waters Corp. provides state-of-the-art
	analytical laboratory equipment, specializing in Ultra Perfomance Liquid Chromatography (UPLC).</p>
	<div class="list-wrap">
		<?php $this->model->getAds($this->userData, 'waters', 'banner'); ?>
	</div>
</main>