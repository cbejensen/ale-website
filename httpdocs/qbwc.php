<?php

// Init
if (isset($_GET['qb'])) {
	switch ($_GET['qb'])
	{
		case 'ale':
			$type	=	'ale';
			break;
		case 'nov':
			$type	=	'nov';
			break;
		default:
			exit;
	}
} else {
	exit;
}

// Require main config file, qb config file.
require_once dirname(__FILE__) . '/resources/config.php';
require_once dirname(__FILE__) . '/resources/lib/admin/qb/qb_config.php';

// Map QuickBooks actions to handler functions
$map = array(
		QUICKBOOKS_ADD_CUSTOMER 		=> array( 
        		'_quickbooks_customer_add_request',
			'_quickbooks_customer_add_response' 
	),
		QUICKBOOKS_QUERY_CUSTOMER		=> array(
        		'_quickbooks_customer_query_request',
		        '_quickbooks_customer_query_response'
        ),
//		QUICKBOOKS_QUERY_ITEM			=> array(
//          		'_quickbooks_item_query_request',
//          		'_quickbooks_item_query_response'
//      ),
		QUICKBOOKS_QUERY_VENDOR			=> array(
        		'_quickbooks_list_query_request',
        		'_quickbooks_vendor_query_response'
        ),
		QUICKBOOKS_QUERY_ITEM			=> array(
        		'_quickbooks_list_query_request',
        		'_quickbooks_subitem_query_response'
        ),
		QUICKBOOKS_ADD_INVENTORYITEM		=> array(
        		'',
        		''
        )
);

/*
 * This is optional: use it to trigger actions when an error is returned by QuickBooks.
 * Using a key value of '*' will catch any errors which were not caught by another error handler.
 */
$errmap			=	array(
	'*'	=>	'_quickbooks_error_catchall',
);


// An array of callback hooks
$hooks			=	array(
);


// Logging level
$log_level		=	QUICKBOOKS_LOG_DEVELOP;


/*
 *  What SOAP server you're using.
 *  A pure-PHP SOAP server (no PHP ext/soap ext required).
 */
$soapserver		=	QUICKBOOKS_SOAPSERVER_BUILTIN;
$soap_options		=	array(
	// See http://www.php.net/soap
);

$handler_options	=	array(
	'deny_concurrent_logins'	=>	false,
	'deny_reallyfast_logins'	=>	false,
);

$driver_options		=	array(
	// See the comments in the QuickBooks/Driver/<DRIVER>.php file (i.e. 'Mysql.php', etc.)
);

$callback_options	=	array(
);

// Create a new server and tell it to handle requests.
$Server			=	new QuickBooks_WebConnector_Server($dsn, $map, $errmap, $hooks, $log_level, $soapserver, QUICKBOOKS_WSDL, $soap_options, $handler_options, $driver_options, $callback_options);

$response		=	$Server->handle(true, true);
