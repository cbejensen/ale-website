<?php
/*
 * This is the index of the application.
 * Given a url containing valid arguments, this
 * file initializes the request. If no arguments are present,
 * the script defaults to the site's homepage.
 */

require_once '../resources/config.php';


// Define the controller/action
if (isset($_GET['controller']) && isset($_GET['action']))
{
	$controller	= htmlentities($_GET['controller'], ENT_QUOTES);
	$action		= htmlentities($_GET['action'], ENT_QUOTES);
}
else
{
	$controller	= 'webpages';
	$action		= 'home';
}


// Set the page title
if (isset($_GET['title']))
{
	$title = htmlentities($_GET['title'], ENT_QUOTES);
}
else $title = 'Home';


// Define the site section
if (isset($_GET['section']))
{
	$section = htmlentities($_GET['section'], ENT_QUOTES);
}
else
{
	// Determine if admin
	switch ($controller)
	{
		case 'admin_pages':
		case 'admin_lists':
		case 'admin_inventory':
		case 'admin_qb':
			$section = 'al_db';
			break;
		default:
			$section = 'home';
			break;
	}
}


// Call appropriate layout
if ($section != 'al_db')
{
	require_once TEMPLATE_PATH . '/layout.php';
}
else
{
	require_once TEMPLATE_PATH . '/layout_aldb.php';
}

