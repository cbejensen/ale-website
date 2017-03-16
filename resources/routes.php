<?php

// list of controllers and their actions -- allowed values
$controllers	= array('public' 			=>	[	'home', 	'products_services', 
													'contact', 	'estimates', 
													'error', 	'test'
													],
		
						'admin_pages'		=> 	[	'dashboard',	'manage_ads'
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
	//require_once LIB_PATH . '/controllers/' . $controller . '_controller.php';

	// create a new instance of the needed controller
	switch ($controller)
	{
		case 'public':
			require_once LIB_PATH . '/public/public_controller.php';
			$controller	= new PublicController();
			break;
		case 'admin_pages':
			// Validate user before proceeding
			$controller = new Admin_PagesController();
			break;
		case 'admin_inventory':
			// Validate user before proceeding
			require_once 'models/inventory_model.php';
			$controller = new InventoryController();
			break;
		case 'admin_lists':
			// Validate user before proceeding
			//require_once '';
			//$controller = new ListsController();
			//break;
		case 'admin_qb':
			// Validate user before proceeding
			//require_once '';
			//$controller = new QbController();
			//break;
	}

	// call the action
	$controller->{ $action }();
}