<tr id="<?php echo $row['aleAsset']; ?>" class="<?php echo ($class % 2 === 0) ? 'even-row' : 'odd-row'; ?>">
	<?php 
		$cells	=	$this->getCells(1, $row);
		foreach ($cells as $cell)
		{
	?>
	<td><?php echo $cell; ?></td>
	<?php } ?>
</tr>