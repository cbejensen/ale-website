<?php 
/*
 * This is a temporary script that offers a simple way to add listings to
 * the site's database, as well as any ads associated with them.
 */

require_once '../resources/config.php';
require_once LIB_PATH . '/admin/inventory/inventory_controller.php';
require_once LIB_PATH . '/admin/inventory/inventory_model.php';

//Attempt to verify user.
if (!empty($_POST['user']) && !empty($_POST['pass']) && $_POST['user'] != 'admin')
{
	$userData	=	array(	'db'	=>	array(
			'user'	=>	$_POST['user'],
			'pass'	=>	$_POST['pass']
	),
			'user'	=>	array(
					'name'		=>	'Admin'
			)
	);
	if ($conn		=	db_connect(AL_DB, $userData))
	{
		echo 'Login Successful.';
	}
} else {
	// Display login screen if failed to verify
?> 
<div>
	<h1>Enter Credentials</h1>
	<label>Username/Password</label>
	<form action="add_listing.php" method="post">
	<input type="text" name="user" placeholder="username">
	<input type="text" name="pass" placeholder="password">
	<input type="submit" value="Submit" name="submit">
	</form>
</div>
<?php 
exit;
}
// Assuming Login is Successful: check for form submissions
if (isset($_POST['mnfr-form']))
{
	echo 'Adding Manufacturer...'. "\n";
	$inv	=	new InventoryController($userData);
	$inv->addManufacturer();
	echo 'Done.' . "\n";
	echo '<a href="add_listing.php">Back</a>';
	exit;
}
if (isset($_POST['new-listing']))
{
	echo 'Adding Listing....' . "\n";
	$inv	=	new InventoryController($userData);
	$inv->addGeneralListing();
	echo 'Done.' . "\n";
	echo '<a href="add_listing.php">Back</a>';
	exit;
}
// If first interaction with script, prompt user for new entry.
?>
<style>
	input, select, label, 
	h1, textarea			{display: block; width: 20rem; font-family:calibri,sans-serif;}
	input, select, textarea	{margin-bottom: 1rem; padding: 0.2rem 0.2rem; background-color: #f6f6f6;border: 1px solid #bbb;}
	div.col-wrap			{display: inline-block; vertical-align: top; margin-right: 2rem;}
	input[type="submit"]	{background-color: #ddd;cursor:pointer}
</style>
<div class="sect-wrap">
	<h1>Add a New Listing</h1>
	<form action="add_listing.php" method="post">
	<div class="col-wrap">
		<input type="hidden" name="new-listing" value="true">
		<input type="hidden" name="user" value="<?php echo $_POST['user']; ?>">
		<input type="hidden" name="pass" value="<?php echo $_POST['pass']; ?>">
		<label>Manufacturer</label>
		<select name="mnfr">
		<?php 
			if ($mnfrs		=	InventoryModel::getManufacturers($userData))
			{
				foreach ($mnfrs as $s)
				{
					echo "<option value=\"{$s['id']}\">{$s['mnfr']}</option>";
				}
			} else {
				echo '<option selected disabled>Error</option>';
			}
		?>
		</select>
		<label>Model</label>
		<select name="model">
		<?php 
			if ($models		=	InventoryModel::getModels($userData))
			{
				foreach ($models as $s)
				{
					echo "<option value=\"{$s['id']}\">{$s['model']} {$s['function_desc']}</option>";
				}
			} else {
				echo '<option selected disabled>Error</option>';
			}
		?>
		</select>
		<label>Brand</label>
		<select name="brand">
			<option selected value="">Select a Brand</option>
		</select>
		<label>Title Extension</label>
		<input type="text" name="title_extn">
		<label>Price</label>
		<input type="text" name="price">
		<label>Item Condition</label>
		<select name="item_condition">
			<option selected value="">Select a Condition</option>
		</select>
		<label>Testing</label>
		<select name="testing">
			<option selected value="Not Tested">Not Tested</option>
			<option value="Tested">Tested</option>
			<option value="AS-IS">AS-IS</option>
			<option value="Powers Up">Powers Up</option>
		</select>
		<label>Condition Note</label>
		<input type="text" name="condition_note">
	</div>
	<div class="col-wrap">
		<label>Warranty</label>
		<textarea rows=6 cols=10 name="warranty"></textarea>
		<label>Components</label>
		<textarea rows=6 cols=10 name="components"></textarea>
		<label>Description</label>
		<textarea rows=12 cols=10 name="description"></textarea>
	</div>
	<div class="col-wrap">
		<input type="submit" value="Submit Listing">
	</div>
	</form>
</div>
<div class="sect-wrap">
	<div class="col-wrap">
	<h1>Add Manufacturer</h1>
	<form action="" method="post">
		<input type="hidden" name="mnfr-form" value="true">
		<input type="hidden" name="user" value="<?php echo $_POST['user']; ?>">
		<input type="hidden" name="pass" value="<?php echo $_POST['pass']; ?>">
		<label>Manufacturer Name</label>
		<input type="text" name="mnfr">
		<label>Subitem Of</label>
		<select name="subitem_of">
			<option selected disabled>Subitem Of</option>
		<?php 
			if ($so		=	InventoryModel::getSubitems($userData))
			{
				foreach ($so as $s)
				{
					echo "<option value=\"{$s['id']}\">{$s['subitem_of']}</option>";
				}
			} else {
				echo '<option selected disabled>Error</option>';
			}
		?>
		</select>
		<input type="submit" value="Submit Manufacturer">
	</form>
	</div>
	<div class="col-wrap">
	<h1>Add Model</h1>
	<form action="" method="post">
		<input type="hidden" name="model-form" value="true">
		<input type="hidden" name="user" value="<?php echo $_POST['user']; ?>">
		<input type="hidden" name="pass" value="<?php echo $_POST['pass']; ?>">
		<label>Model Name</label>
		<input type="text" name="model">
		<label>Function Description</label>
		<input type="text" name="function_desc">
		<input type="submit" value="Submit Model">
	</form>
	</div>
</div>