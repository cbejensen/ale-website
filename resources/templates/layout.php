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
		<!-- Separate stylesheets for development -->
		<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/home.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/contact.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/estimates.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/automation-solutions.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/premium-equipment.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/products_services.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/lists.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/store.css" media="all">
		<link rel="icon" type="image/ico" href="favicon_ale.ico">
		<!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
		<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
		<!-- <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet"> -->
		<script type="text/javascript" src="js/common.js"></script>
		<script type="text/javascript" src="js/public.js"></script>
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
					<a href="index.php">
					<img 
					srcset="img/interface/aleBanner-250w.png 250w,
							img/interface/aleBanner.png 500w"
					sizes="(max-width: 524px) 250px,
							500px"
					src="img/interface/aleBanner.png" 
					alt="ale: Providing refurbished lab equipment, specializing in Laboratory Automation.">
					</a>
					<div class="header-info">
						<span class="phone">Call us toll-free at (866) 484-6031</span>
						<!-- <span>45 Congress St. Salem, MA</span> -->
						<span class="email"><a href="mailto:answers@atlanticlabequipment.com">answers@atlanticlabequipment.com</a></span>
					</div>
					<div class="menu-access gradient-button" onclick="toggleMenu()">
						<img src="img/interface/menu-button.png" alt="Main Menu">
					</div>
				</div>
			</div>
			<nav class="topNavBar topNavBar-hide" id="ale-main-menu">
				<div class="pageContent">
					<ul class="navList" onmouseleave="moveArrow('<?php echo $section; ?>')">
	                	<!-- Begin Home button -->
						<li id="navBtn_home" class="<?php if ($section == 'home') echo 'activeNavBtn';?>" onmouseover="moveArrow('home');">
							<a href="index.php" style="cursor: default;">Home</a>
							<!-- <div id="navDrop_home" class="dropDown">
								<ul class="dropDown">
									<li>
										<a href="index.php">Top of Homepage</a>
									</li>
									<li>
										<a href="index.php?#about">About</a>
									</li>
									<li>
										<a href="http://atlanticlabequipment.com/newsletters">Newsletters</a>
									</li>
									<li>
										<a href="index.php?#mission">Mission Statement</a>
									</li>
									<li>
										<a href="index.php?controller=public&action=home&section=home#testimonials">Testimonials</a>
									</li>
								</ul>
							</div> -->
						</li>
						<!-- Begin Products and Services button -->
						<li id="navBtn_prod" class="<?php if ($section == 'services') echo 'activeNavBtn';?>" onmouseover="moveArrow('services');">
							<a href="?controller=public&action=services&section=services&title=Premium%20Services" style="cursor: default;">Premium Services</a>
<!-- 							<div id="navDrop_prod" class="dropDown"> -->
<!-- 								<ul class="dropDown"> -->
<!-- 									<li> -->
<!-- 										<a href="?controller=public&action=services&section=services&title=Premium%20Services">Services Home</a> -->
<!-- 									</li> -->
<!-- 									<li> -->
<!-- 										<a href="?controller=public&action=services&page=automation_solutions&title=Automation%20Solutions&section=services"> -->
<!-- 										Premium Automation Solutions & Service</a> -->
<!-- 									</li> -->
<!-- 									<li> -->
<!-- 										<a href="?controller=public&action=services&page=premium_equipment&title=Premium%20Equipemnt&section=services"> -->
<!-- 										Premium Equipment</a> -->
<!-- 									</li> -->
							<!-- 	<li>
										<a href="http://stores.ebay.com/ale-lab-equipment-outlet" target="_blank">
										Outlet Store</a>
									</li> -->
							<!-- 	<li>
										<a href="?controller=public&action=products_services&page=waters_equipment&title=WATERS%20Equipment&section=products">
										Analytical Equipment</a>
									</li> -->
<!-- 								</ul> -->
<!-- 							</div> -->
						</li>
						<li id="navBtn_store" class="<?php if ($section == 'store') echo 'activeNavBtn'; ?>" onmouseover="moveArrow('store');">
							<a href="?controller=public&action=store&section=store&title=Products" style="cursor: default;">Products</a>
<!-- 							<div id="navDrop_store" class="dropDown"> -->
<!-- 								<ul class="dropDown"> -->
<!-- 									<li> -->
<!-- 										<a href="?controller=public&action=store&section=store&title=Products">Products Home</a> -->
<!-- 									</li> -->
<!-- 									<li> -->
<!-- 										<a href="?controller=public&action=store&page=new_arrivals&title=New%20Arrivals&section=store"> -->
<!-- 										New Arrivals</a> -->
<!-- 									</li> -->
<!-- 									<li> -->
<!-- 										<a href="?controller=public&action=store&page=monthly_specials&title=Monthly%20Specials&section=store"> -->
<!-- 										Monthly Specials</a> -->
<!-- 									</li> -->
<!-- 								</ul> -->
<!-- 							</div> -->
						</li>
