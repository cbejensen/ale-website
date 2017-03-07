<?php
/*
 * This is the index of the Contact section.
 * It provides ALE's contact info and an online contact form, 
 * whose input is emailed to the appropriate parties, and will
 * eventually be stored in the site's database.
 */
?>
<main class="contact-main">
	<h1>Contact Us</h1>
	<section class="contact-info-section">
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
	<section class="contact-info-section">
		<h2>Ask a Question</h2>
		<p>We're always happy to answer any questions you may have.
		Please fill out the form below to send us a message. Our goal
		is to contact you as soon as possible.</p>
		<form action="/?controller=forms&action=processContactForm" method="post">
			<label>Name</label>
			<input type="text" name="name">
			<label>Email</label>
			<input type="text" name="email">
			<label>Message</label>
			<textarea rows="5" name="message">
			<input type="submit" value="Submit">
		</form>
	</section>
</main>
