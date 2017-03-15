<?php 

function db_connect($database)
{
	switch ($database)
	{
		case AL_DB:
			require_once 'inc/db_login.php';
			break;
		case NOV_DB:
			require_once 'inc/db_login_novartis.php';
			break;
	}
	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error)
	{
		ini_set('error_log', 'logs/mysql-errors.log');
		error_log('MySQL refused to connect. ' . $conn->connect_error);
		if (isset($_POST['reqIsAjax']))
		{
			$error_data		=	array();
			$error_data[]	=	'Connection Error';
			$error_data[]	=	'The server failed to connect. Please retry your request. If the problem persists, please report this error.';
			echo json_encode($error_data);
			exit;
		} else {
			$title		=	'Connection Error';
			$message	=	'The server failed to connect. Please retry your request. If the problem persists, please report this error.';
			alertUser($title, $message);
			exit;
		}
	}
	return $conn;
}

function getFeaturedAds()
{
	$conn	=	Db::getInstance(AL_DB);
}

function alertUser($title, $message)
{
	$alert	= 	[
					'head'		=>	$title,
					'message'	=>	$message
				];
	require_once 'views/pages/error.php';
}

function mysql_entities_fix_string($conn, $string)
{
	return htmlentities(mysql_fix_string($conn, $string), ENT_QUOTES);
}


function mysql_fix_string($conn, $string)
{
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return $conn->real_escape_string($string);
}