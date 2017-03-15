<?php 
/*
 * This is a general test page
 */
?>
<!-- Test of the Add Manufacturer AJAX request -->
<main class="site-main">
	<label>Manufacturer:</label>
	<input type="text" id="mnfr" name="mnfr">
	<label>Subitem Of:</label>
	<select id="subitem_of" name="subitem_of">
		<option value="2">AGILENT</option>
	</select>
	<input type="button" onclick="addManufacturer()" value="Submit">
	<script src="js/inventory.js"></script>
</main>