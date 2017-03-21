<?php
/*
 * This file is included for each ad featured on the homepage
 */
?>
<div class="featured-ad material">
	<img class="material" src="<?php echo $ad['url']; ?>" alt="<?php echo $ad['alt']; ?>">
	<div class="featAd-text">
		<h2><?php echo $title; ?></h2>
		<p><?php echo $ad['description']; ?></p>
	</div>
	<div class="featAd-cta">
		<div class="adPrice">
			<?php if (isset($ad['price'])): ?>
			<h3>Our Price:</h3>
			<span>US <span class="dollarSign">$</span><?php echo number_format($ad['price'], 2); ?></span>
			<?php elseif (isset($ad['testing'])): ?>
			<h3>Status:</h3>
			<span><?php echo $ad['testing']; ?></span>
			<?php else: ?>
			<h3>Condition:</h3>
			<span><?php echo $ad['item_condition']; ?></span>
			<?php endif; ?>
		</div>
		<div class="adCta">
			<a class="gradient-button" href="<?php echo $ad['url']; ?>">View Details</a>
		</div>
	</div>
</div>