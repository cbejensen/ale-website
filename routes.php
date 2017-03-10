<?php

// list of controllers and their actions -- allowed values
$controllers	= array('pages' 		=> ['home', 'products_services', 'contact', 'estimates', 'error'],
						'admin_pages'	=> ['dashboard', 'manage_ads']
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
	require_once 'controllers/' . $controller . '_controller.php';

	// create a new instance of the needed controller
	switch ($controller)
	{
		case 'pages':
			$controller	= new PagesController();
			break;
		case 'admin_pages':
			$controller = new Admin_PagesController();
			break;
	}

	// call the action
	$controller->{ $action }();
}