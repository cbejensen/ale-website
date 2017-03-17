<?php 
function db_connect($database, $userData)
{
	switch ($database)
	{
		case AL_DB:
			require_once INC_PATH . '/db_login.php';
			break;
		case NOV_DB:
			require_once INC_PATH . '/db_login_novartis.php';
			break;
	}
	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error)
	{
		$errorData	=	array(
							'title'		=>	'Connection Error.',
							'message'	=>	'The server failed to connect. Please retry your request. If the problem persists, please report this error.',
							'error'		=>	$conn->connect_error
						);
		handleError($errorData, $conn, 'mysql');
	}
	return $conn;
}

function db_query($q, &$conn) {
	$result = $conn->query($q);
	if (!$result)
	{
		$errorData	=	array(
							'title'		=>	'Database Query Failed.',
							'message'	=>	'Please retry your request. If the problem persists, please report this error.',
							'error'		=>	$conn->error
						);
		handleError($errorData, $conn, 'mysql');
	}
	return $result;
}

function handleError($errorData, &$conn, $source = 0)
{
	// array $errorData, obj $conn, string $source
	// $errorData must contain at least 3 keys: 'title', 'message', and 'error'
	switch ($source)
	{
		case 'mysql':
			$log	=	LOGS_PATH . '/mysql-errors.log';
			break;
		case 'ajax':
			$log	=	LOGS_PATH . '/ajax-errors.log';
			break;
		default:
			$log	=	LOGS_PATH . '/app-errors.log';
			break;
	}
	ini_set('error_log', $log);
	error_log($errorData['title'] . ' ' . $errorData['error']);
	if (isset($_POST['reqIsAjax']))
	{
		$result		=	0;
		$title		=	$errorData['title'];
		$message	=	$errorData['message'];
		ajaxResponse_alert($result, $title, $message);
		exit;
	} else {
		alertUser($errorData['title'], $errorData['message']);
		// For a page request, exiting the script may not be the appropriate action.
		exit;
	}
}

function ajaxResponse_alert($result, $title, $message)
{
	// boolean $result, array $alertData
	$msg	=	array(
					$result,
					$title,
					$message
				);
	echo json_encode($msg);
}

function alertUser($title, $message)
{
	$alert	= 	[
					'head'		=>	$title,
					'message'	=>	$message
				];
	require_once 'site_content/view/pages/error.php';
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