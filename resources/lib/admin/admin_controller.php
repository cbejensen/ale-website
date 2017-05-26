<?php
/*
 * The Admin controller facilitates all administrative/content management 
 * interfaces.
 * 
 * Users must be logged in, and should be authorized and validated with each request.
 */

class AdminController
{	
	public function __construct()
	{
		
	}
	
	public function showList()
	{
		AdminController::loadList();
		AdminController::loadItemModel();
		$newUser	=	array(	'db'	=>	array(
													'user'	=>	'admin',
													'pass'	=>	'euphrates8@N@N@$'
											),
								'user'	=>	array(
													'name'	=>	'admin'
											)
						);
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
				handleError($errorData, $conn, $source = 0, $mode = 0);
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