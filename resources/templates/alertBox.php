<?php 
/*
 * This is included when an error of some kind has occurred.
 * / */
?>
<div class="alertBox material" id="alertBox">
	<span class="closeBtn" id="modal_close" onclick="closeDialog('alertBox');">x</span>
	<h2 class="section-head"><?php echo $alert['head']; ?></h2>
	<p><?php echo $alert['message']; ?></p>
	<input type="button" value="Accept" onclick="closeDialog('alertBox');">
</div>