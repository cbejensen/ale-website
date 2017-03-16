<?php

/**
 * Example Web Connector application
 * 
 * This is a very simple application that allows someone to enter a customer 
 * name into a web form, and then adds the customer to QuickBooks.
 * 
 * @author Keith Palmer <keith@consolibyte.com>
 * 
 * @package QuickBooks
 * @subpackage Documentation
 */

/**
 * Generate a qbXML response to add a particular customer to QuickBooks
 */
function _quickbooks_customer_add_request($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale)
{
	
	//ini_set("log_errors", 1);
//	ini_set("error_log", "C:/php-error.log");
	//error_log('Running _quickbooks_customer_add_request().......');
	//error_log('This is the ID: ' . (int) $ID);
	
	
	//$q = "SELECT * FROM my_customer_table WHERE id = " . (int) $ID;
	$conn = db_connect();
	$q = "SELECT * FROM my_customer_table WHERE id=" . (int) $ID;
	$r = db_query($q, $conn);
	
	//error_log('This is $q: ' . $q);
	//error_log(print_r($r));
	
	$r->data_seek(0);
	$arr = $r->fetch_array(MYSQLI_ASSOC);
	
	
	//error_log('This is var $arr: ' . print_r($arr));
	
	
	//$debug = mysql_query("SELECT * FROM my_customer_table WHERE id = " . (int) $ID);
	//print_r($debug);
	
	// Grab the data from our MySQL database
	//$arr = mysql_fetch_assoc($debug);
	
	$xml = '<?xml version="1.0" encoding="utf-8"?>
		<?qbxml version="2.0"?>
		<QBXML>
			<QBXMLMsgsRq onError="stopOnError">
				<CustomerAddRq requestID="' . $requestID . '">
					<CustomerAdd>
						<Name>' . $arr['name'] . '</Name>
						<CompanyName>' . $arr['name'] . '</CompanyName>
						<FirstName>' . $arr['fname'] . '</FirstName>
						<LastName>' . $arr['lname'] . '</LastName>
					</CustomerAdd>
				</CustomerAddRq>
			</QBXMLMsgsRq>
		</QBXML>';
	
	return $xml;
  /*
	<Name>TestCo</Name>
	<CompanyName>TestCo</CompanyName>
	<FirstName>Thom</FirstName>
	<LastName>Sthom</LastName>*/
}

/**
 * Receive a response from QuickBooks 
 */
function _quickbooks_customer_add_response($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents)
{	
	mysql_query("
		UPDATE 
			my_customer_table 
		SET 
			quickbooks_listid = '" . mysql_real_escape_string($idents['ListID']) . "', 
			quickbooks_editsequence = '" . mysql_real_escape_string($idents['EditSequence']) . "'
		WHERE 
			id = " . (int) $ID);
}

/**
 * Catch and handle an error from QuickBooks
 */
function _quickbooks_error_catchall($requestID, $user, $action, $ID, $extra, &$err, $xml, $errnum, $errmsg)
{
	mysql_query("
		UPDATE 
			my_customer_table 
		SET 
			quickbooks_errnum = '" . mysql_real_escape_string($errnum) . "', 
			quickbooks_errmsg = '" . mysql_real_escape_string($errmsg) . "'
		WHERE 
			id = " . (int) $ID);
}
