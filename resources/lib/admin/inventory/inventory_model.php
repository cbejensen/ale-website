<?php 

class InventoryModel
{
	//private function __construct() {}
	
	//private function __clone() {}
	
	public static function addManufacturer($mnfr_name, $subitem_of, &$conn)
	{	
		// Mnfr will always be a string. Sanitize, capitalize
		$mnfr	=	strtoupper(mysql_entities_fix_string($conn, $mnfr_name));
		
		// Check subitem for validity, sanitize
		if (is_numeric($subitem_of))
		{
			$subitem	=	mysql_entities_fix_string($conn, $subitem_of);
		} else {
			$result			=	0;
			$title			=	'Invalid \'Subitem Of\' Entry';
			$message		=	'Please submit a valid \'Subitem Of\' entry.';
			ajaxResponse_alert($result, $title, $message);
			exit;
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
			$errorData	=	array(
								'title'		=>	'Add Manufacturer Failed.',
								'message'	=>	'Please retry your request, ensuring the Manufacturer is unique. If the problem persists, please report this error.',
								'error'		=>	$e->getMessage()
							);
			handleError($errorData, $conn, 'ajax');
			exit;
		}
		if (isset($_POST['reqIsAjax']))
		{
			// Send a confirmation to the AJAX script
			$result			=	1;
			$title			=	'Success!';
			$message		=	"Manufacturer: $mnfr successfully added to the database.";
			ajaxResponse_alert($result, $title, $message);
		}
		else
		{
			// Do this if not part of an AJAX request.
		}
	}
}