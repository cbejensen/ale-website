<?php
/**
 *The template for displaying the footer
 *
 *Contains footer content and the closing of the #main and #page div elements.
 *
 *
 *
 *
 */
?>

 <!--BEGIN FOOTER -->
	<footer>
	<div class="col-section">
		<div class="col-border">
		<div class="col-container">
		<div class="left-col">
			<h3 id="news">Sign Up for our Monthly Newsletter</h3>
			<p>We keep an archive of all our email newsletters. To view our past mailers, click the link below.</p>
			<p><a href="http://atlanticlabequipment.com/newsletters">View Archive</a></p>
			<form action="http://atlanticlabequipment.com/newsletter.php" method="post">
				First Name:<br>
				<input type="text" name="firstname"><br><br>
				Last Name:<br>
				<input type="text" name="lastname"><br><br>
				<input id="website" name="website" type="text" value="">
				Email Address:<br>
				<input type="text" name="email"><br><br>
				<input type="submit" value="Sign Up">
				</form>
			<!--	<a href="http://atlanticlabequipment.com/newsletters"
					style="display: block; height: 50px; width: 100px; margin-left: 5px;" >
					<button type=button" id="archive">View Archive</button>
				</a>-->
		
			
		</div>
		</div><!-- col-container -->
		<div class="col-container">
		<div class="mid-col">
			<h3>Have a Question?</h3>
			<p>We're always happy to help. Click below to send us a message. We'll 
			get back to you as soon as we can.</p>
			<a href="http://atlanticlabequipment.com/contact">
				<button type="button" id="ask">Ask us Anything</button>
			</a>
			<hr>
			<h3>Need a Quote?</h3>
			<p>You can request a quote for any instrument with the handy form
			you can find here. Our goal is to contact you promptly.</p>
			<a href="http://atlanticlabequipment.com/estimates">
				<button type="button">Get a Quote</button>
			</a>
		</div>
		</div><!-- col-container -->
		<div class="col-container">
		<div class="right-col" id="f-right">
			<h3>Social Links</h3>
			<p>We invite you to network with us! Stay up-to-date with the latest
			news.</p>
			<!--DIVISION FOR SOCIAL NETWORK ICONS-->
			<div class="foot-soc">
				<a href="https://www.facebook.com/atlanticlabequipment">
				<img src="https://atlanticlabequipment.com/wp-content/uploads/2016/02/facebook.png" alt="Facebook">
				</a>
				<a href="https://twitter.com/atlanticlab">
				<img src="https://atlanticlabequipment.com/wp-content/uploads/2016/02/twitter.png" alt="Twitter">
				</a>
				<a href="https://plus.google.com/+AtlanticLabEquipmentSalem">
				<img src="https://atlanticlabequipment.com/wp-content/uploads/2016/02/google.png" alt="Google+">
				</a>
				<a href="https://www.linkedin.com/company/atlantic-lab-equipment-llc">
				<img src="https://atlanticlabequipment.com/wp-content/uploads/2016/02/linkedin.png" alt="LinkedIn">
				</a>
            </div>
			<hr>
			<h3>Navigation Links</h3>
			<ul>
				<li>
					<a href="http://atlanticlabequipment.com">Top of Home Page</a>
				</li>
				<li>
					<a href="http://atlanticlabequipment.com/#about">About</a>
				</li>
				<li>
					<a href="http://atlanticlabequipment.com/products-and-services">Products &amp; Services</a>
				</li>
				<li>
					<a href="http://atlanticlabequipment.com/premium-equipment">Premium Equipment</a>
				</li>
				<li>
					<a href="http://stores.ebay.com/ale-lab-equipment-outlet">Outlet Equipment</a>
				</li>
				<li>
					<a href="http://atlanticlabequipment.com/contact">Contact Us</a>
				</li>
				<li>
					<a href="http://atlanticlabequipment.com/estimates">Request a Quote</a>
				</li>
            </ul>	
		</div>
		</div><!-- col-container -->
		</div><!-- col-border -->
		</div><!-- col-section -->
		<!--GOOGLE MAPS-->
		<div id="map">
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
			<div id="map-size">
				<div id="gmap_canvas">
				</div>
				<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
			</div>
			<script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(42.51821,-70.8876156),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(42.51821,-70.8876156)});infowindow = new google.maps.InfoWindow({content:'<strong>Atlantic Lab Equipment</strong><br>45 Congress St. Salem, MA 01970<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
			<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzQmnI7aS7O2eHWU2rJlUwXzfDuoh0DBA&callback=initMap">
			</script>
		</div> 
		<!--END MAPS--><!-- AIzaSyCjSQkJai2N42oEmlshe6KZ7AiWd8XRsig -->
		</footer>
<?php wp_footer(); ?>
</body>
</html>

