<script src="../resources/lib/public/js/public.js"></script>
<main class="home-main site-main">
	<section class="home-header">
		<video autoplay muted loop poster="">
			<source src="img/video/ale_slas2017.mp4" type="video/mp4">
			<!-- <source src="movie.ogg" type="video/ogg"> -->
		</video>
		<div class="video-overlay"></div>
		<div class="home-header-content-wrap">
			<h1 class="section-head">Premium Automation Solutions</h1>
			<p class="subhead-text">We develop integrated systems for a variety of 
			applications in the Life Science market for both the Clinical and 
			Research segments.</p>
			<p class="subhead-text subhead-cta">Check out what we can do!</p>
			<div class="home-header-columns">
		    	<!-- <a href=""><img scr="" alt=""></a>
		    	<a href=""><img scr="" alt=""></a>
		    	<a href=""><img scr="" alt=""></a> -->
		    	<div class="circle-img" onclick="">
		    		<img class="material" src="img/content/system_integration.png" alt="">
		    		<h2>Integration</h2>
		    	</div>
		    	<div class="circle-img" onclick="">
		    		<img class="material" src="img/content/system_installation.png" alt="">
		    		<h2>Installation</h2>
		    	</div>
		    	<div class="circle-img" onclick="">
		    		<img class="material" src="img/content/applications.png" alt="">
		    		<h2>Applications</h2>
		    	</div>
			</div>
		</div>
	</section>
	<section class="ads-section" onmouseover="changeNavArrows(1);" onmouseleave="changeNavArrows(0);">
		<h1 class="section-head">This Week's Featured Equipment</h1>
		<img id="leftArrow" class="left-arrow" src="img/interface/left-arrow.png" alt="Click here to browse the previous equipment" onclick="moveFeaturedAds(0);">
		<div class="ads-wrap">
			<?php $this->model->getFeaturedAds($this->userData); ?>
		</div>
		<img id="rightArrow" class="right-arrow" src="img/interface/right-arrow.png" alt="Click here to browse the next equipment" onclick="moveFeaturedAds(1)">
	</section>
	<section class="estimate-section">
		<div class="pageContent">
			<div class="estimate-intro">
				<h1 class="section-head">Get Better Equipment &#8212; For Less</h1>
				<p class="subhead">We help labs save money on first-rate equipment
				every day.</p>
				<!-- <h2>Start a Conversation!</h2> -->
				<p>Ask a question with the provided form or 
				<a href="?controller=public&action=estimates&title=Request%20a%20Quote&section=estimates">request a quote</a>
				for any instrument, even if you don't see it here.</p>
			</div>
			<div class="estimate-cta">
				<h3 class="material gradient-button">Get Started Today!</h3>
				<div class="estimate-form material">
					<input type="text" name="firstName" placeholder="First name *">
					<input type="text" name="lastName" placeholder="Last name *">
					<input type="text" name="email" placeholder="Email address *">
					<span class="hr"></span>
					<textarea rows="4">Ask a Question Here</textarea>
					<span class="hr"></span>
					<span class="button gradient-button">Start a Conversation</span>
				</div>
			</div>
		</div>
	</section>
	<section class="about-section">
		<h1>About Atlantic Lab Equipment</h1>
		<p>Atlantic Lab Equipment provides Premium Automation Solutions with refurbished
		liquid handling, automation, HPLC, GCMS, LCMS, and other biotech equipment.
		Based in Salem, Massachusetts, Atlantic Lab Equipment has served labs locally,
		across the country, and internationally for over 14 years.</p>
		<p>Please call or email ALE when you need help with automation and liquid
		handling or simply need to buy excellent equipment for less. Our customers
		include some of the largest universities, biotech, pharmaceutical, chemical,
		research, and analytical laboratories in North America, as well as start-ups,
		small businesses, and international laboratories.</p>
		<p>Altantic Lab Equipment provides reliable products backed by outstanding service.
		Our extensive inventory includes liquid handlers, laboratory automation instruments,
		analytical systems, thermal cyclers, PCR systems, DNA sequencers, imaging systems, microplate
		readers &amp; washers, and other bench-top lab equipment to meet your needs.</p>
	</section>
	<section class="mission-section">
		<h1>Mission Statement</h1>
		<p>Atlantic Lab Equipment helps labs save money by providing premium automation
		solutions with first-rate refurbished robots. We also buy surplus. Our mission
		is to remove the risk from buying previously owned instrumentation.</p>
	</section>
	<section class="testimonials-section">
		<h1>Testimonials</h1>
		<div class="testimonial">
			<img src="" alt="">
			<p>"We purchased a Tecan robotic liquid handler and a PlateLoc plate sealer
			through Atlantic Lab Equipment when we expanded our next-generation sequencing
			capabilities in our lab. Our decision to entrust ALE with our equipment needs
			was in part due to the cost savings but also because of the extensive technical
			support services they offer. With complex instrumentation like robotic liquid
			handlers, having access to highly trained support specialists like Jenn at ALE
			is critical. They have made good on their commitment to our technical needs by
			being ever ready to assist us with questions that invariably arise."</p>
			<span>-Liz F.</span>
		</div>
		<hr class="">
		<div class="testimonial">
			<img src="" alt="">
			<p>"Atlantic Lab Equipment has drastically improved the operational workflow
			of our lab, specializing in Toxicology, by fully automating the sample preparation
			process. Now our lab is able to stand out in this very competitive market by
			committing to a shorter turnaround time. ALE has provided excellent support in
			the areas of competitive pricing, excellent quality of equipment purchased, and have
			stood behind their word in making necessary repairs to meet the promised quality.
			Their work, commitment, and integrity have been a major factor in my recommendation
			of ALE to be a solid and reliable vendor and experts in their field of business."</p>
			<span>-Katerina G.</span>
		</div>
		<hr class="">
		<div class="testimonial">
			<img src="" alt="">
			<p>"The people at Atlantic Lab Equipment are extremely helpful, knowledgeable, and
			easy to work with. We were able to do an on-site inspection of the instrument we
			were interested in purchasing, and when we arrived we found the instrument already
			cleaned, properly maintained, and running demo experiments. It made the evaluation
			much easier and really strengthened the confidence we had in buying a used liquid
			handler. One year later, the instrument is still running great, we saved thousands
			of dollars, and we now have a great relationship with a quality company in ALE."</p>			
			<span>-Joe R.</span>
		</div>
	</section>
</main>
