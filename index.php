<?php
/*
 * This is the index of the application.
 * Given a url containing valid arguments, this
 * file initializes the request. If no arguments are present,
 * the script defaults to the site's homepage.
 */

require_once 'connection.php';


// Define the controller/action
if (isset($_GET['controller']) && isset($_GET['action']))
{
	$controller	= $_GET['controller'];
	$action		= $_GET['action'];
}
else
{
	$controller	= 'pages';
	$action		= 'home';
}


// Set the page title
if (isset($_GET['title']))
{
	$title = $_GET['title'];
}
else $title = 'Home';


// Define the site section
if (isset($_GET['section']))
{
	$section = $_GET['section'];
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
	require_once 'views/layout/layout.php';
}
else
{
	require_once 'views/layout/layout_aldb.php';
}

