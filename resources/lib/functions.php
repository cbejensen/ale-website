<?php
function setDefaultUser()
{
	$userData	=	array(	'db'	=>	array(
								'user'	=>	'guest',
								'pass'	=>	'default_ale_guest'
							),
							'user'	=>	array(
								'name'		=>	'Guest'
							)
					);
	return $userData;
}

function db_connect($database, $userData = 0)
{
	if (!$userData) $userData = setDefaultUser();
	switch ($database)
	{
		case AL_DB:
			require INC_PATH . '/db_login.php';
			break;
		case NOV_DB:
			require INC_PATH . '/db_login_novartis.php';
			break;
		default: 
			require INC_PATH . '/db_login.php';
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
		$conn	=	false;
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

function handleError($errorData, &$conn, $source = 0, $mode = 1)
{
	// $errorData must contain at least 3 keys: 'title', 'message', and 'error'
	// mode: 1 -> Send alert to user.	0 -> Don't send alert to user
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
	
	// If the request originated via Ajax, send the user a response
	if (isset($_POST['reqIsAjax']) && $mode == 1)
	{
		$result		=	0;
		$title		=	$errorData['title'];
		$message	=	$errorData['message'];
		ajaxResponse_alert($result, $title, $message);
	} elseif (!isset($_POST['reqIsAjax']) && $mode == 1) {
		alertUser($errorData['title'], $errorData['message']);
		// For a page request, exiting the script may not be the appropriate action.
		//exit;
	}
}

function ajaxResponse_alert($result, $title, $message)
{
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
	require_once PUBLIC_PATH . '/view/pages/error.php';
}

function getGenListingTitle($id)
{
	$userData 	=	setDefaultUser();
	$conn		=	db_connect(AL_DB, $userData);
	require_once PUBLIC_PATH . '/listing.php';
	try {
	$listing	=	new GenListing($id, $conn);
	$r			=	$listing->title;
	} catch (Exception $e) {
		// error - constructor method threw an exception	
		$r	=	false;
	}
	$conn->close();
	return $r;
}

function getCategoryName($id, $mode = 1)
{
	$conn = db_connect(AL_DB);
	switch ($mode)
	{
		case 1:
			$q	=	"SELECT ale_category FROM ale_category WHERE id=$id";
			break;
		case 2:
			$q	=	"SELECT ale_subcategory FROM ale_category WHERE id=$id";
			break;
	}
	$r		=	db_query($q, $conn);
	$r->data_seek(0);
	$row	=	$r->fetch_array(MYSQLI_NUM);
	return $row[0];
}

function renderLayout($str)
{
	$strs	=	explode('<br />', $str);
	$len	=	count($strs);
	foreach ($strs as &$s)
	{
		static $i	=	1;
		//echo '>>> ' . $s[0] . ' <<<';
		if ($s[0] == '*')
		{
			switch ($i)
			{
				case 0:
					$s	=	str_replace('*', '<ul><li>', $s) . '</li>';
					break;
				case ($i == $len):
					$s	=	str_replace('*', '<li>', $s) . '</li></ul>';
					break;
				default:
					$s	=	str_replace('*', '<li>', $s) . '</li>';
					break;
			}
		}
	}
	$str	=	implode($strs);
	return $str;
}

function refValues($arr)
{
	if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
	{
		$refs = array();
		foreach($arr as $key => $value)
			$refs[$key] = &$arr[$key];
			return $refs;
	}
	return $arr;
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