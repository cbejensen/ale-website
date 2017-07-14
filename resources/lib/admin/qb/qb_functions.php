<?php

// Add customer to QB - REQUEST
function _quickbooks_customer_add_request($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale)
{

	ini_set("log_errors", 1);
	ini_set("error_log", "C:/xampp/htdocs/eclipse/atlanticlabs/logs/php-error.log");
	error_log('Running _quickbooks_customer_add_request().......');
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

// Add customer to QB - RESPONSE
function _quickbooks_customer_add_response($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents)
{
	$conn	=	db_connect();
	$q		=	"UPDATE
					my_customer_table
				SET
					quickbooks_listid = '" . mysql_real_escape_string($idents['ListID']) . "',
					quickbooks_editsequence = '" . mysql_real_escape_string($idents['EditSequence']) . "'
				WHERE
					id = " . (int) $ID;
	$r		=	db_query($q, $conn);
}

// Customer Query - REQUEST
function _quickbooks_customer_query_request($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale)
{
	ini_set("log_errors", 1);
	ini_set("error_log", "C:/xampp/htdocs/eclipse/atlanticlabs/logs/php-error.log");
	error_log('Running _quickbooks_customer_query_request().......');
	//error_log('This is the ID: ' . (int) $ID);


	//$q = "SELECT * FROM my_customer_table WHERE id = " . (int) $ID;
	$conn = db_connect();
	$q = "SELECT * FROM my_customer_queries WHERE id=" . (int) $ID;
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
			<?qbxml version="13.0"?>
			<QBXML>
				<QBXMLMsgsRq onError="stopOnError">
					<CustomerQueryRq requestID="' . $requestID . '">
						<NameFilter>
							<MatchCriterion >Contains</MatchCriterion>
							<Name>' . $arr['searchKey'] . '</Name>
						</NameFilter>
					</CustomerQueryRq>
				</QBXMLMsgsRq>
			</QBXML>';

	return $xml;
}

// Customer Query - RESPONSE
function _quickbooks_customer_query_response($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents)
{
	$conn	=	db_connect();
	$q		=	"UPDATE
					my_customer_queries
				SET
					quickbooks_listid = '" . mysql_real_escape_string($idents['ListID']) . "',
					quickbooks_editsequence = '" . mysql_real_escape_string($idents['EditSequence']) . "'
				WHERE
					id = " . (int) $ID;
	$r		=	db_query($q, $conn);

	ini_set("log_errors", 1);
	ini_set("error_log", "C:/xampp/htdocs/eclipse/atlanticlabs/logs/php-error.log");
	error_log('The following is QB\'s XML Customer Query Response.......');
	error_log($xml);
}

// Item Query - REQUEST unused?
function _quickbooks_item_query_request($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale)
{
	ini_set("log_errors", 1);
	ini_set("error_log", "C:/xampp/htdocs/eclipse/atlanticlabs/logs/php-error.log");
	error_log('Running _quickbooks_item_query_request().......');
	//error_log('This is the ID: ' . (int) $ID);


	//$q = "SELECT * FROM my_customer_table WHERE id = " . (int) $ID;
	$conn = db_connect();
	$q = "SELECT * FROM qb_item_queries WHERE id=" . (int) $ID;
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
			<?qbxml version="13.0"?>
			<QBXML>
				<QBXMLMsgsRq onError="stopOnError">
					<ItemInventoryQueryRq requestID="' . $requestID . '">
						<NameFilter>
							<MatchCriterion >Contains</MatchCriterion>
							<Name>' . $arr['searchKey'] . '</Name>
						</NameFilter>
					</ItemInventoryQueryRq>
				</QBXMLMsgsRq>
			</QBXML>';

	return $xml;
}

// Item Query - RESPONSE unused?
function _quickbooks_item_query_response($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents)
{
	$conn	=	db_connect();
	$q		=	"UPDATE
					qb_item_queries
				SET
					quickbooks_listid = '" . mysql_real_escape_string($idents['ListID']) . "',
					quickbooks_editsequence = '" . mysql_real_escape_string($idents['EditSequence']) . "'
				WHERE
					id = " . (int) $ID;
	$r		=	db_query($q, $conn);

	ini_set("log_errors", 1);
	ini_set("error_log", "C:/xampp/htdocs/eclipse/atlanticlabs/logs/php-error.log");
	error_log('The following is QB\'s XML Item Query Response.......');
	error_log($xml);
}

// List Query, General Purpose - REQUEST
function _quickbooks_list_query_request($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale)
{
	$conn 	= db_connect();
	$xml	= getXMLforListQuery($requestID, $user, $action, $ID, $extra, $err, $last_action_time, $last_actionident_time, $version, $locale, $conn);
	return $xml;
}

// NOVARTIS List Query, General Purpose - REQUEST
function _nov_quickbooks_list_query_request($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale)
{
	$conn	= db_nov_connect();
	$xml	= getXMLforListQuery($requestID, $user, $action, $ID, $extra, $err, $last_action_time, $last_actionident_time, $version, $locale, $conn);
	return $xml;
}

// MAIN LIST QUERY METHOD - qbXML GENERATOR  -- REQUEST
function getXMLforListQuery($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale, $conn)
{
	ini_set("log_errors", 1);
	ini_set("error_log", "C:/xampp/htdocs/eclipse/atlanticlabs/logs/php-error.log");
	error_log('Running _quickbooks_list_query_request().......');
	//error_log('This is the ID: ' . (int) $ID);


	//$q = "SELECT * FROM my_customer_table WHERE id = " . (int) $ID;
	$q = "SELECT * FROM qb_list_queries WHERE id=" . (int) $ID;
	$r = db_query($q, $conn);
	$r->data_seek(0);
	$arr = $r->fetch_array(MYSQLI_ASSOC);

	switch ($arr['searchTypeKey'])
	{
		case 'vendors':
			$xml = '<?xml version="1.0" encoding="utf-8"?>
					<?qbxml version="13.0"?>
					<QBXML>
						<QBXMLMsgsRq onError="stopOnError">
							<VendorQueryRq requestID="' . $requestID . '">
								<MaxReturned>999999</MaxReturned>
							</VendorQueryRq>
						</QBXMLMsgsRq>
					</QBXML>';
			break;
		case 'subitems':
			$xml = '<?xml version="1.0" encoding="utf-8"?>
					<?qbxml version="13.0"?>
					<QBXML>
						<QBXMLMsgsRq onError="stopOnError">
							<ItemInventoryQueryRq requestID="' . $requestID . '">
								<MaxReturned>999999</MaxReturned>
							</ItemInventoryQueryRq>
						</QBXMLMsgsRq>
					</QBXML>';
			break;
	}
	return $xml;
}

// Vendor List Query - RESPONSE
function _quickbooks_vendor_query_response($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents)
{
	ini_set("log_errors", 1);
	ini_set("error_log", "C:/xampp/htdocs/eclipse/atlanticlabs/logs/php-vendor-error.log");
	error_log('Vendor Response Received');
	//error_log($xml);

	$conn	=	db_connect();
	$q		=	"UPDATE
					qb_list_queries
				SET
					quickbooks_listid = '" . mysql_real_escape_string($idents['ListID']) . "',
					quickbooks_editsequence = '" . mysql_real_escape_string($idents['EditSequence']) . "'
				WHERE
					id = " . (int) $ID;
	$r		=	db_query($q, $conn);

	$xmlData 	= simplexml_load_string($xml);
	$xmlData 	= $xmlData->QBXMLMsgsRs->VendorQueryRs;
	$i			= 0;

	foreach ($xmlData->VendorRet as $var) $i++;

	$vendors	= array();
	for ($j = 0 ; $j < $i ; $j++)
	{
		$vendors[]	= $xmlData->VendorRet[$j]->Name;
	}

	$conn	=	db_connect();
	$q		= "SELECT vendorID, vendor FROM vendors;";
	$r		= db_query($q, $conn);
	$count	= $r->num_rows;
	$rows	= array();

	for ($j = 0 ; $j < $count ; $j++)
	{
		$r->data_seek($j);
		$row	= $r->fetch_array(MYSQLI_NUM);
		$rows[]	= $row[1];
	}

	foreach ($vendors as $vendor)
	{
		$vendor	=	(string) $vendor;
		if (!in_array($vendor, $rows))
		{
			$q		= "INSERT INTO vendors (vendor, active) VALUES ('$vendor', 2);";
			$r		= $conn->query($q);
			if(!$r) error_log('INSERT FAIL: Vendor insert.');
			else 	error_log("Inserted vendor: $vendor");
		}
	}
	if (!$conn->insert_id) error_log("No new Vendor records to enter.");
	error_log("\n\n");
}

// ALE Subitem List Query - RESPONSE
function _quickbooks_subitem_query_response($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents)
{
	ini_set("log_errors", 1);
	ini_set("error_log", "C:/xampp/htdocs/eclipse/atlanticlabs/logs/php-subitem-error.log");
	error_log('Subitem Response received');
	//error_log($xml);

	$conn	=	db_connect();
	$q		=	"UPDATE
					qb_list_queries
				SET
					quickbooks_listid = '" . mysql_real_escape_string($idents['ListID']) . "',
					quickbooks_editsequence = '" . mysql_real_escape_string($idents['EditSequence']) . "'
				WHERE
					id = " . (int) $ID;
	$r		=	db_query($q, $conn);

	$xmlData 	= simplexml_load_string($xml);
	$xmlData 	= $xmlData->QBXMLMsgsRs->ItemInventoryQueryRs;
	$i			= 0;

	foreach ($xmlData->ItemInventoryRet as $var) $i++;

	$subitems	= array();
	for ($j = 0 ; $j < $i ; $j++)
	{
		$subitems[]	= array('name'		=>	$xmlData->ItemInventoryRet[$j]->Name,
				'desc'		=>	$xmlData->ItemInventoryRet[$j]->SalesDesc,
				'quantity'	=>	$xmlData->ItemInventoryRet[$j]->QuantityOnHand
		);
	}

	// Populate array of current subitems table
	$conn	=	db_connect();
	$q		= "SELECT subitemID, subitem FROM subitems;";
	$r		= db_query($q, $conn);
	$count	= $r->num_rows;
	$rows	= array();
	for ($j = 0 ; $j < $count ; $j++)
	{
		$r->data_seek($j);
		$row	= $r->fetch_array(MYSQLI_NUM);
		$rows[]	= $row[1];
	}

	// Get a list of all entries in allitems
	$q			=	"SELECT aleAsset, quantity FROM allitems WHERE aleAsset NOT LIKE 'N%';";
	$r			=	db_query($q, $conn);
	$count		= 	$r->num_rows;
	$itemList	= 	array();
	for ($j = 0 ; $j < $count ; $j++)
	{
		$r->data_seek($j);
		$row			= 	$r->fetch_array(MYSQLI_NUM);
		$itemList[]		= 	array(	'aleAsset'	=>	$row[0],
				'quantity'	=>	$row[1],
				'updated'	=>	0
		);
		//$itemList[$j]['updated'] = 0;
	}
	//foreach ($itemList as $item) $item['updated'] = 0;

	// Discern item type, then compare each entry against subitems table or adjust quantity
	foreach ($subitems as $sub)
	{
		$subitem	=	(string) $sub['name'];
		$desc		=	(string) $sub['desc'];
		$asset		=	end(explode(' ', $desc));
		$quantity	=	(string) $sub['quantity'];
		$firstLtr	=	substr($asset, 0, 1);

		if ($desc == 'Master Category')
		{
			// If item is a Master Category, check that it's already entered.
			if (!in_array($subitem, $rows))
			{
				$q		= "INSERT INTO subitems (subitem, active) VALUES ('$subitem', 2);";
				$r		= db_query($q, $conn);
			}
		} else {
			// If subitem of a Master Category (i.e. an actual instrument), try to update quantity
			if ($firstLtr == 'N') continue;
			try {
				updateItemQuantity($asset, $quantity, $itemList, $conn); 	// Definition for this function at end of file.
			} catch (Exception $e) {
				error_log('UPDATE NOTICE: ' . $e->getMessage());
			}
		}
	}

	// Check for items that were not updated.
	foreach ($itemList as $item)
	{
		if ($item['updated'] == 0)
		{
			error_log("WARNING! No QB entry found for {$item['aleAsset']}, quantity not updated.");
			$q		=	"UPDATE allitems SET in_qb=0 WHERE aleAsset='{$item['aleAsset']}';";
			$r		=	db_query($q, $conn);
		} else {
			$q		=	"UPDATE allitems SET in_qb=1 WHERE aleAsset='{$item['aleAsset']}';";
			$r		=	db_query($q, $conn);
		}
	}
	error_log("\n\n");
	error_log("\n\n");
}

function _nov_quickbooks_subitem_query_response($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents)
{
	ini_set("log_errors", 1);
	ini_set("error_log", "C:/xampp/htdocs/eclipse/atlanticlabs/logs/php-subitem-error-NOVARTIS.log");
	error_log('Subitem Response received');
	//error_log($xml);

	$conn	=	db_nov_connect();
	$q		=	"UPDATE
					qb_list_queries
				SET
					quickbooks_listid = '" . mysql_real_escape_string($idents['ListID']) . "',
					quickbooks_editsequence = '" . mysql_real_escape_string($idents['EditSequence']) . "'
				WHERE
					id = " . (int) $ID;
	$r		=	db_query($q, $conn);

	$xmlData 	= simplexml_load_string($xml);
	$xmlData 	= $xmlData->QBXMLMsgsRs->ItemInventoryQueryRs;
	$i			= 0;

	foreach ($xmlData->ItemInventoryRet as $var) $i++;

	$subitems	= array();
	for ($j = 0 ; $j < $i ; $j++)
	{
		$subitems[]	= array('name'		=>	$xmlData->ItemInventoryRet[$j]->Name,
				'desc'		=>	$xmlData->ItemInventoryRet[$j]->SalesDesc,
				'quantity'	=>	$xmlData->ItemInventoryRet[$j]->QuantityOnHand
		);
	}

	$ale_conn 	=	db_connect();

	// Get a list of all entries in allitems
	$q			=	"SELECT aleAsset, quantity FROM allitems WHERE aleAsset LIKE 'N%';";
	$r			=	db_query($q, $ale_conn);
	$count		= 	$r->num_rows;
	$itemList	= 	array();
	for ($j = 0 ; $j < $count ; $j++)
	{
		$r->data_seek($j);
		$row			= 	$r->fetch_array(MYSQLI_NUM);
		$itemList[]		= 	array(	'aleAsset'	=>	$row[0],
				'quantity'	=>	$row[1],
				'updated'	=>	0
		);
		//$itemList[$j]['updated'] = 0;
	}
	//foreach ($itemList as $item) $item['updated'] = 0;

	// Discern item type, then compare each entry against subitems table or adjust quantity
	foreach ($subitems as $sub)
	{
		$subitem	=	(string) $sub['name'];
		$desc		=	(string) $sub['desc'];
		$asset		=	end(explode(' ', $desc));
		$quantity	=	(string) $sub['quantity'];
		$firstLtr	=	substr($asset, 0, 1);

		if 		($desc == 'Master Category')	continue;
		elseif 	($firstLtr != 'N') 				continue;
		else {
			// If subitem of a Master Category (i.e. an actual instrument), try to update quantity
			try {
				updateItemQuantity($asset, $quantity, $itemList, $conn); 	// Definition for this function at end of file.
			} catch (Exception $e) {
				error_log('UPDATE NOTICE: ' . $e->getMessage());
			}
		}
	}

	// Check for items that were not updated.
	foreach ($itemList as $item)
	{
		if ($item['updated'] == 0)
		{
			error_log("WARNING! No QB entry found for {$item['aleAsset']}, quantity not updated.");
			$q		=	"UPDATE allitems SET in_qb=0 WHERE aleAsset='{$item['aleAsset']}';";
			$r		=	db_query($q, $ale_conn);
		} else {
			$q		=	"UPDATE allitems SET in_qb=1 WHERE aleAsset='{$item['aleAsset']}';";
			$r		=	db_query($q, $ale_conn);
		}
	}
	error_log("\n\n");
}

// Handle All Errors regarding Web Connector
function _quickbooks_error_catchall($requestID, $user, $action, $ID, $extra, &$err, $xml, $errnum, $errmsg)
{
	$errConn	=	db_connect();
	$q			=	"UPDATE
						my_customer_table
					SET
						quickbooks_errnum = '" . mysql_real_escape_string($errnum) . "',
						quickbooks_errmsg = '" . mysql_real_escape_string($errmsg) . "'
					WHERE
						id = " . (int) $ID;
	$r			= db_query($q, $errConn);
}

// Try to update item quantities in DB
function updateItemQuantity($asset, $quantity, &$itemList, $conn = 0)
{
	// Make note of update in itemList array
	foreach ($itemList as &$item)
	{
		if ($item['aleAsset'] == $asset) $item['updated'] = 1;
	}

	$ale_conn		=	db_connect();
	$q				=	"UPDATE allitems SET quantity=$quantity WHERE aleAsset='$asset';";
	$r				= 	$ale_conn->query($q);

	// If the query fails:
	if (!$r) throw new Exception("ERROR! - Query Failed - Quantity Update for $asset");

	// If the query succeeds, but there are no affected rows
	elseif ($ale_conn->affected_rows == 0)
	{
		// Compare actual db records...
		$q			=	"SELECT aleAsset, quantity FROM allitems WHERE aleAsset='$asset';";
		$r			=	db_query($q, $ale_conn);
		$r->data_seek(0);
		$row		= 	$r->fetch_array(MYSQLI_NUM);
		$aleAsset	= 	$row[0];
		$quant		= 	$row[1];

		// If the item isn't even in the db
		if (empty($aleAsset)) throw new Exception("Item does not exist: $asset.");
		else
		{
			// If the item is in the db, try to match quantities
			if ($quant != $quantity) 	throw new Exception("ERROR! - Item exists; Quantity Update failed for $aleAsset ($asset), quantity: $quantity");
			else 						throw new Exception("No quantity update neccessary for this item: $asset");
		}
	}

	// If the query succeeds, and at least one row is affected.
	else error_log("SUCCESSFUL QUANTITY UPDATE: $asset, quantity: $quantity");
}