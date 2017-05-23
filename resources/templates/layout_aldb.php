<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/admin.css" media="all">
	<script type="text/javascript" src="js/common.js"></script>
	<link rel="icon" type="image/ico" href="favicon_ale.ico">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/admin.css" media="all">
	<title><?php echo $title ?> | al.db</title>
<!--<meta charset="UTF-8">-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="admin-body">

<header class="admin-header">
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
			<div class="menu-access gradient-button" onclick="toggleMenu()">
				<img src="img/interface/menu-button.png" alt="Main Menu">
			</div>
		</div>
	</div>
	<nav class="topNavBar topNavBar-hide" id="ale-main-menu">
		<div>
			<ul class="navList" onmouseleave="moveArrow('<?php echo $section; ?>')">
	                	<!-- Begin Home button -->
				<li id="navBtn_home" class="<?php if ($subsect == 'home') echo 'activeNavBtn';?>" onmouseover="moveArrow('admin-home');">
					<a href="?controller=admin&action=home&subsect=home&title=Dashboard" style="cursor: default;">Home</a>
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
				<li id="navBtn_prod" class="<?php if ($subsect == 'Inventory') echo 'activeNavBtn';?>" onmouseover="moveArrow('inventory');">
					<a href="?controller=admin&action=list&subsect=Inventory&title=All%20Inventory" style="cursor: default;">Premium Services</a>
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
					<a href="?controller=public&action=store&section=store&title=Products" style="cursor: default;">Premium Equipment</a>
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
				<li id="navBtn_outlet" onmouseover="moveArrow('outlet');">
					<a href="http://stores.ebay.com/ale-lab-equipment-outlet">Outlet Store</a>
				</li>
				<li id="navBtn_cont" class="<?php if ($section == 'contact') echo 'activeNavBtn';?>" onmouseover="moveArrow('contact');">
					<a href="?controller=public&action=contact&title=Contact%20Us&section=contact">Contact Us</a>
				</li>
				<li id="navBtn_est" class="<?php if ($section == 'estimates') echo 'activeNavBtn';?>" onmouseover="moveArrow('estimates');">
					<a href="?controller=public&action=estimates&title=Request%20a%20Quote&section=estimates">Request a Quote</a>
				</li>
			</ul>
		</div>
	</nav>
</header>

<?php 	
		require_once 'routes.php'; 
		//require_once 'views/sidebar.php';
?>

<footer>
</footer>

</body>

</html>

