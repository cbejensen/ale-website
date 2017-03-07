<?php
/*
 * This is the index of the Estimates section.
 * It provides the same contact info as the contact page,
 * but instead of a contact form, there's a form the
 * visitor can use to request a quote.
 *
 */
?>
<main class="estimates-main">
	<h1>Request a Quote</h1>
	<section class="estiamtes-section">
		<p>Please fill out your information and we will get back
		to you as soon as possible with the selected quote/information
		requested.</p>
		<form action="/?controller=forms&action=processEstimateForm" method="post">
			<label>Instrument of Interest</label>
			<input type="text" name="instrument">
			<label>Information Requested</label>
			<!-- Radio Buttons are a better solution here.
			When a user selects "Other" create another text input, labelled "Please Describe" -->
			<select name="info-requested">
				<option selected disabled>Please select an option</option>
				<option value="pricing">Pricing Information</option>
				<option value="details">Instrument Details</option>
				<option value="config">Configuration Options</option>
				<option value="all">All</option>
				<option value="other">Other</option>
			</select>
			<hr class="form-section-divider">
			<label>First Name</label>
			<input type="text" name="firstName">
			<label>Last Name</label>
			<input type="text" name="lastName">
			<label>Email</label>
			<input type="text" name="email">
			<label>Phone</label>
			<input type="text" name="phone">
			<hr class="form-section-divider">
			<label>How did you hear about Atlantic Lab Equipment?</label>
			<select name="referredBy">
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
			<select name="getUpdates">
				<option value="yes">Yes, I would like to receive monthly inventory updates via email.</option>
				<option value="no">No, I would not like to receive inventory updates.</option>
			</select>
			<label>Comments or Additional Questions</lable>
			<textarea rows="5" name="commnets"></textarea>
			<input type="submit" value="Submit">
		</form>
	</section>
	<section class="estimates-section">
		<div class="contact-info-subsection">
			<h2>Phone, Email &amp; Fax</h2>
			<ul>
				<li>Phone: (978) 740-2400</li>
				<li>Toll Free: (866) 484-6031</li>
				<li class="fax-info">Fax: (978) 740-5678</li>
				<li class="other-info">atlanticlabequipment.com</li>
				<li class="other-info">Email: answers@atlanticlabequipemnt.com</li>
			</ul>
		</div>
		<hr class="subsection-divider">
		<div class="contact-info-subsection">
			<h2>Shipping Address</h2>
			<address>
				Atlantic Lab Equipment, Inc.<br>
				45 Congress St.<br>
				Building 4, Suite 193<br>
				Salem, MA 01970<br>
			</address>
		</div>
		<hr class="subsection-divider">
		<div class="contact-info-subsection">
			<h2>Mailing Address</h2>
			<address>
				Atlanitc Lab Equipment, Inc.<br>
				P.O. Box &#35;4405<br>
				Salem, MA 01970-4405
			</address>
		</div>		
		<hr class="subsection-divider">
		<div class="contact-info-subsection">
			<h2>Directions to ALE</h2>
			<p>We would be delighted if you came to visit.
			Please feel free to call us to set up an
			appointment.</p>
			<a href="">Get Directions</a>
		</div>
	</section>
</main>
