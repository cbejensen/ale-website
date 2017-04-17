<?php 

class InventoryController
{
	public function addManufacturer()
	{
		// This method is called by ajax requests.
		if (isset($_POST['mnfr']) && isset($_POST['subitem_of']))
		{
			$mnfr		=	htmlentities($_POST['mnfr'], ENT_QUOTES);
			$subitem_of	=	htmlentities($_POST['subitem_of'], ENT_QUOTES);
			InventoryModel::addManufacturer($mnfr, $subitem_of);
		} else {
			// Send back error msg
			$error_data		=	array();
			$error_data[]	=	'Missing Data';
			$error_data[]	=	'Please submit a value for each required field.';
			echo json_encode($error_data);
		}
	}
}