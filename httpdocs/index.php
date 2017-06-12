<?php
/*
 * This is the index of the application.
 * Given a url containing valid arguments, this
 * file initializes the request. If no arguments are present,
 * the script defaults to the site's homepage.
 */

require_once '../resources/config.php';
require_once '../resources/user_init.php';

// Define the controller/action
if (isset($_GET['controller']) && isset($_GET['action']))
{
	$controller	= htmlentities($_GET['controller'], ENT_QUOTES);
	$action		= htmlentities($_GET['action'], ENT_QUOTES);
}
else
{
	$controller	= 'public';
	$action		= 'home';
}


// Set the page title
if (isset($_GET['title']))
{
	$title = htmlentities($_GET['title'], ENT_QUOTES);
}
elseif (isset($_GET['action']) && $_GET['action'] == 'listing')
{
	$id		=	htmlentities($_GET['id'], ENT_QUOTES);
	$title	=	getGenListingTitle($id);
	if (empty($title)) {
		// send warning to log
		$title = 'Bum';
	}
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
		case 'admin':
		case 'admin_pages':
		case 'admin_lists':
		case 'admin_inventory':
		case 'admin_qb':
			$section = 'al_db';
			
			if (isset($_GET['subsect']))
			{
				$sub	=	$_GET['subsect'];
			} else $sub =	'home';
			
			switch ($sub)
			{
				case 'home':
					$subsect = 'home';
					break;
				case 'inventory':
					$subsect = 'inventory';
					break;
				case 'gen_listings':
					$subsect	=	'gen_listings';
					break;
				default:
					$subsect = 'home';
			}
			break;
		default:
			$section = 'home';
			break;
	}
}


// Assign Meta Description
$meta	=	getMetaDescription($title, $section);


// Call appropriate layout
if ($section != 'al_db')
{
	require_once PUBLIC_PATH . '/public_model.php';
	require_once TEMPLATE_PATH . '/layout.php';
}
else
{
	require_once TEMPLATE_PATH . '/layout_aldb.php';
}

