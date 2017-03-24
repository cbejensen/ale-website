<?php
/*
 * This is the index of the Contact section.
 * It provides ALE's contact info and an online contact form, 
 * whose input is emailed to the appropriate parties, and will
 * eventually be stored in the site's database.
 */
?>
<script src="<?php echo PUBLIC_PATH; ?>/js/public.js"></script>
<main class="contact-main site-main pageContent">
	<h1 class="section-head">Contact Us</h1>
	<section class="contact-info-section contact-info">
		<div class="contact-info-subsection">
			<h2 class="section-head">Phone, Email &amp; Fax</h2>
			<ul>
				<li>Phone: <span class="info">(978) 740-2400</span></li>
				<li>Toll Free: <span class="info">(866) 484-6031</span></li>
				<li class="fax-info">Fax: <span class="info">(978) 740-5678</span></li>
				<li class="other-info">Website: <span class="info">atlanticlabequipment.com</span></li>
				<li class="other-info">Email: <span class="info">answers@atlanticlabequipemnt.com</span></li>
			</ul>
		</div>
		<hr class="section-divider">
		<div class="contact-info-subsection right-section">
			<h2 class="section-head">Shipping Address</h2>
			<address>
				Atlantic Lab Equipment, Inc.<br>
				45 Congress St.<br>
				Building 4, Suite 193<br>
				Salem, MA 01970<br>
			</address>
		</div>
		<hr class="section-divider">
		<div class="contact-info-subsection">
			<h2 class="section-head">Mailing Address</h2>
			<address>
				Atlanitc Lab Equipment, Inc.<br>
				P.O. Box &#35;4405<br>
				Salem, MA 01970-4405
			</address>
		</div>		
		<hr class="section-divider">
		<div class="contact-info-subsection right-section">
			<h2 class="section-head">Directions to ALE</h2>
			<p>We would be delighted if you came to visit.
			Please feel free to call us to set up an
			appointment.</p>
			<a class="material gradient-button directions" href="">Get Directions</a>
		</div>
	</section>
	<section class="contact-info-section form-section">
		<div class="estimate-cta">
				<h3 class="material gradient-button">Ask us a Question</h3>
				<div class="question-form material">
					<input class="fname" type="text" id="fname" placeholder="First name *">
					<input class="lname" type="text" id="lname" placeholder="Last name *">
					<input class="email" type="text" id="email" placeholder="Email address *">
					<span class="hr"></span>
					<textarea rows="10" placeholder="Ask your question here"></textarea>
					<span class="hr"></span>
					<span class="button gradient-button" onclick="submitQuestion()">Start a Conversation</span>
				</div>
			</div>
	</section>
</main>
