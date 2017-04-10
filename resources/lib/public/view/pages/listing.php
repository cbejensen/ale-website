<?php $this->model->setListing($id, $this->userData); ?>
<main class="listing-main">
	<h1 class="section-head"><?php echo $this->model->listing->title; ?></h1>
	<div class="item-summary">
		<div class="listing-gallery">
			<img src="<?php echo $this->model->listing->photos['url'][1]; ?>" alt="<?php echo $this->model->listing->photos['alt'][1]; ?>">
			<div class="img-scroll">
				<img src="" alt="">
				<?php $this->model->listing->getPhotos(); ?>
				<img src="" alt="">
			</div>
		</div>
		<div class="summary-data">
			<table>
				<tbody>
					<tr>
						<td>Condition:</td>
						<td><?php echo $this->model->listing->ad['item_condition']; ?></td>
					</tr>
					<tr>
						<td>Our Price:</td>
						<td><?php echo $this->model->listing->ad['price']; ?></td>
					</tr>
					<tr>
						<td></td><!-- colspan=2 | buttons -->
					</tr>
				</tbody>
			</table>
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
			<p><?php echo $this->model->listing->ad['description']; ?></p>
		</div>
	</div>
</main>