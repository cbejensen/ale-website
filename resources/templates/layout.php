<?php
/**
 * The Layout template for atlanticlabequipment.com
*
* Displays all of the <head> section and everything up to,
* but not including, <main>
*
* Jack Brown - February, 2017
*
*/
?>
<!DOCTYPE html>
<html>
	<head>
		<?php if ($section == 'home'): ?>
		<title>Atlantic Lab Equipment | Premium Equipment &amp; Automation</title>
		<?php else: ?>
		<title><?php echo $title; ?> | ALE: Premium Lab Equipment &amp; Automation</title>
		<?php endif; ?>
		<link rel="stylesheet" type="text/css" href="<?php echo RESOURCES_PATH; ?>/styles/default.css" media="all">
		<link rel="stylesheet" type="text/css" href="<?php echo RESOURCES_PATH; ?>/styles/style.css" media="all">
		<link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>/css/home.css" media="all">
		<link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>/css/contact.css" media="all">
		<link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>/css/estimates.css" media="all">
		<link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>/css/automation-solutions.css" media="all">
		<link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>/css/premium-equipment.css" media="all">
		<link rel="icon" type="image/ico" href="favicon_ale.ico">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
		<script type="text/javascript" src="../resources/js/common.js"></script>
		<meta charset="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php //PublicModel::get_metaDesc($title); ?>">
		<meta name="author" content="Jack Brown">
	</head>
	<body id="ale-body">
		<header class="site-header">
			<div class="logoBar">
				<div id="logoBar_leftBG"></div>
				<div id="logoBar_rightBG"></div>
				<div class="logoBar_content pageContent">
					<img 
					srcset="img/interface/aleBanner-tagline-250w.png 250w,
							img/interface/aleBanner-tagline.png 500w"
					sizes="(max-width: 524px) 250px,
							500px"
					src="img/interface/aleBanner.png" 
					alt="ale: Providing refurbished lab equipment, specializing in Laboratory Automation.">
					<div class="header-info">
						<span class="phone">Call us toll-free at (866) 484-6031!</span>
						<!-- <span>45 Congress St. Salem, MA</span> -->
						<span class="email">Email us at answers@atlanticlabequipment.com</span>
					</div>
				</div>
			</div>
			<nav class="topNavBar">
				<div class="pageContent">
					<ul class="navList" onmouseleave="moveArrow('<?php echo $section; ?>')">
	                	<!-- Begin Home button -->
						<li id="navBtn_home" class="<?php if ($section == 'home') echo 'activeNavBtn';?>" onmouseover="moveArrow('home');">
							<a href="http://atlanticlabequipment.com">Home</a>
							<div id="navDrop_home" class="dropDown">
								<ul class="dropDown">
									<li>
										<a href="index.php">Top of Homepage</a>
									</li>
									<li>
										<a href="index.php/#about">About</a>
									</li>
									<li>
										<a href="http://atlanticlabequipment.com/newsletters">Newsletters</a>
									</li>
									<li>
										<a href="index.php/#mission">Mission Statement</a>
									</li>
									<li>
										<a href="index.php?controller=public&action=home&section=home#testimonials">Testimonials</a>
									</li>
								</ul>
							</div><!-- End Home drop menu -->
							
						</li>
						<!-- Begin Products and Services button -->
						<li id="navBtn_prod" class="<?php if ($section == 'products') echo 'activeNavBtn';?>" onmouseover="moveArrow('products');">
							<a href="?controller=public&action=products_services&title=Products%20%26%20Services&section=products">Products &amp; Services</a>
							<div id="navDrop_prod" class="dropDown">
								<ul class="dropDown">
									<li>
										<a href="?controller=public&action=products_services&page=automation_solutions&title=Automation%20Solutions&section=products">
										Premium Automation Solutions</a>
									</li>
									<li>
										<a href="?controller=public&action=products_services&page=premium_equipment&title=Premium%20Equipemnt&section=products">
										Premium Equipment</a>
									</li>
									<li>
										<a href="http://stores.ebay.com/ale-lab-equipment-outlet">
										Outlet Equipment</a>
									</li>
									<li>
										<a href="?controller=public&action=products_services&page=new_arrivals&title=Newly-Arrived%20Equipment&section=products">
										Newly-Arrived Equipment</a>
									</li>
									<li>
										<a href="?controller=public&action=products_services&page=monthly_specials&title=Monthly%20Specials&section=products">
										Monthly Specials</a>
									</li>
									<li>
										<a href="?controller=public&action=products_services&page=waters_equipment&title=WATERS%20Equipment&section=products">
										WATERS Equipment</a>
									</li>
								</ul>
							</div>
						</li>
						<li id="navBtn_cont" class="<?php if ($section == 'contact') echo 'activeNavBtn';?>" onmouseover="moveArrow('contact');">
							<a href="?controller=public&action=contact&title=Contact%20Us&section=contact">Contact Us</a>
						</li>
						<li id="navBtn_est" class="<?php if ($section == 'estimates') echo 'activeNavBtn';?>" onmouseover="moveArrow('estimates');">
							<a href="?controller=public&action=estimates&title=Request%20a%20Quote&section=estimates">Request a Quote</a>
						</li>
					</ul>
				</div>
				<script>window.onload = createArrow('<?php echo $section; ?>');</script>
				<div class="searchBar pageContent">
					<div class="searchBar-subitem searchBar-store"><span>Automation &amp; Robotics</span></div>
					<input type="text" name="search" placeholder="Search for anything (e.g. Tecan EVO)">
					<div class="searchBar-goButton" id="searchBtn" onclick="">
						<img src="img/interface/67grey_search.png">
					</div>
					<div class="searchBar-subitem searchBar-cart">
						<img src="img/interface/shopping_cart.png" alt="shopping cart">
					</div>
				</div>
			</nav>
		</header>
		
		<?php 	
			require_once RESOURCES_PATH . '/routes.php'; 
		?>

		<footer>
			<div class="foot-main">
				<div class="foot-main-container">
				<div class="foot-section">
					<h3>Sign Up for our Monthly Newsletter</h3>
					<p>We keep an archive of all our email newsletters. 
					To view our past mailers, click the link below.</p>
					<form action="https://atlanticlabequipment.com/newsletter.php" method="post" class="newsletter-form">
						<label>First Name:</label>
						<input type="text" name="firstname">
						<label>Last Name:</label>
						<input type="text" name="lastname">
						<label>Email Address:</label>
						<input type="text" name="email">
						<input id="website" name="website" type="text" value="" class="sticky-field">
						<input type="submit" value="Sign Up" class="standard-button">
						<input type="button" value="View Archive" onclick="" class="standard-button">
					</form>
				</div>
				<div class="foot-section">
					<div class="foot-subsection">
						<h3>Have a Question?</h3>
						<p>We're always happy to help. Click below to send us a message. We'll 
						get back to you as soon as we can.</p>
						<a class="button-link standard-button" href="https://atlanticlabequipment.com/contact">Ask us Anything</a>
					</div>
					<hr class="foot-subsection-divider">
					<div class="foot-subsection">
						<h3>Need a Quote?</h3>
						<p>You can request a quote for any instrument with the handy form
						you can find here. Our goal is to contact you promptly.</p>
						<a class="button-link standard-button" href="https://atlanticlabequipment.com/estimates">Get a Quote</a>
					</div>
				</div>
				<div class="foot-section">
					<div class="foot-subsection">
						<h3>Social Links</h3>
						<p>We invite you to network with us! Stay up-to-date with the latest
						news.</p>
						<span class="foot-social-icons">
							<a class="social-icon facebook-icon" href="https://www.facebook.com/atlanticlabequipment"></a>
							<a class="social-icon twitter-icon" href="https://twitter.com/atlanticlab"></a>
							<a class="social-icon google-icon" href="https://plus.google.com/+AtlanticLabEquipmentSalem"></a>
							<a class="social-icon linkedin-icon" href="https://www.linkedin.com/company/atlantic-lab-equipment-llc"></a>
			            </span>
					</div>
					<hr class="foot-subsection-divider">
					<nav class="foot-subsection foot-navigation">
						<h3>Navigation Links</h3>
						<ul>
							<li>
								<a href="https://atlanticlabequipment.com">Top of Home Page</a>
							</li>
							<li>
								<a href="https://atlanticlabequipment.com/#about">About</a>
							</li>
							<li>
								<a href="https://atlanticlabequipment.com/products-and-services">Products &amp; Services</a>
							</li>
							<li>
								<a href="https://atlanticlabequipment.com/premium-equipment">Premium Equipment</a>
							</li>
							<li>
								<a href="http://stores.ebay.com/ale-lab-equipment-outlet">Outlet Equipment</a>
							</li>
							<li>
								<a href="https://atlanticlabequipment.com/contact">Contact Us</a>
							</li>
							<li>
								<a href="https://atlanticlabequipment.com/estimates">Request a Quote</a>
							</li>
			            </ul>	
					</nav>
				</div>
				</div>
			</div>
			<div class="google-maps">
				<iframe frameborder="0"
				src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA7X1orAXshhfLK7VkgAo7_FjbYLyz_4Ng&q=Atlantic+Lab+Equipment,Salem+MA&zoom=12" 
				allowfullscreen>
				</iframe>
			</div>
		</footer>
	</body>
</html>