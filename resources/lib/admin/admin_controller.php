<?php
/*
 * The Admin controller facilitates all administrative/content management 
 * interfaces.
 * 
 * Users must be logged in, and should be authorized and validated with each request.
 */

class AdminController
{	
	// DEV ONLY
	private static function getNewUser()
	{
		$newUser	=	array(	'db'	=>	array(
				'user'	=>	'admin',
				'pass'	=>	'euphrates8@N@N@$'
		),
				'user'	=>	array(
						'name'	=>	'admin'
				)
		);
		return $newUser;
	}
	// END DEV ONLY
	
	public function __construct()
	{
		
	}
	
	public function showList()
	{
		AdminController::loadList();
		AdminController::loadItemModel();
		// DEV ONLY
		$newUser	=	AdminController::getNewUser();
		// END DEV ONLY
		$conn		=	db_connect(AL_DB, $newUser);
		$list		=	new DataList($conn); // Any exceptions thrown should be caught by the router by default.
		require_once ADMIN_PATH . '/list/list_view.php';
		// If the 'inv' parameter is set, the user has requested an item's data
		if (isset($_GET['inv']))
		{
			try {
				$asset	=	new InvItem($_GET['inv'], $conn);
			} catch (Exception $e) {
				// Asset could not be created.
				// Find a way to alert the user, preferably in the view you're about to call.
				$errorData	=	array('title' => 'Could Not Get Item.', 'error' => $e->getMessage());
				handleError($errorData, $conn, 0, 0);
			}
			require_once ADMIN_PATH . '/inventory/show_invData.php';
		}
	}
	
	public function updateList()
	{
		/*
		 * For ajax requests.
		 */
		AdminController::loadList();
		$list	=	new DataList();
		$list->getRows();
	}
	
	public function updateInvItem()
	{
		// DEV ONLY
		$newUser	=	AdminController::getNewUser();
		// END DEV ONLY
		$conn		=	db_connect(AL_DB, $newUser);
		AdminController::loadItemModel();
		try {
			$json	=	json_decode($_POST['json'], true);
			if (is_null($json) || !$json)
			{
				throw new Exception('JSON decode error: ' . json_last_error_msg());
			}
			$asset	=	new InvItem($json['aleAsset'], $conn);
			$asset->update($json);
		} catch (Exception $e) {
			// If the request could not be decoded, alert the user with a message and error code.
			$errorData	=	array(	'title'		=>	'Item Update Failed',
									'message'	=>	'The server was unable to process your request.',
									'error' 	=>	$e->getMessage()
								);
			handleError($errorData, $conn, 0, 1);
		}
	}
	
	private static function loadList()
	{
		require_once LIB_PATH . '/paginator/paginator.php';
		require_once ADMIN_PATH . '/list/list_model.php';
	}
	
	private static function loadItemModel()
	{
		require_once ADMIN_PATH . '/inventory/invItem.php';
	}
	
	
}