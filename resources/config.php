<?php

ini_set('error_reporting', E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'logs/app-errors.log');
ini_set('display_errors', 0);

define('AL_DB',		'al_db');
define('NOV_DB', 	'novartis_qb_integration');

define('LIB_PATH', '../resources/lib');
define('RESOURCES_PATH', '../resources');
define('TEMPLATE_PATH', '../resources/templates');
define('INC_PATH', '../resources/inc');
define('PAGE_PATH', 'site_content/view/pages');

require_once LIB_PATH . '/functions.php';

/*
$db_config	=	array(
					AL_DB	=>	array(
						'hn'	=>	'localhost',
						'db'	=>	'al_db',
						'un'	=>	$db_user,
						'pw'	=>	$db_pass
					),
					NOV_DB	=>	array(
						'hn'	=>	'localhost',
						'db'	=>	'novartis_qb_integration',
						'un'	=>	$db_user,
						'pw'	=>	$db_pass
					)
				);
*/