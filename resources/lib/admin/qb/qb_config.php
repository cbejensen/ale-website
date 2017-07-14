<?php

// We need to make sure the correct timezone is set, or some PHP installations will complain
if (function_exists('date_default_timezone_set'))
{
	// MAKE SURE YOU SET THIS TO THE CORRECT TIMEZONE!
	// List of valid timezones is here: http://us3.php.net/manual/en/timezones.php
	date_default_timezone_set('America/New_York');
}

//error_reporting(E_ALL | E_STRICT);

//ini_set("log_errors", 1);
//ini_set("error_log", "C:/php-error.log");
//error_log( "Config.php loaded!" );

//error_reporting(-1);
//ini_set('display_errors', 'Off');

// Require the framework
require_once dirname(__FILE__) . '/../../qb_integration/QuickBooks.php';

// Your .QWC file username/password
$qbwc_user = 'ale_quickbooks';
$qbwc_pass = 'ale_password';

// * MAKE SURE YOU CHANGE THE DATABASE CONNECTION STRING BELOW TO A VALID MYSQL USERNAME/PASSWORD/HOSTNAME *
$dsn = 'mysqli://admin:euphrates8@N@N@$@atlanticlabequipment.com/al_db'; // 192.168.1.50:8080

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