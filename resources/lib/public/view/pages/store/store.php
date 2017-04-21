<script src="../resources/lib/public/js/public.js"></script>
<main class="store-main site-main pageContent">
	<div class="store-sidebar">
		<nav class="store-nav material">
			<h2 id="cat-browse-head" class="section-head">Browse by Category</h2>
			<ul>
				<li class="parent-category">
					<a class="pa menu-expand" id="analyt" onclick="expandCategory(this.id);">Analytical Instruments</a>
					<div id="analyt-d" class="bbc-dropdown">
						<ul>
							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=analytical">View All Analytical</a></li>
							<li><a href="">HPLC Systems &amp; Parts</a></li>
							<li><a href="">Gas Chromatography</a></li>
							<li><a href="">Mass Spectrometers</a></li>
							<li><a href="">Spectrophotometers</a></li>
						</ul>
					</div>
				</li>
				<li class="parent-category">
					<a class="pa menu-expand" id="automa" onclick="expandCategory(this.id);">Automation &amp; Robotics</a>
					<div id="automa-d" class="bbc-dropdown">
						<ul>
							<li><a href="">View All Liquid Handlers</a></li>
							<li><a href="">Liquid Handlers</a></li>
							<li><a href="">Plate Stackers</a></li>
							<li><a href="">Plate Sealers</a></li>
							<li><a href="">Plate Readers</a></li>
							<li><a href="">Plate Washers</a></li>
						</ul>
					</div>
				</li>
				<li class="parent-category">
					<a class="pa" id="centri" onclick="expandCategory(this.id);">Centrifuges</a>
					<div id="centri-d" class="bbc-dropdown bbc-hidden">
						<ul>
							<li><a href="">View All Centrifuges</a></li>
							<li><a href="">Benchtop</a></li>
							<li><a href="">Microcentrifuges</a></li>
							<li><a href="">Floor Centrifuges</a></li>
							<li><a href="">Rotors &amp; Parts</a></li>
						</ul>
					</div>
				</li>
				<li class="parent-category">
					<a class="pa" id="coolin" onclick="expandCategory(this.id);">Cooling Devices</a>
					<div id="coolin-d" class="bbc-dropdown bbc-hidden">
						<ul>
							<li><a href="">View All Cooling</a></li>
							<li><a href="">Freezers/Refrigerators</a></li>
							<li><a href="">Cryogenics</a></li>
							<li><a href="">Recirculating Chillers</a></li>
						</ul>
					</div>
				</li>
				<li class="parent-category">
					<a class="pa" id="electr" onclick="expandCategory(this.id);">Electrophoresis</a>
					<div id="electr-d" class="bbc-dropdown bbc-hidden">
						<ul>
							<li><a href="">View All Electrophoresis</a></li>
							<li><a href="">Power Supplies</a></li>
							<li><a href="">Cells/Chambers</a></li>
						</ul>
					</div>	
				</li>
				<li class="parent-category">
					<a class="pa" id="heatin" onclick="expandCategory(this.id);">Heating Devices</a>
					<div id="heatin-d" class="bbc-dropdown bbc-hidden">
						<ul>
							<li><a href="">View All Heating</a></li>
							<li><a href="">Laboratory Ovens</a></li>
							<li><a href="">Water Baths</a></li>
							<li><a href="">Dry Baths</a></li>
							<li><a href="">Recirculating Heaters</a></li>
							<li><a href="">Hotplates</a></li>
							<li><a href="">Incubators</a></li>
						</ul>
					</div>	
				</li>
				<li class="parent-category">
					<a class="pa" id="imagin" onclick="expandCategory(this.id);">Imaging</a>
					<div id="imagin-d" class="bbc-dropdown bbc-hidden">
						<ul>
							<li><a href="">View All Imaging</a></li>
							<li><a href="">Transilluminators</a></li>
							<li><a href="">Gel Imagers</a></li>
						</ul>
					</div>	
				</li>
				<li class="parent-category">
					<a class="pa" id="suppli" onclick="expandCategory(this.id);">Lab Supplies</a>
					<div id="suppli-d" class="bbc-dropdown bbc-hidden">
						<ul>
							<li><a href="">View All Supplies</a></li>
							<li><a href="">Disposables</a></li>
							<li><a href="">Filtration</a></li>
							<li><a href="">Frames, Supports, Clamps</a></li>
							<li><a href="">Pipettes</a></li>
							<li><a href="">Plasticware</a></li>
						</ul>
					</div>		
				</li>
				<li class="parent-category">
					<a class="pa menu-expand" id="micros" onclick="expandCategory(this.id);">Microscopes</a>
					<div id="micros-d" class="bbc-dropdown">
						<ul>
							<li><a href="">View All</a></li>
							<li><a href="">Microscopes</a></li>
							<li><a href="">Light Sources</a></li>
							<li><a href="">Parts</a></li>
						</ul>
					</div>
				</li>
				<li class="parent-category">
					<a class="pa" id="mixers" onclick="expandCategory(this.id);">Mixers &amp; Stirrers</a>
					<div id="mixers-d" class="bbc-dropdown bbc-hidden">
						<ul>
							<li><a href="">View All Mixers</a></li>
							<li><a href="">Stirrers</a></li>
							<li><a href="">Hotplate Stirrers</a></li>
							<li><a href="">Mixers</a></li>
							<li><a href="">Shakers</a></li>
							<li><a href="">Vortexers</a></li>
						</ul>
					</div>
				</li>
				<li class="parent-category">
					<a class="pa">Other Lab Equipment</a>
				</li>
				<li class="parent-category">
					<a class="pa menu-expand" id="pcrdna" onclick="expandCategory(this.id);">PCR DNA Thermal Cyclers</a>
					<div id="pcrdna-d" class="bbc-dropdown">
						<ul>
							<li><a href="">View All PCR</a></li>
							<li><a href="">Thermal Cyclers</a></li>
							<li><a href="">Parts, Heating Blocks</a></li>
						</ul>
					</div>
				</li>
				<li class="parent-category">
					<a class="pa" id="pumps" onclick="expandCategory(this.id);">Pumps</a>
					<div id="pumps-d" class="bbc-dropdown bbc-hidden">
						<ul>
							<li><a href="">View All Pumps</a></li>
							<li><a href="">Vacuum Pumps</a></li>
							<li><a href="">Peristaltic Pumps</a></li>
							<li><a href="">Multistaltic Pumps</a></li>
							<li><a href="">Gradient Pumps</a></li>
							<li><a href="">Quaternary Pumps</a></li>
						</ul>
					</div>
				</li>
				<li class="parent-category">
					<a class="pa" id="scales" onclick="expandCategory(this.id);">Scales &amp; Balances</a>
					<div id="scales-d" class="bbc-dropdown bbc-hidden">
						<ul>
							<li><a href="">View All Scales</a></li>
							<li><a href="">Digital Scales</a></li>
							<li><a href="">Balance Scales</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</nav>
	</div>
	<div class="main-store-content">
	<?php require $storePage; ?>
	</div>
</main>