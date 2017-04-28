<?php 
require_once '../resources/lib/functions.php';
if (isset($_POST['test_area']))
{
	echo renderLayout(str_replace( "\n", '<br />', $_POST['test_area']));
} else {
?>
<form action="text_test.php" method="post">
<textarea name="test_area"></textarea>
<input type="submit" value="submit">
</form>
<?php } ?>