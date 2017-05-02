<?php
/*
 * This is the index of the Estimates section.
 * It provides the same contact info as the contact page,
 * but instead of a contact form, there's a form the
 * visitor can use to request a quote.
 *
 */
?>
<main class="estimates-main site-main pageContent">
	<h1 class="section-head">Request a Quote</h1>
	<section class="estiamtes-section estimate-form">
		<p>Please fill out your information and we will get back
		to you as soon as possible with the selected quote/information
		requested. Required fields are marked with an asterisk.</p>
		<form action="/?controller=forms&action=processEstimateForm" method="post">
			<label class="required">Instrument of Interest</label>
			<input id="instrument" type="text" name="instrument" placeholder="e.g. Tecan EVO 200 Automated Liquid Handler" <?php if (isset($_GET['inst'])) echo 'value="' . htmlentities($_GET['inst'], ENT_QUOTES) . '"'?>>	
			<label class="required">Information Requested</label>
			<!-- Radio Buttons are a better solution here.
			When a user selects "Other" create another text input, labelled "Please Describe" -->
			<select id="info_req" name="info-requested">
				<option selected disabled>Please select an option</option>
				<option value="pricing">Pricing Information</option>
				<option value="details">Instrument Details</option>
				<option value="config">Configuration Options</option>
				<option value="all">All</option>
				<option value="other">Other</option>
			</select>
			<hr class="section-divider">
			<div class="firstHalf">
				<label class="required">First Name</label>
				<input id="fname" type="text" name="firstName">
			</div>
			<div class="lastHalf">
				<label class="required">Last Name</label>
				<input id="lname" type="text" name="lastName">
			</div>
			<div class="firstHalf">
				<label class="required">Email</label>
				<input id="email" type="text" name="email">
			</div>
			<div class="lastHalf">
				<label>Phone</label>
				<input id="phone" type="text" name="phone">
			</div>
			<input id="website" class="f-website" type="text" name="website">
			<hr class="section-divider">
			<label>How did you hear about Atlantic Lab Equipment?</label>
			<select id="referrer" name="referredBy">
				<option selected disabled>Please select an option</option>
				<option value="existingCustomer">I am an existing customer</option>
				<option value="googleAd">Google Ad</option>
				<option value="searchEngine">Search Engine</option>
				<option value="proRec">Professional Recommendation</option>
				<option value="personalRec">Personal Recommendation</option>
				<option value="labx">LabX</option>
				<option value="other">Other</option>
			</select>
			<label>Would you like to receive inventory updates?</label>
			<select id="newsletter" name="getUpdates">
				<option value="1">Yes, I would like to receive monthly inventory updates via email.</option>
				<option value="0">No, I would not like to receive inventory updates.</option>
			</select>
			<label>Comments or Additional Questions</label>
			<textarea id="msg" rows="5" name="commnets" placeholder="We appreciate your input!"></textarea>
			<input class="material gradient-button" type="button" name="submit" value="Submit" onclick="submitEstimateForm()">
		</form>
	</section>
	<section class="estimates-section contact-info estimate-contact-info">
		<div class="estimate-info-subsection">
			<h2 class="section-head">Phone, Fax &amp; Email</h2>
			<ul>
				<li>Phone: <span class="info">(978) 740-2400</span></li>
				<li>Toll Free: <span class="info">(866) 484-6031</span></li>
				<li class="fax-info">Fax: <span class="info">(978) 740-5678</span></li>
				<li class="other-info">Website: <span class="info">atlanticlabequipment.com</span></li>
				<li class="other-info">Email: <span class="info">answers@atlanticlabequipment.com</span></li>
			</ul>
		</div>
		<hr class="subsection-divider">
		<div class="estimate-info-subsection">
			<h2 class="section-head">Shipping Address</h2>
			<address>
				Atlantic Lab Equipment, Inc.<br>
				45 Congress St.<br>
				Building 4, Suite 193<br>
				Salem, MA 01970<br>
			</address>
		</div>
		<hr class="subsection-divider">
		<div class="estimate-info-subsection">
			<h2 class="section-head">Mailing Address</h2>
			<address>
				Atlantic Lab Equipment, Inc.<br>
				P.O. Box &#35;4405<br>
				Salem, MA 01970-4405
			</address>
		</div>		
		<hr class="subsection-divider">
		<div class="estimate-info-subsection">
			<h2 class="section-head">Directions to ALE</h2>
			<p>We would be delighted if you came to visit.
			Please feel free to call us to set up an
			appointment.</p>
			<a class="material gradient-button directions" href="">Get Directions</a>
		</div>
	</section>
</main>
