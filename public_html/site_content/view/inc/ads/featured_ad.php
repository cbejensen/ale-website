<?php
/*
 * This file is included for each ad featured on the homepage
 */
?>
<div class="home-featured-ad">
	<img src="<?php echo $ad['imgSrc']; ?>" alt="<?php echo $ad['imgAlt']; ?>">
	<h2><?php echo $ad['title']; ?></h2>
	<p><?php echo $ad['description']; ?></p>
	<div>
		<h3>Our Price:</h3>
		<span><?php echo $ad['price']; ?></span>
		<a href="<?php echo $ad['url']; ?>">View Details</a>
	</div>
</div>
