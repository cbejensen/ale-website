<?php

class QbController
{
	public function enqueueNewCustomer()
	{
		require_once LIB_PATH . '/functions.php';
		require_once ADMIN_PATH . '/qb/qb_config.php';
		
		// Handle the form post
		if (isset($_POST['submitted']))
		{
			// Save the record
			$conn	= 	db_connect();
			$q		= 	"INSERT INTO
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
			$r		= 	db_query($q, $conn);
			
			// Get the primary key of the new record
			$id = $conn->insert_id;//mysql_insert_id();
			
			// Queue up the customer add
			$Queue = new QuickBooks_WebConnector_Queue($dsn);
			$Queue->enqueue(QUICKBOOKS_ADD_CUSTOMER, $id);
			
			die('Great, queued up a customer!');
		}
	}
	
	public function enqueueCustomerQuery()
	{
		require_once 'lib/functions.php';
		require_once 'inc/qb_config.php';
		
		if (isset($_POST['submitted']))
		{
			// Save the record
			$conn	= 	db_connect();
			$q		= 	"INSERT INTO
						my_customer_queries
						(
							searchKey
						) VALUES (
							'" . mysql_entities_fix_string($conn, $_POST['searchKey']) . "'
						)";
			$r		= 	db_query($q, $conn);
				
			// Get the primary key of the new record
			$id = $conn->insert_id;//mysql_insert_id();
				
			// Queue up the customer add
			$Queue = new QuickBooks_WebConnector_Queue($dsn);
			$Queue->enqueue(QUICKBOOKS_QUERY_CUSTOMER, $id);
				
			die('Great, queued up a customer query!');
		}
	}
	
	public function enqueueItemQuery()
	{
		require_once 'lib/functions.php';
		if (isset($_GET['novartis'])) 	require_once 'inc/qb_config_novartis.php';
		else 							require_once 'inc/qb_config.php';
		
		if (isset($_POST['submitted']))
		{
			// Save the record
			$conn	= 	db_connect();
			$q		= 	"INSERT INTO
						qb_item_queries
						(
							searchKey
						) VALUES (
							'" . mysql_entities_fix_string($conn, $_POST['searchKey']) . "'
						)";
			$r		= 	db_query($q, $conn);
		
			// Get the primary key of the new record
			$id = $conn->insert_id;//mysql_insert_id();
		
			// Queue up the customer add
			$Queue = new QuickBooks_WebConnector_Queue($dsn);
			$Queue->enqueue(QUICKBOOKS_QUERY_ITEM, $id);
		
			die('Great, queued up an item query!');
		}
	}
	
	public function enqueueVendorQuery()
	{
		// Queue a request for all vendors.
		// Upon reception, put new entries in the vendor table
		// Include blacklist
		require_once 'lib/functions.php';
		require_once 'inc/qb_config.php';
		
		if (isset($_POST['submitted']))
		{
			// Save the record
			$conn	= 	db_connect();
			$q		= 	"INSERT INTO
						qb_list_queries
						(
							searchTypeKey
						) VALUES (
							'" . mysql_entities_fix_string($conn, 'vendors') . "'
						)";
			$r		= 	db_query($q, $conn);
			
			// Get the primary key of the new record
			$id = $conn->insert_id;//mysql_insert_id();
			
			// Queue up the customer add
			$Queue = new QuickBooks_WebConnector_Queue($dsn);
			$Queue->enqueue(QUICKBOOKS_QUERY_VENDOR, $id);
			
			die('Great, queued up a Vendor query!');
		}
	}
	
	public function enqueueSubitemQuery()
	{
		// Queue a request for all items to be used as SUBITEM OF's.
		// Upon reception, put new entries in the subitemof table, and
		// 		log the quantities of any actual instruments.
		// Include 'active' list, so I can control the SUBITEM OF entries users can 
		// 		choose from.
		require_once 'lib/functions.php';
		if (isset($_GET['novartis']))
		{
			require_once 'inc/qb_config_novartis.php';
			$conn 	= 	db_nov_connect();
		} else {
			require_once 'inc/qb_config.php';
			$conn	= 	db_connect();
		}
		
		if (isset($_POST['submitted']))
		{
			// Save the record
			$q		= 	"INSERT INTO
						qb_list_queries
						(
							searchTypeKey
						) VALUES (
							'" . mysql_entities_fix_string($conn, 'subitems') . "'
						)";
			$r		= 	db_query($q, $conn);
				
			// Get the primary key of the new record
			$id = $conn->insert_id;//mysql_insert_id();
				
			// Queue up the customer add
			$Queue = new QuickBooks_WebConnector_Queue($dsn);
			$Queue->enqueue(QUICKBOOKS_QUERY_ITEM, $id);
				
			die('Great, queued up a subitem query!');
		}
	}
	
	public static function enqueueNewItem($asset, $is_novartis = false)
	{
		// Queue a request for the addition of a new item to QB
		// Upon reception of response, change in_qb to TRUE
		require_once 'lib/functions.php';
		if ($is_novartis)
		{
			require_once 'inc/qb_config_novartis.php';
			$conn 	= 	db_nov_connect();
		} else {
			require_once 'inc/qb_config.php';
			$conn	= 	db_connect();
		}
		
		// Save the record
		$q		= 	"INSERT INTO
					qb_newitem_queries
					(
						aleAsset
					) VALUES (
						'" . mysql_entities_fix_string($conn, $asset) . "'
					)";
		$r		= 	db_query($q, $conn);
	
		// Get the primary key of the new record
		$id = $conn->insert_id;//mysql_insert_id();
	
		// Queue up the customer add
		$Queue = new QuickBooks_WebConnector_Queue($dsn);
		$Queue->enqueue(QUICKBOOKS_ADD_INVENTORYITEM, $id);
	
		die('Great, queued up a new item query!');
	}
}
