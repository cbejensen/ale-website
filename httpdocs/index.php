<?php
/*
 * This is the index of the application.
 * Given a url containing valid arguments, this
 * file initializes the request. If no arguments are present,
 * the script defaults to the site's homepage.
 */

require_once '../resources/config.php';
require_once '../resources/user_init.php';

$controller	=	defineController();
$action		=	defineAction();
$title		=	setTitle();
$section	=	defineSection($controller);

if (isset($_GET['subsect'])) {
	$subsect	=	defineSubsection();
}

$meta	=	getMetaDescription($title, $section);
//getLayout($section);
if ($section != 'al_db')
{
	require_once PUBLIC_PATH . '/public_model.php';
	require_once TEMPLATE_PATH . '/layout.php';
}
else
{
	require_once TEMPLATE_PATH . '/layout_aldb.php';
}

function defineController()
{
	if (isset($_GET['controller'])) {
		$controller	=	htmlentities($_GET['controller'], ENT_QUOTES);
	} else {
		$controller	=	'public';
	}
	return $controller;
}

function defineAction()
{
	if (isset($_GET['action'])) {
		$action	=	htmlentities($_GET['action'], ENT_QUOTES);
	} else {
		$action	=	'home';
	}
	return $action;
}

function setTitle()
{
	if (isset($_GET['title'])) {
		$title = htmlentities($_GET['title'], ENT_QUOTES);
	} 
	elseif (isset($_GET['action']) && $_GET['action'] == 'listing')
	{
		if (isset($_GET['id'])) {
			$id		=	htmlentities($_GET['id'], ENT_QUOTES);
			$title	=	getGenListingTitle($id);
			if (empty($title)) {
				$title = 'Products';
			}
		} else {
			$title	=	'Products';
		}
	} else {
		$title	=	'Home';
	}
	return $title;
}

function defineSection($controller)
{
	if (isset($_GET['section']))
	{
		$section = htmlentities($_GET['section'], ENT_QUOTES);
	} else {
		// Determine if admin
		switch ($controller)
		{
			case 'admin':
			case 'admin_inventory':
			case 'admin_qb':
				$section = 'al_db';
				break;
			default:
				$section = 'home';
		}
	}
	return $section;
}

function defineSubsection()
{
	$sub	=	$_GET['subsect'];
	switch ($sub)
	{
		case 'home':
			$subsect	=	'home';
			break;
		case 'inventory':
			$subsect 	=	'inventory';
			break;
		case 'gen_listings':
			$subsect	=	'gen_listings';
			break;
		case 'misc_records':
			$subsect	=	'misc_records';
			break;
		default:
			$subsect 	=	'home';
	}
	return $subsect;
}

function getLayout($section)
{
	if ($section != 'al_db')
	{
		require_once PUBLIC_PATH . '/public_model.php';
		require_once TEMPLATE_PATH . '/layout.php';
	}
	else
	{
		require_once TEMPLATE_PATH . '/layout_aldb.php';
	}
	
}