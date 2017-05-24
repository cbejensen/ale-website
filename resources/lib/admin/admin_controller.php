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
	
	public function list()
	{
		/*
		 * Parameters:
		 * 		# results/page
		 * 		fields to be displayed
		 * 		sort by field
		 * 		sort order/direction
		 * 		search query
		 * 		page no.
		 * 		list type (item[review/complete/all], listings[general], ads, etc.)
		 * 		list scope
		 */
		AdminController::loadList();
		$list	=	new DataList(); // Any exceptions thrown should be caught by the router by default.
		require_once ADMIN_PATH . '/list/list_view.php';
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
	
	
}