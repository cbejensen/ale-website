<?php 
require_once 'connection.php';
require_once 'lib/functions.php';
define('AL_DB',		'al_db');
define('NOV_DB', 	'novartis_qb_integration');

ini_set('error_reporting', E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'logs/app-errors.log');
ini_set('display_errors', 0);

if (isset($_GET['controller']) && isset($_GET['action']))
{
	$controller	= $_GET['controller'];
	$action		= $_GET['action'];
}
else
{
	exit;
}

require_once 'routes.php';