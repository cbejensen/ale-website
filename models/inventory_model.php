<?php 

class InventoryModel
{
	//private function __construct() {}
	
	//private function __clone() {}
	
	public static function addManufacturer($mnfr_name, $subitem_of)
	{
		$conn	=	Db::getInstance(AL_DB);
		
		// Mnfr will always be a string. Sanitize, capitalize
		$mnfr	=	strtoupper(mysql_entities_fix_string($conn, $mnfr_name));
		
		// Check subitem for validity, sanitize
		if (is_numeric($subitem_of))
		{
			$subitem	=	mysql_entities_fix_string($conn, $subitem_of);
		} else {
			$error_data		=	array();
			$error_data[]	=	"Invalid 'Subitem Of' Entry";
			$error_data[]	=	'Please submit a valid \'Subitem Of\' entry.';
			echo json_encode($error_data);
		}
			
		$q		=	"INSERT INTO manufacturers (mnfr, subitem_of) VALUES (?,?)";
		
		try 
		{
			$stmt	=	$conn->prepare($q);
			if ($stmt === false)
			{
				throw new Exception('prepare() failed: ' . htmlspecialchars($conn->error));
			}
			
			// Bind Parameters
			$rc		=	$stmt->bind_param("si", $mnfr, $subitem);
			if ($rc === false)
			{
				throw new Exception('bind_param() failed: ' . htmlspecialchars($stmt->error));
			}
			
			// Execute
			$rc		=	$stmt->execute();
			if ($rc === false)
			{
				throw new Exception('execute() failed: ' . htmlspecialchars($stmt->error));
			}
		} catch (Exception $e) {
			// Send error message to error log.
			$msg	=	$e->getMessage();
			ini_set("error_log", "logs/ajax-errors.log");
			error_log("Add Manufacturer: $msg");
			
			// Send user a generic error message.
			$error_data		=	array();
			$error_data[]	=	"An Error has Occurred";
			$error_data[]	=	'Please retry your request, ensuring the Manufacturer is unique. If the problem persists, please report this error.';
			echo json_encode($error_data);
			exit;
		}
		
		// Send a confirmation
		$msg_data	=	array();
		$msg_data	=	'Success!';
		$msg_data	=	"Manufacturer: $mnfr successfully added to the database.";
		echo json_encode($msg_data);
	}
}