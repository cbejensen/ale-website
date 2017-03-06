<?php
/**
 * The Header template for atlanticlabequipment.com
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
		<title><?php //echo $title; ?> | ale: Premium Lab Equipment for Less</title>
		<link rel="stylesheet" type="text/css" href="../styles/default.css" media="all">
		<link rel="stylesheet" type="text/css" href="../styles/style.css" media="all">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
		<meta charset="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php //get_metaDesc($title); ?>">
		<meta name="author" content="Jack Brown">
	</head>
	<body>
		<header>
			<div class="logoBar">
				<div id="logoBar_leftBG"></div>
				<div id="logoBar_rightBG"></div>
				<div class="logoBar_content pageContent">
					<img src="../images/aleBanner.png" 
					alt="ale: Providing refurbished lab equipment, specializing in Laboratory Automation.">
				</div>
			</div>
			<nav class="topNavBar">
				<div class="pageContent">
					<ul class="navList">
	                	<!-- Begin Home button -->
						<li id="navBtn_home" class="<?php if ($section == 'home') echo 'active';?>">
							<a href="http://atlanticlabequipment.com">Home</a>
							<div id="navDrop_home" class="dropDown">
								<ul class="dropDown">
									<li>
										<a href="http://atlanticlabequipment.com/#about">About</a>
									</li>
									<li>
										<a href="http://atlanticlabequipment.com/newsletters">Newsletters</a>
									</li>
									<li>
										<a href="http://atlanticlabequipment.com/#mission">Mission Statement</a>
									</li>
									<li>
										<a href="http://atlanticlabequipment.com/#testimonials">Testimonials</a>
									</li>
								</ul>
							</div><!-- End Home drop menu -->
						</li>
						<!-- Begin Products and Services button -->
						<li id="navBtn_prod" class="<?php if ($section == 'products') echo 'active';?>">
							<a href="http://atlanticlabequipment.com/products-and-services/">Products &amp; Services</a>
							<div id="navDrop_prod" class="dropDown">
								<ul class="dropDown">
									<li>
										<a href="http://atlanticlabequipment.com/premium-automation-solutions/">
										Premium Automation Solutions</a>
									</li>
									<li>
										<a href="http://atlanticlabequipment.com/premium-equipment/">
										Premium Equipment</a>
									</li>
									<li>
										<a href="http://stores.ebay.com/ale-lab-equipment-outlet">
										Outlet Equipment</a>
									</li>
									<li>
										<a href="http://atlanticlabequipment.com/newly-arrived-equipment/">
										Newly-Arrived Equipment</a>
									</li>
									<li>
										<a href="http://atlanticlabequipment.com/specials/">
										Monthly Specials</a>
									</li>
									<li>
										<a href="http://atlanticlabequipment.com/waters-equipment/">
										WATERS Equipment</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="<?php if ($section == 'contact') echo 'active';?>">
							<a href="http://atlanticlabequipment.com/contact/">Contact Us</a>
						</li>
						<li class="<?php if ($section == 'estimates') echo 'active';?>">
							<a href="http://atlanticlabequipment.com/estimates/">Request a Quote</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>