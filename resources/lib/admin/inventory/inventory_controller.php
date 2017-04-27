<?php 

class InventoryController
{
	private $userData;
	
	public function __construct($userData = false)
	{
		/* This should be refactored using functions that can be reused between controllers.
		 * The script should check whether someone's logged in and then act accordingly.
		 */
		
		// FOR DEVELOPMENT PURPOSES ONLY - NEED ACCESS TO DATABASE W/ ADMIN PRIVILEGES
		if ($userData	=== false) {
			$this->userData	=	array(	'db'	=>	array(
															'user'	=>	'jack',
															'pass'	=>	'thisisthedb'
													),
										'user'	=>	array(
															'name'		=>	'Jack'
													)
								);
		} else {
			$this->userData	=	$userData;
		}
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
				echo 'Missing Data';
			}
		}
	}
	
	public function addModel()
	{
		if (isset($_POST['model']) && isset($_POST['function_desc']))
		{
			$model		=	htmlentities($_POST['model'], ENT_QUOTES);
			$func		=	htmlentities($_POST['function_desc'], ENT_QUOTES);
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
				echo 'Missing Data';
			}
		}
	}
	
	public function addGeneralListing()
	{
		if (isset($_POST['new-listing']) && isset($_POST['mnfr']))
		{
			$data		=	array(
								'mnfrID'		=>	$_POST['mnfr'],
								'modelID'		=>	$_POST['model'],
								'brandID'		=>	$_POST['brand'],
								'title_extn'	=>	$_POST['title_extn'],
								'price'			=>	$_POST['price'],
								'item_condition'=>	$_POST['item_condition'],
								'testing'		=>	$_POST['testing'],
								'condition_note'=>	$_POST['condition_note'],
								'warranty'		=>	$_POST['warranty'],
								'components'	=>	$_POST['components'],
								'description'	=>	$_POST['description'],
							);
			$conn		=	db_connect(AL_DB, $this->userData);
			foreach ($data as &$d) if (empty($d)) $d = null;
			InventoryModel::addGeneralListing($data, $conn);
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
				echo 'Missing Data';
			}
		}
	}
}