<!--						<li id="navBtn_news" class="<?php if ($section == 'news') echo 'activeNavBtn'; ?>" onmouseover="moveArrow('news');">-->
<!-- 							<a href="?controller=public&action=news&page=newsletters&section=news&title=Newsletters">News</a> -->
<!-- 						</li> -->
						<li id="navBtn_cont" class="<?php if ($section == 'contact') echo 'activeNavBtn';?>" onmouseover="moveArrow('contact');">
							<a href="?controller=public&action=contact&title=Contact%20Us&section=contact">Contact Us</a>
						</li>
						<li id="navBtn_est" class="<?php if ($section == 'estimates') echo 'activeNavBtn';?>" onmouseover="moveArrow('estimates');">
							<a href="?controller=public&action=estimates&title=Request%20a%20Quote&section=estimates">Request a Quote</a>
						</li>
					</ul>
				</div>
				<script>window.onload = createArrow('<?php echo $section; ?>');</script>
				<div class="searchBar">
					<div class="searchBar-subitem searchBar-store" onclick="showStoreCategories()">
						<span id="category-label" data-name="all">All</span>
						<div id="s_categories" class="searchBar-dropdown material">
							<div class="arrow-up"></div>
							<!-- <h2 class="section-head category-head">Search For...</h2>
							<h2 class="section-head category-head">Pages, by Site Section </h2>
							<ul>
								<li data-name="all-sect" onclick="switchCategory();">Whole Site</li>
								<li data-name="services" onclick="switchCategory();">Premium Services</li>
								<li data-name="news" onclick="switchCategory();">News</li>
							</ul>-->
							<h2 class="section-head category-head">Equipment Categories</h2>
							<ul>
								<li data-name="all" onclick="switchCategory();">All Categories</li>
								<li data-name="analytical" onclick="switchCategory();">Analytical Instruments</li>
								<li data-name="automation" onclick="switchCategory();">Automation &amp; Robotics</li>
								<li data-name="centrifuges" onclick="switchCategory();">Centrifuges</li>
<!-- 							<li data-name="cooling" onclick="switchCategory();">Cooling Devices</li>
								<li data-name="electrophoresis" onclick="switchCategory();">Electrophoresis</li>
								<li data-name="heating" onclick="switchCategory();">Heating Devices</li>
								<li data-name="imaging" onclick="switchCategory();">Imaging</li>
								<li data-name="supplies" onclick="switchCategory();">Lab Supplies</li>
								<li data-name="microscopes" onclick="switchCategory();">Microscopes</li>
								<li data-name="mixers" onclick="switchCategory();">Mixers &amp; Stirrers</li>
								<li data-name="other" onclick="switchCategory();">Other Lab Equipment</li>-->
								<li data-name="pcr" onclick="switchCategory();">PCR DNA Thermal Cyclers</li>
<!-- 							<li data-name="pumps" onclick="switchCategory();">Pumps</li>
								<li data-name="scales" onclick="switchCategory();">Scales &amp; Balances</li> -->
							</ul>
						</div>
					</div>
					<input type="text" name="search" placeholder="Search for anything (e.g. Tecan EVO)" id="search-input" onKeydown="if (event.keyCode==13) searchSite(<?php if (isset($_GET['sb'])) echo "'".htmlentities($_GET['sb'], ENT_QUOTES)."'"; ?>);">
					<div class="searchBar-goButton gradient-button" id="searchBtn" onclick="searchSite(<?php if (isset($_GET['sb'])) echo "'".htmlentities($_GET['sb'], ENT_QUOTES)."'"; ?>)">
						<img src="img/interface/white-search.png">
					</div>
					<?php if (isset($_GET['sb'])) : ?>
						<script>switchCategory('<?php echo htmlentities($_GET['sb'], ENT_QUOTES); ?>');</script>
					<?php endif; ?>
					<!-- <div class="searchBar-subitem searchBar-cart">
						<img src="img/interface/shopping_cart.png" alt="shopping cart">
					</div> -->
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
					To view our past mailers, click the 'View Archive' button.</p>
					<form action="https://atlanticlabequipment.com/newsletter.php" method="post" class="newsletter-form">
						<label>First Name:</label>
						<input type="text" name="firstname">
						<label>Last Name:</label>
						<input type="text" name="lastname">
						<label>Email Address:</label>
						<input type="text" name="email">
						<input class="f-phone" type="text" id="f-phone" placeholder="Phone Number *">
						<input type="button" value="Sign Up" onclick="" class="secondary-button">
						<input type="button" value="View Archive" onclick="" class="secondary-button">
					</form>
				</div>
				<div class="foot-section">
					<div class="foot-subsection">
						<h3>Have a Question?</h3>
						<p>We're always happy to help. Click below to send us a message. We'll 
						get back to you as soon as we can.</p>
						<a class="button-link secondary-button" href="?controller=public&action=contact&title=Contact%20Us&section=contact">Ask us Anything</a>
					</div>
					<hr class="foot-subsection-divider">
					<div class="foot-subsection">
						<h3>Need a Quote?</h3>
						<p>You can request a quote for any instrument with the handy form
						you can find here. Our goal is to contact you promptly.</p>
						<a class="button-link secondary-button" href="?controller=public&action=estimates&title=Request%20a%20Quote&section=estimates">Get a Quote</a>
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
								<a href="index.php">Top of Home Page</a>
							</li>
							<li>
								<a href="index.php?#about">About</a>
							</li>
							<li>
								<a href="?controller=public&action=services&title=Premium%20Services&section=services">Products &amp; Services</a>
							</li>
							<li>
								<a href="?controller=public&action=services&page=premium_equipment&title=Premium%20Equipemnt&section=services">Premium Equipment</a>
							</li>
							<li>
								<a href="http://stores.ebay.com/ale-lab-equipment-outlet">Outlet Equipment</a>
							</li>
							<li>
								<a href="?controller=public&action=contact&title=Contact%20Us&section=contact">Contact Us</a>
							</li>
							<li>
								<a href="?controller=public&action=estimates&title=Request%20a%20Quote&section=estimates">Request a Quote</a>
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
