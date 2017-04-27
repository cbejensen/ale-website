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
			echo 'successfully added model';
		}
	}
	
	public static function addGeneralListing($data, $conn)
	{
		$q		=	"INSERT INTO general_listings (mnfrID, modelID, brandID, title_extn,
					price, item_condition, testing, condition_note, warranty, components, description)
					VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		
		try
		{
			$stmt	=	$conn->prepare($q);
			if ($stmt === false)
			{
				throw new Exception('prepare() failed: ' . htmlspecialchars($conn->error));
			}
			
			// Bind Parameters
			$rc		=	$stmt->bind_param("iiisdssssss", $data['mnfrID'], $data['modelID'], $data['brandID'],
														$data['title_extn'], $data['price'], $data['item_condition'],
														$data['testing'], $data['condition_note'], $data['warranty'],
														$data['components'], $data['description']);
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
					'title'		=>	'Add General Listing Failed.',
					'message'	=>	'Please retry your request. If the problem persists, please report this error.',
					'error'		=>	$e->getMessage()
			);
			handleError($errorData, $conn, 'ajax');
			echo $e->getMessage();
			echo error_get_last();
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
			echo 'successfully added general listing';
		}
	}
	
	public static function getManufacturers($userData)
	{
		$conn	=	db_connect(AL_DB, $userData);
		$q		=	"SELECT id, mnfr FROM manufacturers ORDER BY mnfr";
		$r		=	db_query($q, $conn);
		$data	=	array();
		for ($j = 0; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$data[]	=	$r->fetch_array(MYSQLI_ASSOC);
		}
		return $data;
	}
	
	public static function getSubitems($userData)
	{
		$conn	=	db_connect(AL_DB, $userData);
		$q		=	"SELECT id, subitem_of FROM subitem_of ORDER BY subitem_of";
		$r		=	db_query($q, $conn);
		$data	=	array();
		for ($j = 0; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$data[]	=	$r->fetch_array(MYSQLI_ASSOC);
		}
		return $data;
	}
	
	public static function getModels($userData)
	{
		$conn	=	db_connect(AL_DB, $userData);
		$q		=	"SELECT id, model, function_desc FROM models ORDER BY model";
		$r		=	db_query($q, $conn);
		$data	=	array();
		for ($j = 0; $j < $r->num_rows ; $j++)
		{
			$r->data_seek($j);
			$data[]	=	$r->fetch_array(MYSQLI_ASSOC);
		}
		return $data;
	}
}