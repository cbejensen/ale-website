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
		// Log the error, do not report to user.
		handleError($errorData, $conn, 'mysql', 0);
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
		if (isset($k) && $s[0] != '*') $s = '</ul>' . $s;
		if ($s[0] == '*')
		{
			static $i	=	0;
			static $k 	= 	1;
			switch ($i)
			{
				case 0:
					$s	=	str_replace('*', '<ul><li>', $s) . '</li>';
					break;
				default:
					$s	=	str_replace('*', '<li>', $s) . '</li>';
					break;
			}
			$i++;
		} else {
			$s	=	$s . '<br />';
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

function getMetaDescription($title, $section)
{
	if (isset($_GET['action']) && $_GET['action'] == 'listing')
	{
		$meta 	=	$title . ' for sale by Atlantic Lab Equipment.';
	}
	elseif (isset($_GET['subsection']))
	{
		switch ($_GET['subsection'])
		{
			case 'tecan':
				$meta	=	'Tecan Liquid Handlers: Atlantic Lab Equipment specializes in providing Premium Automation Solutions for the Tecan platform.';
				break;
			case 'other_lh':
				$meta	=	'Atlantic Lab Equipment carries a variety of Liquid Handling platforms, including those by Beckman-Coulter, Hamilton, Agilent, and Eppendorf.';
				break;
			case 'analytical':
				$meta	=	'ALE carries an array of Mass Spectrometers, HPLC, GC, and LC/MS Systems.';
				break;
			case 'dna_seq':
				$meta	=	'ALE has a large selection of DNA sequencers. Manufacturers include Illumina and ABI.';
				break;
			case 'readers':
				$meta	=	'ALE carries a selection of automation-ready plate readers for integration with your liquid handling platform.';
				break;
			case 'washers':
				$meta	=	'ALE carries a selection of automation-ready plate washers for integration with your liquid handling platform.';
				break;
			case 'sealers':
				$meta	=	'ALE carries a selection of automation-ready plate sealers for integration with your liquid handling platform.';
				break;
			case 'centrifuges':
				$meta	=	'ALE carries a selection of automation-ready centrifuges for integration with your liquid handling platform.';
				break;
		}
	}
	elseif (isset($_GET['page']))
	{
		switch ($_GET['page'])
		{
			case 'premium_equipment':
				$meta	=	'A Selection of ALE\'s Premium Equipment. This instrumentation is automation-enabled and ready to be integrated with your lab\'s liquid handing platform.';
			case 'new_arrivals':
				$meta	=	'Our newest collection of equipment. We\'re always bringing in new instruments to help labs with automation.';
		}
	} else {
		switch ($section)
		{
			case 'contact':
				$meta	=	'We want to hear from you! Ask us a question, make a service request, or leave us a comment!';
				break;
			case 'estimates':
				$meta	=	'Need an Instrument? Request a Quote on Equipment today!';
				break;
			case 'store':
				$meta	=	'ALE\'s Equipment catalog. Browse through our selection of Tecan Liquid Handlers, automation equipment, analytical systems, and DNA Sequencers.';
				break;
			case 'services':
				$meta	=	'ALE provides Premium Automation Solutions - A service for laboratories to improve their throughput, efficiency, and reproducibility.';
				break;
			case 'home':
				$meta	=	'Atlantic Lab Equipment: Specializing in Laboratory Automation and providing Premium Automation Solutions.';
				break;
			default:
				$meta = 'ALE: Atlantic Lab Equipment. Premium Automation Solutions.';
				break;
		}
	}
	return $meta;
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