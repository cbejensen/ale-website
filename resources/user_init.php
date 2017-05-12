<?php

// Check for Search Form user preference changes

// SERP Format
if (!isset($_COOKIE['serp-format']))
{
	if (isset($_GET['lo']))
	{
		setLoCookie();
	} else {
		if (!setcookie('serp-format', 'grid', time()+60*60*24*30*2, '/'))
		{
			// send report that cookie could not be sent.
		}
	}
} else {
	if (isset($_GET['lo']) && $_COOKIE['serp-format'] != $_GET['lo'])
	{
		setLoCookie();
	}
}

// SERP item per-page limit
if (!isset($_COOKIE['serp-limit']))
{
	if (isset($_GET['limit']) && is_numeric($_GET['limit']))
	{
		setLimitCookie();
	} else {
		if (!setcookie('serp-limit', 20, time()+60*60*24*30*2, '/'))
		{
			// send report that cookie could not be sent.
		}
	}
} else {
	if (isset($_GET['limit']) && $_COOKIE['serp-limit'] != $_GET['limit'])
	{
		if (is_numeric($_GET['limit'])) {
			setLimitCookie();
		}
	}
}

if ($_GET['controller']	== 'admin')
{
	// Set cookies
}


// Functions
function setLoCookie()
{
	// Set SERP Layout preference
	switch ($_GET['lo']) // input restriction
	{
		case 'grid':
			$lo	=	'grid';
			break;
		case 'list':
			$lo =	'list';
			break;
		default:
			$lo =	'grid';
	}
	if (!setcookie('serp-format', $lo, time()+60*60*24*30*2, '/'))
	{
		// send report that cookie could not be sent.
	}
}

function setLimitCookie()
{
	// Set SERP Items Per Page Limit preference
	$limit	=	$_GET['limit'];
	if (!setcookie('serp-limit', $limit, time()+60*60*24*30*2, '/'))
	{
		// send report that cookie could not be sent.
	}
}