<?php
	$database			=	'al_search';
	$mysql_user 		=	'guest';
	$mysql_password 	= 	'default_ale_guest'; 
	$mysql_host 		= 	'localhost';
	$mysql_table_prefix = 	'';

	require_once '../../functions.php';
	define('LOGS_PATH', '../../../logs');
	define('PUBLIC_PATH', '../../public');


// 	$success = mysql_pconnect ($mysql_host, $mysql_user, $mysql_password);
// 	if (!$success)
// 		die ("<b>Cannot connect to database, check if username, password and host are correct.</b>");
//     $success = mysql_select_db ($database);
// 	if (!$success) {
// 		print "<b>Cannot choose database, check if database name is correct.";
// 		die();
// 	}
	
	$success = new mysqli($mysql_host, $mysql_user, $mysql_password, $database);
	if ($success->connect_error)
	{
		$errorData	=	array(
				'title'		=>	'Connection Error.',
				'message'	=>	'The server failed to connect. Please retry your request. If the problem persists, please report this error.',
				'error'		=>	$success->connect_error
		);
		handleError($errorData, $success, 'mysql');
	}
?>

