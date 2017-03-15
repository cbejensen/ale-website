<?php

require_once '../resources/config.php';

if (isset($_GET['controller']) && isset($_GET['action']))
{
	$controller	= $_GET['controller'];
	$action		= $_GET['action'];
}
else
{
	exit;
}

require_once RESOURCES_PATH . 'routes.php';