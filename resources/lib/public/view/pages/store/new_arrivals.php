<?php
/*
 * This is the Newly-Arrived Equipment page, under the Products & Services section.
 * This page contains information about the products that have recently arrived and/or
 * made available. They can be any item, Premium or apparatus.
 */
?>
<h1 class="section-head">New Arrivals</h1>
<p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Praesent dictum felis lobortis, fermentum lectus at, pharetra leo. Mauris luctus 
urna id dolor elementum imperdiet. Etiam maximus dignissim libero, vel vestibulum 
mauris congue sit amet. In pulvinar sapien ac ex posuere, vitae ullamcorper lacus 
feugiat. Nullam et elit ut massa lacinia commodo.</p> 
<!-- <p class="subhead">Located in nearby Milford, MA, Waters Corp. provides state-of-the-art
analytical laboratory equipment, specializing in Ultra Perfomance Liquid Chromatography (UPLC).</p>-->
<div class="list-wrap">
	<?php $this->model->getAds($this->userData, 'newly-arrived', 'banner'); ?>
</div>
