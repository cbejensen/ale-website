<script src="js/public.js"></script>
<main class="store-main site-main pageContent">
	<div class="store-sidebar">
		<nav class="store-nav material">
			<h2 id="cat-browse-head" class="section-head">Browse by Category</h2>
			<ul>
				<li class="parent-category">
					<a class="pa menu-expand" id="analyt" onclick="expandCategory(this.id);">Analytical Instruments</a>
					<div id="analyt-d" class="bbc-dropdown">
						<ul>
							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=3,1&sb=analytical">View All Analytical</a></li>
							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=3,2&sb=analytical">HPLC Systems &amp; Parts</a></li>
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=4,2&sb=analytical">Gas Chromatography</a></li> -->
							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=5,2&sb=analytical">Mass Spectrometers</a></li>
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=6,2&sb=analytical">Spectrophotometers</a></li> -->
						</ul>
					</div>
				</li>
				<li class="parent-category">
					<a class="pa menu-expand" id="automa" onclick="expandCategory(this.id);">Automation &amp; Robotics</a>
					<div id="automa-d" class="bbc-dropdown">
						<ul>
							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=1,1&sb=automation">View All Automation</a></li>
							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=1,2&sb=automation">Liquid Handlers</a></li>
							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=8,2&sb=automation">Plate Readers</a></li>
							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=10,2&sb=automation">Plate Sealers</a></li>
							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=7,2&sb=automation">Plate Stackers</a></li>
							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=9,2&sb=automation">Plate Washers</a></li>
						</ul>
					</div>
				</li>
<!-- 				<li class="parent-category"> -->
<!--					<a class="pa menu-expand" id="centri" onclick="expandCategory(this.id);">Centrifuges</a>-->
<!-- 					<div id="centri-d" class="bbc-dropdown"> -->
<!-- 						<ul> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=12,1&sb=centrifuges">View All Centrifuges</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=12,2&sb=centrifuges">Benchtop</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=13,2&sb=centrifuges">Microcentrifuges</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=15,2&sb=centrifuges">Floor Centrifuges</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=14,2&sb=centrifuges">Rotors &amp; Parts</a></li> -->
<!-- 						</ul> -->
<!-- 					</div> -->
<!-- 				</li> -->
<!-- 				<li class="parent-category"> -->
<!--					<a class="pa" id="coolin" onclick="expandCategory(this.id);">Cooling Devices</a>-->
<!-- 					<div id="coolin-d" class="bbc-dropdown bbc-hidden"> -->
<!-- 						<ul> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=17,1&sb=cooling">View All Cooling</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=17,2&sb=cooling">Freezers/Refrigerators</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=19,2&sb=cooling">Cryogenics</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=20,2&sb=cooling">Recirculating Chillers</a></li> -->
<!-- 						</ul> -->
<!-- 					</div> -->
<!-- 				</li> -->
				<li class="parent-category">
					<a class="pa" id="dna-seq" href="?controller=public&action=store&section=store&title=All%20DNA%20Sequencers%20|%20ILLUMINA&category=67,1&sb=dna-seq">DNA Sequencers</a>
				</li>
