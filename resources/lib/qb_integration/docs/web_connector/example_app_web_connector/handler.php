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
 * Require some configuration stuff
 */ 

require_once dirname(__FILE__) . '/../../../../functions.php';
require_once dirname(__FILE__) . '/config.php';

// Handle the form post
if (isset($_POST['submitted']))
{
	// Save the record
	$conn		= db_connect();
	$q			= "INSERT INTO
					my_customer_table
						(
							name, 
							fname, 
							lname
						) VALUES (
							'" . mysql_entities_fix_string($conn, $_POST['name']) . "', 
							'" . mysql_entities_fix_string($conn, $_POST['fname']) . "', 
							'" . mysql_entities_fix_string($conn, $_POST['lname']) . "'
						)";
	$r			= db_query($q, $conn);
	
	
	
	/*mysql_query("
		INSERT INTO
			my_customer_table
		(
			name, 
			fname, 
			lname
		) VALUES (
			'" . mysql_real_escape_string($_POST['name']) . "', 
			'" . mysql_real_escape_string($_POST['fname']) . "', 
			'" . mysql_real_escape_string($_POST['lname']) . "'
		)");*/
		
	// Get the primary key of the new record
	$id = $conn->insert_id;//mysql_insert_id();
	
	// Queue up the customer add 
	$Queue = new QuickBooks_WebConnector_Queue($dsn);
	$Queue->enqueue(QUICKBOOKS_ADD_CUSTOMER, $id);
	
	die('Great, queued up a customer!');
}
