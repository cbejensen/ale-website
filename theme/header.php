<?php
/**
 * The Header template for the ALE theme
 *
 * Displays all of the <head> section and everything up to <div id="main">
 *
 *
 *
 *
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/defaults.css" media="all">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" media="all">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<!-- <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet"> -->
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Providing refurbished lab equipment, specializing in Laboratory Automation. We integrate Tecan Liquid Handling systems for a variety of applictions.">
		<meta name="keywords" content="lab, laboratory, discount, equipment, instrument, automation, robotics">
		<meta name="author" content="Jack Brown">
		<meta name="google-site-verification" content="e_JLNWYMGwGR6Q2Imne8je0sFJSYkL1ExyD9r8uuorY" />
		<title><?php wp_title( '|', true, 'right' ); ?>ALE: Premium Lab Equipment for Less &amp; Laboratory Automation</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
			$('form').submit(function(){
				if ($('input#website').val().length != 0) {
					return false;
				}
			});
		</script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-86227524-1', 'auto');
		  ga('send', 'pageview');
		</script>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<!--BEGIN LOGO & MENU SECTION -->
		<header>
			<div id="wrap">
			<div class="logo"><!--CONTAINS BACKGROUND IMAGE-->
			</div>
			
			<div id="search">
						<!--<form method="get" action="#">
				<input type="text" name="q" alt="Search" value="" maxlength="256" size="12" />
				<input type="submit" name="btnG" value="Search" />
				<input type="hidden" name="site" value="Columbia" />
				<input type="hidden" name="client" value="columbia" />
				<input type="hidden" name="proxystylesheet" value="columbia2" />
				<input type="hidden" name="output" value="xml_no_dtd" />
				<input type="hidden" name="filter" value="0" />
				</form>-->
				<script>
				  (function() {
				    var cx = '017643060118740623269:jarbidgpvmo';
				    var gcse = document.createElement('script');
				    gcse.type = 'text/javascript';
				    gcse.async = true;
				    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
				    var s = document.getElementsByTagName('script')[0];
				    s.parentNode.insertBefore(gcse, s);
				  })();
				</script>
				<gcse:searchbox-only></gcse:searchbox-only>
			</div><!--SEARCH-->
		</div>
		
		<!--CONTAINS MENU-->
		<nav>
			<ul>
				<!-- BEGIN 1st LI-GROUP -->
				<div class="li-group" id="group-1">
                	<!--BEGIN HOME BUTTON-->
					<li id="home-btn"><!-- formerly #home-drop -->
						<a href="http://atlanticlabequipment.com" id="home-link">Home</a>
                        <!--BEGIN HOME DROP MENU-->
						<div id="home-drop-menu" class="drop-menu"><!-- formerly #home-->
							<ul class="drop-down">
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
						</div><!-- END HOME DROP MENU -->
					</li>
					<!-- END HOME BUTTON -->
					
					<!--BEGIN PRODUCTS & SERVICES BUTTON-->
					<li id="products-btn"><!-- formerly #prod-drop -->
						<a href="http://atlanticlabequipment.com/products-and-services/" id="products-link">Products &amp; Services</a><!-- formerly #prod-link -->
                        <!--BEGIN P & S DROP MENU-->
						<div id="products-drop-menu" class="drop-menu"><!-- formerly #prod-->
							<ul class="drop-down">
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
						</div><!--BEGIN P & S DROP MENU-->
					</li>
					<!-- END PRODUCTS & SERVICES BUTTON -->
				</div>
				<!-- END 1st LI-GROUP -->
				
				<!-- BEGIN 2nd LI-GROUP -->
				<div class="li-group">
					<!--BEGIN CONTACT US BUTTON-->
					<li id="contact">
						<a href="http://atlanticlabequipment.com/contact/">Contact Us</a>
					</li>
					<!-- END CONTACT US BTN -->
					
                    <!--BEGIN REQUEST A QUOTE BUTTON-->
					<li id="estimate">
						<a href="http://atlanticlabequipment.com/estimates/">Request a Quote</a>
					</li>
					<!-- END ESTIMATES BTN -->
				</div>
				<!-- END 2nd LI-GROUP -->
			</ul>
			
		</nav>
		
		
	</header>
