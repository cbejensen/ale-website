<?php
/*
 * This file is included for each item in a list of listings.
 */
?>
<?php //if (!isset($ad['url'])) continue; ?>
<div id="listItem_<?php echo $ad_i . '_' . $i; ?>" class="list-item">
	<div class="list-img">
		<img class="material" src="<?php echo $ad['url']; ?>" alt="<?php echo $ad['alt']; ?>">
	</div>
	<div class="list_description">
		<div class="desc_subsection">
			<h2 class="section-head"><?php echo $title; ?></h2>
			<p><?php echo $ad['description']; ?></p>
		</div>
		<div class="desc_subsection">
			<?php if (isset($ad['price'])): ?>
			<h3>Our Price:</h3>
			<span>US <span class="dollarSign">$</span><?php echo number_format($ad['price'], 2); ?></span>
			<?php endif; ?>
			<?php if (isset($ad['testing'])): ?>
			<h3>Status:</h3>
			<span><?php echo $ad['testing']; ?></span>
			<?php endif; ?>
			<?php //if (isset($ad['item_condition'])): ?>
			<h3>Condition:</h3>
			<span><?php echo $ad['item_condition']; ?></span>
			<?php //endif; ?>
		</div>
	</div>
</div>