<?php
/*
 * The Admin controller facilitates all administrative/content management 
 * interfaces.
 * 
 * Users must be logged in, and should be authorized and validated with each request.
 */

class PublicController
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
		require_once ADMIN_PATH . '/list/list_model.php';
		$list	=	new DataList(); // Any exceptions thrown should be caught by the router by default.
	}
	
	
}