<!-- 				<li class="parent-category"> -->
<!--					<a class="pa" id="electr" onclick="expandCategory(this.id);">Electrophoresis</a>-->
<!-- 					<div id="electr-d" class="bbc-dropdown bbc-hidden"> -->
<!-- 						<ul> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=46,1&sb=electrophoresis">View All Electrophoresis</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=46,2&sb=electrophoresis">Power Supplies</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=47,2&sb=electrophoresis">Cells/Chambers</a></li> -->
<!-- 						</ul> -->
<!-- 					</div>	 -->
<!-- 				</li> -->
<!-- 				<li class="parent-category"> -->
<!--					<a class="pa" id="heatin" onclick="expandCategory(this.id);">Heating Devices</a>-->
<!-- 					<div id="heatin-d" class="bbc-dropdown bbc-hidden"> -->
<!-- 						<ul> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=22,1&sb=heating">View All Heating</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=22,2&sb=heating">Laboratory Ovens</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=23,2&sb=heating">Water Baths</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=24,2&sb=heating">Dry Baths</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=25,2&sb=heating">Recirculating Heaters</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=26,2&sb=heating">Hotplates</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=28,2&sb=heating">Incubators</a></li> -->
<!-- 						</ul> -->
<!-- 					</div>	 -->
<!-- 				</li> -->
<!-- 				<li class="parent-category"> -->
<!--					<a class="pa" id="imagin" onclick="expandCategory(this.id);">Imaging</a>-->
<!-- 					<div id="imagin-d" class="bbc-dropdown bbc-hidden"> -->
<!-- 						<ul> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=29,1&sb=imaging">View All Imaging</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=29,2&sb=imaging">Transilluminators</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=30,2&sb=imaging">Gel Imagers</a></li> -->
<!-- 						</ul> -->
<!-- 					</div>	 -->
<!-- 				</li> -->
<!-- 				<li class="parent-category"> -->
<!--					<a class="pa" id="suppli" onclick="expandCategory(this.id);">Lab Supplies</a>-->
<!-- 					<div id="suppli-d" class="bbc-dropdown bbc-hidden"> -->
<!-- 						<ul> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=61,1&sb=supplies">View All Supplies</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=61,2&sb=supplies">Disposables</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=62,2&sb=supplies">Filtration</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=63,2&sb=supplies">Frames, Supports, Clamps</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=64,2&sb=supplies">Pipettes</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=65,2&sb=supplies">Plasticware</a></li> -->
<!-- 						</ul> -->
<!-- 					</div>		 -->
<!-- 				</li> -->
<!-- 				<li class="parent-category"> -->
<!--					<a class="pa menu-expand" id="micros" onclick="expandCategory(this.id);">Microscopes</a>-->
<!-- 					<div id="micros-d" class="bbc-dropdown"> -->
<!-- 						<ul> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=32,1&sb=microscopes">View All</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=32,2&sb=microscopes">Microscopes</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=33,2&sb=microscopes">Light Sources</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=34,2&sb=microscopes">Parts</a></li> -->
<!-- 						</ul> -->
<!-- 					</div> -->
<!-- 				</li> -->
<!-- 				<li class="parent-category"> -->
<!--					<a class="pa" id="mixers" onclick="expandCategory(this.id);">Mixers &amp; Stirrers</a>-->
<!-- 					<div id="mixers-d" class="bbc-dropdown bbc-hidden"> -->
<!-- 						<ul> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=36,1&sb=mixers">View All Mixers</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=36,2&sb=mixers">Stirrers</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=37,2&sb=mixers">Hotplate Stirrers</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=38,2&sb=mixers">Mixers</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=39,2&sb=mixers">Shakers</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=40,2&sb=mixers">Vortexers</a></li> -->
<!-- 						</ul> -->
<!-- 					</div> -->
<!-- 				</li> -->
<!-- 				<li class="parent-category"> -->
<!-- 					<a class="pa">Other Lab Equipment</a> -->
<!-- 				</li> -->
<!-- 				<li class="parent-category"> -->
<!--					<a class="pa menu-expand" id="pcrdna" onclick="expandCategory(this.id);">PCR DNA Thermal Cyclers</a>-->
<!-- 					<div id="pcrdna-d" class="bbc-dropdown"> -->
<!-- 						<ul> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=43,1&sb=pcr">View All PCR</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=43,2&sb=pcr">Thermal Cyclers</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=44,2&sb=pcr">Parts, Heating Blocks</a></li> -->
<!-- 						</ul> -->
<!-- 					</div> -->
<!-- 				</li> -->
<!-- 				<li class="parent-category"> -->
<!--					<a class="pa" id="pumps" onclick="expandCategory(this.id);">Pumps</a>-->
<!-- 					<div id="pumps-d" class="bbc-dropdown bbc-hidden"> -->
<!-- 						<ul> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=49,1&sb=pumps">View All Pumps</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=49,2&sb=pumps">Vacuum Pumps</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=50,2&sb=pumps">Peristaltic Pumps</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=51,2&sb=pumps">Multistaltic Pumps</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=52,2&sb=pumps">Gradient Pumps</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=53,2&sb=pumps">Quaternary Pumps</a></li> -->
<!-- 						</ul> -->
<!-- 					</div> -->
<!-- 				</li> -->
<!-- 				<li class="parent-category"> -->
<!--					<a class="pa" id="scales" onclick="expandCategory(this.id);">Scales &amp; Balances</a>-->
<!-- 					<div id="scales-d" class="bbc-dropdown bbc-hidden"> -->
<!-- 						<ul> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=55,1&sb=scales">View All Scales</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=55,2&sb=scales">Digital Scales</a></li> -->
<!-- 							<li><a href="?controller=public&action=store&section=store&title=All%20Analytical%20Equipment&category=56,2&sb=scales">Balance Scales</a></li> -->
<!-- 						</ul> -->
<!-- 					</div> -->
<!-- 				</li> -->
			</ul>
		</nav>
	</div>
	<div class="main-store-content">
	<?php require $storePage; ?>
	</div>
</main>
