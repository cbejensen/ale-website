<!DOCTYPE html>
<html>

<head>
	<link rel="icon" type="image/ico" href="favicon_ale.ico">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/admin.css" media="all">
	<title><?php echo $title ?> | al.db</title>
<!--<meta charset="UTF-8">-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/common.js"></script>
	<script type="text/javascript" src="js/admin.js"></script>
	<script type="text/javascript" src="js/assetView.js"></script>
</head>

<body class="admin-body" id="ale-body">

<header class="admin-header">
	<div class="logoBar">
		<div id="logoBar_rightBG"></div>
		<div class="logoBar_content">
			<a href="index.php">
			<img 
			srcset="img/interface/aleBanner-350w.png 350w,
					img/interface/aleBanner.png 500w"
			sizes="(max-width: 2524px) 350px,
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
			<ul class="navList material" onmouseleave="moveArrow('<?php echo $section; ?>')">
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
				<li id="navBtn_prod" class="<?php if ($subsect == 'inventory') echo 'activeNavBtn';?>" onmouseover="moveArrow('inventory');">
					<a href="?controller=admin&action=showList&subsect=inventory&title=List%20Test&ltype=itm&lscp=all&rp=1&srt_f=019&srt_d=asc" style="cursor: default;">Inventory</a>
 					<div id="navDrop_prod" class="dropDown">
	 					<ul class="dropDown">
	 						<li>
	 							<a href="?controller=admin&action=showList&subsect=inventory&title=List%20Test&ltype=itm&lscp=all&rp=1&srt_f=019&srt_d=asc">All Inventory</a>
	 						</li>
	 						<li>
	 							<a href="?controller=admin&action=showList&subsect=inventory&title=List%20Test&ltype=itm&lscp=complete&rp=1&srt_f=019&srt_d=asc">
	 							Complete</a>
	 						</li>
	 						<li>
	 							<a href="?controller=admin&action=showList&subsect=inventory&title=List%20Test&ltype=itm&lscp=review&rp=1&srt_f=019&srt_d=asc">
	 							Under Review</a>
	 						</li>
							<li>
								<a href="?controller=admin&action=itemImport&subsect=inventory&title=List%20Test">
								Import from CSV</a>
				 			</li>
							<li>
								<a href="?controller=public&action=products_services&page=waters_equipment&title=WATERS%20Equipment&section=products">
								Export to Spreadsheet</a>
							</li>
						</ul>
					</div>
				</li>
				<li id="navBtn_store" class="<?php if ($subsect == 'gen_listings') echo 'activeNavBtn'; ?>" onmouseover="moveArrow('store');">
					<a href="?controller=admin&action=showList&subsect=gen_listings&title=All%20Listings&ltype=lis&lscp=all&rp=1&srt_f=037&srt_d=asc" style="cursor: default;">General Listings</a>
						<div id="navDrop_store" class="dropDown">
							<ul class="dropDown">
								<li>
	 								<a href="?controller=admin&action=showList&subsect=gen_listings&title=All%20Listings&ltype=lis&lscp=all&rp=1&srt_f=037&srt_d=asc">All Listings</a>
								</li>
								<li>
	 								<a href="?controller=admin&action=showList&subsect=gen_listings&title=Listings&ltype=lis&lscp=complete&rp=1&srt_f=037&srt_d=asc">Complete</a>
								</li>
	 							<li>
 									<a href="?controller=admin&action=showList&subsect=gen_listings&title=Review%20Listings&ltype=lis&lscp=review&srt_f=037&srt_d=asc">
									Under Review</a>
								</li>
								<li>
	 								<a href="?controller=admin&action=showList&subsect=gen_listings&title=Active%20Listings&ltype=lis&lscp=active&rp=1&srt_f=037&srt_d=asc">All Active</a>
								</li>
								<li>
	 								<a href="?controller=admin&action=showList&subsect=gen_listings&title=Inactive%20Listings&ltype=lis&lscp=inactive&&rp=1&srt_f=037&srt_d=asc">All Inactive</a>
								</li>
	 							<li>
									<a href="?controller=admin&action=showList&subsect=gen_listings&title=All+Gen.+Listing+Ads&ltype=gl_ads&lscp=all&srt_f=019">
 									General Listing Ads</a>
	 							</li>
							</ul>
	 					</div>
				</li>
				<li id="navBtn_store" class="<?php if ($subsect == 'misc_records') echo 'activeNavBtn'; ?>" onmouseover="moveArrow('store');">
					<a href="?controller=admin&action=showList&subsect=gen_listings&title=All%20Listings&ltype=lis&lscp=all&rp=1&srt_f=037&srt_d=asc" style="cursor: default;">Misc. Records</a>
						<div id="navDrop_store" class="dropDown">
							<ul class="dropDown">
								<li>
	 								<a href="?controller=admin&action=showList&subsect=misc_records&title=All%20Manufacturers&ltype=mnf&lscp=all&srt_f=019">All Manufacturers</a>
								</li>
								<li>
	 								<a href="?controller=admin&action=showList&subsect=misc_records&title=All%20Models&ltype=mod&lscp=all&srt_f=021">All Models</a>
								</li>
	 							<li>
 									<a href="?controller=admin&action=showList&subsect=misc_records&title=All%20Brands&ltype=brd&lscp=all&srt_f=023">
									All Brands</a>
								</li>
								<li>
	 								<a href="?controller=admin&action=showList&subsect=misc_records&title=All+QB+Master+Items&ltype=sub&lscp=all&srt_f=020">All QB Master Items</a>
								</li>
								<li>
	 								<a href="?controller=admin&action=showList&subsect=misc_records&title=All+Vendors&ltype=ven&lscp=all&srt_f=046">All Vendors</a>
								</li>
	 							<li>
									<a href="?controller=admin&action=showList&subsect=misc_records&title=All+Batches&ltype=bat&lscp=all&srt_f=049">
 									All Batches</a>
	 							</li>
	 							<li>
									<a href="?controller=admin&action=showList&subsect=misc_records&title=All+Labels&ltype=lbl&lscp=all">
 									All Labels</a>
	 							</li>
							</ul>
	 					</div>
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
		require_once RESOURCES_PATH . '/routes.php'; 
		//require_once 'views/sidebar.php';
?>

<footer>
</footer>

</body>

</html>

