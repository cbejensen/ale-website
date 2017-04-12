<?php 
/*
 * This is the content of the Premium Equipment page,
 * in the Products & Services section of the site.
 *
 * This is a small, condensed catalog of our Automation
 * equipment that's used in our integrations and application
 * development. It's intended to give visitors a
 * general idea of the equipment we offer for those services,
 * and to direct them to our other, more specific ads/listings
 * where they can purchase these instruments a la carte.
 * 
 * The views that are included in the content section are loaded via ajax,
 * and can be found in public/view/inc/prem_equip/
 */
?>
<main class="premium-equipment-main site-main pageContent">
	<h1 class="section-head">Premium Equipment</h1>
	<p class="section-intro">Our extensive inventory includes a myriad of instrumentation which enables
	automation of laboratory procedures. We develop custom
	integrated systems for specific applications using the our equipment, 
	and we're happy to provide these items individually, as well.</p>
	<p class="section-intro">Within each of the subsections below, you will find links to the appropriate listings
	of our catalog and more information on specific instruments.</p>
	<!-- <p class="section-intro">Alternatively, you can view our catalog in its entirety <a href="">here</a>.</p> -->
	<div class="equipment-array">
		<div data-name="tecan" class="equipment-category">
			<img src="img/content/tecan_evo.png" alt="Tecan EVO Liquid Handlers" class="circle material" data-name="tecan">
			<h2 data-name="tecan" class="section-head">Tecan Liquid Handlers</h2>
		</div>
		<div data-name="other_lh" class="equipment-category">
			<img src="img/content/hamilton_microlab.png" alt="Hamilton, Eppendorf, Beckman Coulter Liquid Handlers" class="circle material" data-name="other_lh">
			<h2 data-name="other_lh" class="section-head">Other Liquid Handlers</h2>
		</div>
		<div data-name="analytical" class="equipment-category">
			<img src="img/content/thermo_ms.png" alt="Thermo Scientific Mass Spectrometer" class="circle material" data-name="analytical">
			<h2 data-name="analytical" class="section-head">Analytical Systems</h2>
		</div>
		<div data-name="dna_seq" class="equipment-category">
			<img src="img/content/abi_dna_seq.png" alt="ABI DNA Sequencer" class="circle material" data-name="dna_seq">
			<h2 data-name="dna_seq" class="section-head">DNA Sequencers</h2>
		</div>
		<div data-name="readers" class="equipment-category">
			<img src="img/content/tecan_plate_reader.png" alt="Tecan M200 Plate Reader" class="circle material" data-name="readers">
			<h2 data-name="readers" class="section-head">Plate Readers</h2>
		</div>
		<div data-name="washers" class="equipment-category">
			<img src="img/content/biotek_plate_washer.png" alt="BIOTEK ELx405 Plate Washer" class="circle material" data-name="washers">
			<h2 data-name="washers" class="section-head">Plate Washers</h2>
		</div>
		<div data-name="sealers" class="equipment-category">
			<img src="img/content/velocity11_plate_sealer.png" alt="Velocity11 Automated Plate Sealer" class="circle material" data-name="sealers">
			<h2 data-name="sealers" class="section-head">Plate Sealers</h2>
		</div>
		<div data-name="centrifuges" class="equipment-category">
			<img src="img/content/velocity11_vspin.png" alt="Velocity11 Vspin Automated Centrifuge" class="circle material" data-name="centrifuges">
			<h2 data-name="centrifuges" class="section-head">Centrifuges</h2>
		</div>
	</div>
	<div class="equipment-content" id="content">
	<?php if (isset($subsection)) include_once PUBLIC_PATH . "/view/inc/prem_equip/$subsection.php"; ?>
	</div>
	<script src="../resources/lib/public/js/premium_equipment.js"></script>
</main>
