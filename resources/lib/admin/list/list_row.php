<tr id="<?php echo $row['aleAsset']; ?>">
	<?php 
		$cells	=	$this->getCells($mode, $row);
		foreach ($cells as $cell)
		{
	?>
	<td><?php echo $cell; ?></td>
	<?php } ?>
</tr>