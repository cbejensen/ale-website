<?php
if (!isset($_POST['reqIsAjax']))
{
	exit;
}
header('Content-Type: application/json');
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

require_once PUBLIC_PATH . '/public_model.php';
require_once RESOURCES_PATH . '/routes.php';