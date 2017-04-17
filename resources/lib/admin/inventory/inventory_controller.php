<?php 

class InventoryController
{
	private $userData;
	
	public function __construct()
	{
		/* This should be refactored using functions that can be reused between controllers.
		 * The script should check whether someone's logged in and then act accordingly.
		 */
		
		// FOR DEVELOPMENT PURPOSES ONLY - NEED ACCESS TO DATABASE W/ ADMIN PRIVILEGES
		$this->userData	=	array(	'db'	=>	array(
												'user'	=>	'jack',
												'pass'	=>	'thisisthedb'
									),
									'user'	=>	array(
												'name'		=>	'Jack'
									)
							);
	}
	public function addManufacturer()
	{
		if (isset($_POST['mnfr']) && isset($_POST['subitem_of']))
		{
			$mnfr		=	htmlentities($_POST['mnfr'], ENT_QUOTES);
			$subitem_of	=	htmlentities($_POST['subitem_of'], ENT_QUOTES);
			$conn		=	db_connect(AL_DB, $this->userData);
			InventoryModel::addManufacturer($mnfr, $subitem_of, $conn);
		} else {
			if (isset($_POST['reqIsAjax']))
			{
				// Send back error msg
				$result			=	0;
				$title			=	'Missing Data';
				$message		=	'Please submit a value for each required field.';
				ajaxResponse_alert($result, $title, $message);
			} else {
				// Do this for non-ajax requests.
			}
		}
	}
}