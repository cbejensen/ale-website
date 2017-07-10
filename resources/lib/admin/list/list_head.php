<tr class="list-header-row">
	<?php 
		$cells	=	$this->getCells();
		foreach ($cells as $cell)
		{
	?>
	<th><?php echo $cell; ?></th>
	<?php } ?>
</tr>