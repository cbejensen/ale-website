<?php
require_once 'connection.php';

// Set the page title
if (isset($_GET['title'])) 		$title = $_GET['title'];
else $title = 'Premium Equipment for Less';

// Define the site section
if (isset($_GET['section'])) 	$section = $_GET['section'];
else $section = 'none';

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
	$title		= 'Home';
	$section	= 'home';
}

require_once 'views/layout.php';
