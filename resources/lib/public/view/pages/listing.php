<div class="listing-main pageContent">
	<h1 class="section-head"><?php echo $this->model->listing->title; ?></h1>
	<div class="item-summary">
		<div class="listing-gallery">
			<img class="material" src="<?php echo $this->model->listing->photos['url'][1]; ?>" alt="<?php echo $this->model->listing->photos['alt'][1]; ?>">
			<?php if (!empty($this->model->listing->photos['url'][2])): ?>
			<div class="img-scroll">
				<img src="" alt="">
				<?php $this->model->listing->getPhotos(); ?>
				<img src="" alt="">
			</div>
			<?php endif; ?>
		</div>
		<div class="summary-data">
<!-- 			<table> -->
<!-- 				<tbody> -->
<!-- 					<tr> -->
<!-- 						<td>Condition:</td>
						<td><?php //echo $this->model->listing->ad['item_condition']; ?></td> -->
<!-- 					</tr> -->
<!-- 					<tr> -->
<!-- 						<td>Our Price:</td>
						<td><?php //echo $this->model->listing->ad['price']; ?></td> -->
<!-- 					</tr> -->
<!-- 					<tr> -->
	<!--					<td></td><!-- colspan=2 | buttons -->
<!-- 					</tr> -->
<!-- 				</tbody> -->
<!-- 			</table> -->
			<div class="listing-cta material">
				<div class="listing-cta-wrap text-cta">
					<h2 class="section-head">Interested in this item?</h2>
					<div>Let us know! Click the "Request a Quote" button to hear from us via email.</div>
					<div>You can also call us
					today, toll-free, at (866) 484-6031. We're available between 8am - 6pm EDT.</div>
				</div>
				<div class="listing-cta-wrap btn-cta">
					<a class="gradient-button" href="?controller=public&action=estimates&section=estimates&title=Request%20a%20Quote&inst=<?php echo str_replace(' ', '%20', $this->model->listing->title); ?>">Request a Quote</a>
				</div>
			</div>
		</div>
	</div>
	<div class="item-desc">
		<div class="item-info">
			<table>
				<tbody>
					<tr>
						<td class="section-head">Manufacturer:</td>
						<td><?php echo $this->model->listing->ad['mnfr']; ?></td>
					</tr>
					<tr>
						<td class="section-head">Brand:</td>
						<td><?php echo $this->model->listing->ad['brand']; ?></td>
					</tr>
					<tr>
						<td class="section-head">Model Name:</td>
						<td><?php echo $this->model->listing->ad['model']; ?></td>
					</tr>
					<?php // if model number exists ?>
					<tr>
						<td class="section-head">Model Number:</td>
						<td><?php // model number ?></td>
					</tr>
					<tr>
						<td class="section-head">Testing &amp; Functionality Notes:</td>
						<td><?php echo $this->model->listing->ad['testing']; ?></td>
					</tr>
					<tr>
						<td class="section-head">Components Included:</td>
						<td><?php echo $this->model->listing->ad['components']; ?></td>
					</tr>
					<tr>
						<td class="section-head">Condition Notes:</td>
						<td><?php echo $this->model->listing->ad['condition_note']; ?></td>
					</tr>
					<tr>
						<td class="section-head">Warranty:</td>
						<td><?php echo $this->model->listing->ad['warranty']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="description">
			<h2 class="section-head">Description</h2>
			<p><?php echo renderLayout($this->model->listing->ad['description']); ?></p>
		</div>
	</div>
</div>