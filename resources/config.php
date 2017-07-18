<?php

ini_set('error_reporting', E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', '../resources/logs/app-errors.log');
ini_set('display_errors', 0);
ini_set('date.timezone', 'America/New_York');

define('AL_DB',		'al_db');
define('NOV_DB', 	'novartis_qb_integration');

define('LIB_PATH', '../resources/lib');
define('RESOURCES_PATH', '../resources');
define('TEMPLATE_PATH', '../resources/templates');
define('INC_PATH', '../resources/inc');
define('PUBLIC_PATH', '../resources/lib/public');
define('ADMIN_PATH', '../resources/lib/admin');
define('PAGE_PATH', '../resources/lib/public/view/pages');
define('LOGS_PATH', '../resources/logs');
define('SENTINEL_PATH', '../resources/lib/vendor/cartalyst/sentinel');

require_once LIB_PATH . '/functions.php';

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;

require '../resources/lib/vendor/autoload.php';

$capsule	=	new Capsule;

$capsule->addConnection([
		'driver'	=>	'mysql',
		'host'		=>	'localhost',
		'database'	=>	'al_db',
		'username'	=>	'admin',
		'password'	=>	'euphrates8@N@N@$',
		'charset'	=>	'utf8',
		'collation'	=>	'utf8_unicode_ci',
]);

$capsule->bootEloquent();

if (isset($_GET['controller']) && $_GET['controller'] == 'admin')
{
	$_USER	=	Sentinel::check();
	if (!$_USER)
	{
		if (isset($_POST['reqIsAjax'])) {
			// Tell JS to open a login dialog
		} else {
			// Send to login page via script
			//require_once ADMIN_PATH . '/login.php';
			require_once 'admin_login.php';
			//echo $_SERVER['REQUEST_URI'];
			exit;
		}
	} else {
// 		Sentinel::logout();
	}
}
