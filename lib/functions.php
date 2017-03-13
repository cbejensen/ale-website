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
		if (isset($_POST['reqIsAjax']))
		{
			$error_data		=	array();
			$error_data[]	=	'An Error Has Occurred';
			$error_data[]	=	'Please retry your request. Sorry for the inconvenience!';
			echo json_encode($error_data);
			exit;
		} else {
			die($conn->connect_error); // UPDATE NEEDED: Call an alert informing the user the db connection has erred.
		}
	}
	return $conn;
}

function getFeaturedAds()
{
	$conn	=	Db::getInstance(AL_DB);
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