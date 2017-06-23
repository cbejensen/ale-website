<?php
// list of controllers and their actions -- allowed values
$controllers	= array('public' 			=>	[	'home', 	'services',
													'store',	'news',
													'contact', 	'estimates', 
													'error', 	'test',
													'submitForm',
													'listing'
													],
		
						'admin'				=>	[	'showList',			'updateInvItem',
													'getVendors', 		'updateItemPhotos',
													'imagePreprocess', 	'getInvAssetData',
													'invAction',		'updateList',
													'itemImport',		'submitItemImport',
													'createBatch'
													],
		
						'admin_pages'		=> 	[	'dashboard',	'documentation',
													''
													],
		
						'admin_inventory'	=> 	[	'addManufacturer'
													]
						//''			=> ['', '']
);

// check that requested controller and action are allowed
if (array_key_exists($controller, $controllers))
{
	(in_array($action, $controllers[$controller])) ? call($controller, $action) : call('pages', 'error');
}
else
{
	call('pages', 'error');
}
// End of script



function call($controller, $action)
{
	// create a new instance of the needed controller
	switch ($controller)
	{
		case 'public':
			require_once PUBLIC_PATH . '/public_controller.php';
			$controller	= new PublicController();
			break;
			
		case 'admin':
			require_once ADMIN_PATH . '/admin_controller.php';
			try {
				$controller	= new AdminController();
			} catch (Exception $e) {
				// if the controller cannot be constructed:
			}
			
			break;
			
		case 'admin_pages':
			// Validate user before proceeding - Use Trusted 3rd Party Library
			require_once LIB_PATH . '/admin/pages/pages_controller.php';
			$controller = new Admin_PagesController();
			break;
			
		case 'admin_inventory':
			// Validate user before proceeding
			require_once LIB_PATH . '/admin/inventory/inventory_controller.php';
			require_once LIB_PATH . '/admin/inventory/inventory_model.php';
			$controller = new InventoryController();
			break;
			
		case 'admin_lists':
			// Validate user before proceeding
			require_once LIB_PATH . '/admin/lists/lists_controller.php';
			require_once LIB_PATH . '/admin/lists/lists_model.php';
			$controller = new ListsController();
			break;
			
		case 'admin_qb':
			// Validate user before proceeding
			require_once LIB_PATH . '/admin/qb/qb_controller.php';
			$controller = new QbController();
			break;
	}

	// call the action
	try 
	{
		$controller->{ $action }();
	} 
	catch (Exception $e) {
		$errorData	=	array('title' => "Action: $action Threw an Exception:", 'error' => $e->getMessage());
		ini_set('error_log', LOGS_PATH . '/app-errors.log');
		error_log($errorData['title'] . ' ' . $errorData['error']);
	}
}