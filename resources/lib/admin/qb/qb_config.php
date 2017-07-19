<?php

// We need to make sure the correct timezone is set, or some PHP installations will complain
if (function_exists('date_default_timezone_set'))
{
	// MAKE SURE YOU SET THIS TO THE CORRECT TIMEZONE!
	// List of valid timezones is here: http://us3.php.net/manual/en/timezones.php
	date_default_timezone_set('America/New_York');
}

// Require some callback functions
require_once dirname(__FILE__) . '/qb_functions.php';

// Require the framework
require_once dirname(__FILE__) . '/../../qb_integration/QuickBooks.php';

// Your .QWC file username/password
switch ($type)
{
    case 'ale':
        $qbwc_user  =   'ale_quickbooks';
        $qbwc_pass  =   'ale_password';
        $dsn        =   'mysqli://admin:euphrates8@N@N@$@atlanticlabequipment.com/al_db';
        break;
    case 'nov':
        $qbwc_user  =   'nov_quickbooks';
        $qbwc_pass  =   'nov_password';
        $dsn        =   'mysqli://admin:euphrates8@N@N@$@atlanticlabequipment.com/nov_qb';
        break;
    default:
        exit;
}

if (!QuickBooks_Utilities::initialized($dsn))
{
	// Initialize creates the neccessary database schema for queueing up requests and logging
	QuickBooks_Utilities::initialize($dsn);

	// This creates a username and password which is used by the Web Connector to authenticate
	QuickBooks_Utilities::createUser($dsn, $qbwc_user, $qbwc_pass);

	$conn = db_connect();
	
	// Create our test table
	$r = db_query("CREATE TABLE 
					qb_list_queries (
	  				id int(10) unsigned NOT NULL AUTO_INCREMENT,
	  				searchTypeKey varchar(64) NOT NULL,
	  				quickbooks_listid varchar(255) DEFAULT NULL,
	  				quickbooks_editsequence varchar(255) DEFAULT NULL,
	  				quickbooks_errnum varchar(255) DEFAULT NULL,
	  				quickbooks_errmsg varchar(255) DEFAULT NULL,
	  				PRIMARY KEY (id)
					) ENGINE=MyISAM", $conn);
}