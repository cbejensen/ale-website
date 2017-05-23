<tr>
	<?php 
		$cells	=	$this->getCells($mode);
		foreach ($cells as $cell)
		{
	?>
	<td><?php echo $cell; ?></td>
	<?php } ?>
</tr>