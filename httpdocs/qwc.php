<?php

// Require config file, main function library.
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

require_once dirname(__FILE__) . '/../resources/lib/functions.php';
require_once dirname(__FILE__) . '/../resources/lib/admin/qb/qb_config.php';

// Require some callback functions
require_once dirname(__FILE__) . '/../resources/lib/admin/qb/qb_functions.php';

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
//          '_quickbooks_item_query_request',
//          '_quickbooks_item_query_response'
//      ),
		QUICKBOOKS_QUERY_VENDOR			=> array(
            '_quickbooks_list_query_request',
            '_quickbooks_vendor_query_response'
        ),
		QUICKBOOKS_QUERY_ITEM			=> array(
            '_quickbooks_list_query_request',
            '_quickbooks_subitem_query_response'
        ),
		QUICKBOOKS_ADD_INVENTORYITEM	=> array(
            '',
            ''
        )
);

// This is optional: use it to trigger actions when an error is returned by QuickBooks
$errmap = array(
		'*' => '_quickbooks_error_catchall', 				// Using a key value of '*' will catch any errors which were not caught by another error handler
);

// An array of callback hooks
$hooks = array(
);

// Logging level
$log_level = QUICKBOOKS_LOG_DEVELOP;		// Use this level until you're sure everything works!

// What SOAP server you're using
$soapserver = QUICKBOOKS_SOAPSERVER_BUILTIN;		// A pure-PHP SOAP server (no PHP ext/soap extension required, also makes debugging easier)

$soap_options = array(		// See http://www.php.net/soap
);

$handler_options = array(
		'deny_concurrent_logins' => false,
		'deny_reallyfast_logins' => false,
);		// See the comments in the QuickBooks/Server/Handlers.php file

$driver_options = array(		// See the comments in the QuickBooks/Driver/<YOUR DRIVER HERE>.php file ( i.e. 'Mysql.php', etc. )
);

$callback_options = array(
);

// Create a new server and tell it to handle the requests
// __construct($dsn_or_conn, $map, $errmap = array(), $hooks = array(), $log_level = QUICKBOOKS_LOG_NORMAL, $soap = QUICKBOOKS_SOAPSERVER_PHP, $wsdl = QUICKBOOKS_WSDL, $soap_options = array(), $handler_options = array(), $driver_options = array(), $callback_options = array()
$Server = new QuickBooks_WebConnector_Server($dsn, $map, $errmap, $hooks, $log_level, $soapserver, QUICKBOOKS_WSDL, $soap_options, $handler_options, $driver_options, $callback_options);
$response = $Server->handle(true, true);