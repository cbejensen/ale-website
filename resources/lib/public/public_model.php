<?php
/*
 * The Public model manipulates the state of the application for
 * the public webpages.
 */

class PublicModel
{	
	//private static $adBarIteration = 0;
	public $listing;
	
	public function getAds($userData, $adType, $dspType)
	{
		$conn	=	db_connect(AL_DB, $userData);
			
		require	PUBLIC_PATH . '/inc/ad_query.php';
						
		$r		=	db_query($q, $conn);
		($r->num_rows < 10) ? $count = $r->num_rows : $count = 10;
		$i = 0;
		static $ad_i = 0;
		for ($j = 0 ; $j < $count ; $j++)
		{
			$r->data_seek($j);
			$ad		=	$r->fetch_array(MYSQLI_ASSOC);
			$title	=	"{$ad['mnfr']} {$ad['brand']} {$ad['model']} {$ad['function_desc']} {$ad['title_extn']}";
			$url	=	"?controller=public&action=listing&section=products&title=$title&id={$ad['id']}";
			if (!isset($ad['url'])) continue;
			switch ($dspType)
			{
				case 'cards':
					include PUBLIC_PATH . '/view/inc/ads/featured_ad.php';
					break;
				case 'banner':
					include PUBLIC_PATH . '/view/inc/ads/list_item.php';
					break;
			}
			$i++;
		}
		$ad_i++;
		$conn->close();
	}

	public function setListing($id, $userData)
	{
		require_once PUBLIC_PATH . '/listing.php';
		$conn	=	db_connect(AL_DB, $userData);
		try {
			$this->listing	=	new GenListing($id, $conn);
			$r	=	true;
		} catch (Exception $e) {
			// Failed to set listing
			$r	=	false;
		}
		return $r;
	}
	
	public function submitNewsletterForm($userData)
	{
		if (!PublicModel::honeypotCheck('phone')) {
			return;
		}
		$formData	=	PublicModel::parseNewsletterForm($userData);
		if (!$formData)
		{
			return;
		}
		$leadID		=	PublicModel::saveLeadInfo($userData, $formData);
		if (!$leadID)
		{
			return;
		}
		$r			=	PublicModel::addNewsSubscriber($leadID, $formData, $userData);
		if (!$ticket)
		{
			return;
		}
	}
	
	public function submitQuestion($userData)
	{
		if (!PublicModel::honeypotCheck('phone')) {
			return;
		}
		$formData	=	PublicModel::parseContactForm($userData);
		if (!$formData)
		{
			return;
		}
		$leadID		=	PublicModel::saveLeadInfo($userData, $formData);
		if (!$leadID)
		{
			return;
		}
		$ticket		=	PublicModel::submitTicket($leadID, 'contact', $formData, $userData);
		if (!$ticket)
		{
			return;
		}
		// Send email to ALE
		$errorData	=	array(	'title'		=>	'Message Failed to Send',
								'message'	=>	'Unfortunately, the server was unable to complete your request at this time. Please try again.',
								'error'		=>	''
						);
		$m			=	array(	'recip'		=>	'jack@atlanticlabequipment.com', // answers@atlanticlabequipment.com, jack@atlanticlabequipment.com, kelly@atlanticlabequipment.com
								'subj'		=>	"[$ticket] {$formData['fname']} {$formData['lname']} asked a question",
								'msg'		=>	"Ticket: $ticket\n" . $formData['message'],
								'head'		=>	"From: {$formData['email']}"
						);
		if (!PublicModel::sendMail($m['recip'], $m['subj'], $m['msg'], $m['head']))
		{
			// Send error to user, log
			ajaxResponse_alert(0, $errorData['title'], $errorData['message']);
			return;
		}
		//Send confirmation email
		$m			=	array(	'recip'		=>	$formData['email'],
								'subj'		=>	"[ALE #$ticket]" . ' Thanks for your question!',
								'msg'		=>	'Thank you for submitting a question. We\'ll contact you as soon as possible with a solution!',
								'head'		=>	'From: answers@atlanticlabequipment.com'
						);
		if(!PublicModel::sendMail($m['recip'], $m['subj'], $m['msg'], $m['head']))
		{
			ajaxResponse_alert(0, $errorData['title'], $errorData['message']);
			return;
		} else {
			$result		=	1;
			$title		=	'Success!';
			$message	=	'Thank you for your interest in Atlantic Lab Equipment! You should receive a confirmation email soon.';
			ajaxResponse_alert($result, $title, $message);
		}
	}
	
	public function submitEstimateForm($userData)
	{
		if (!PublicModel::honeypotCheck('website')) {
			return;
		}
		$formData	=	PublicModel::parseEstimateForm($userData);
		if (!$formData)
		{
			return;
		}
		$leadID		=	PublicModel::saveLeadInfo($userData, $formData);
		if (!$leadID)
		{
			return;
		}
		$ticket		=	PublicModel::submitTicket($leadID, 'estimate', $formData, $userData);
		if (!$ticket)
		{
			return;
		}
		// Send email to ALE
		$errorData	=	array(	'title'		=>	'Message Failed to Send',
								'message'	=>	'Unfortunately, the server was unable to complete your request at this time. Please try again.',
								'error'		=>	''
						);
		$m			=	array(	'recip'		=>	'jack@atlanticlabequipment.com', // answers@atlanticlabequipment.com, jack@atlanticlabequipment.com, kelly@atlanticlabequipment.com
								'subj'		=>	"[$ticket] {$formData['fname']} {$formData['lname']} requested a quote",
								'msg'		=>	"Ticket: $ticket\n\nName:\t{$formData['fname']} {$formData['lname']}\nInstrument of Interest:\t{$formData['instrument']}\nInfo Requested\t{$formData['info_req']}\nEmail:\t{$formData['email']}\nPhone:\t{$formData['phone']}\n\nMessage:\n{$formData['message']}",
								'head'		=>	"From: {$formData['email']}"
						);
		if (!PublicModel::sendMail($m['recip'], $m['subj'], $m['msg'], $m['head']))
		{
			ajaxResponse_alert(0, $errorData['title'], $errorData['message']);
			return;
		}
		//Send confirmation email
		$m			=	array(	'recip'		=>	$formData['email'],
								'subj'		=>	"[ALE #$ticket]" . ' Thanks for your interest in ALE!',
								'msg'		=>	'Thank you for requesting a quote. We\'ll contact you as soon as possible with answers to your inquiry!',
								'head'		=>	'From: answers@atlanticlabequipment.com'
						);
		if(!PublicModel::sendMail($m['recip'], $m['subj'], $m['msg'], $m['head']))
		{
			ajaxResponse_alert(0, $errorData['title'], $errorData['message']);
			return;
		} else {
			$title		=	'Success!';
			$message	=	'Thank you for your interest in Atlantic Lab Equipment! You should receive a confirmation email soon.';
			ajaxResponse_alert(1, $title, $message);
		}
	}
	
	public static function honeypotCheck($field)
	{
		if ($_POST[$field] != '')
		{
			$title		=	'Success!';
			$message	=	'Thank you for your interest in Atlantic Lab Equipment! You should receive a confirmation email soon.';
			ajaxResponse_alert(1, $title, $message);
			$r	=	false;
		} else {
			$r	=	true;
		}
		return $r;
	}
	
	public static function get_metaDesc($pageTitle, $userData)
	{	
		$conn	=	db_connect(AL_DB, $userData);
		$q		=	"SELECT description FROM meta_desc WHERE page='$pageTitle';";
	}
	
	private static function parseNewsletterForm($userData)
	{
		$conn	=	db_connect(AL_DB, $userData);
		
		$data	=	array();
		// Unused fields
		$params =	array('referrer', 'instrument', 'info_req', 'phone', 'message');
		for ($j = 0 ; $j < 5 ; $j++)
		{
			$data[$params[$j]]	=	null;
		}
		$data['newsletter']	=	1;
		// Required Fields
		$params	=	array('fname', 'lname', 'email');
		for ($j = 0 ; $j < 3 ; $j++)
		{
			if ($_POST[$params[$j]] != '')
			{
				$data[$params[$j]]	=	mysql_entities_fix_string($conn, $_POST[$params[$j]]);
			} else {
				$data		=	false;
				$errorData	=	array(	'title'		=>	'Missing Data',
						'message'	=>	'Please ensure all required fields have been filled.',
						'error'		=>	'Missing Parameter from Contact Form'
				);
				handleError($errorData, $conn);
				break;
			}
		}
		return $data;
	}
	
	private static function parseContactForm($userData)
	{
		$conn	=	db_connect(AL_DB, $userData);
		
		$data	=	array();
		// Unused fields
		$params =	array('referrer', 'instrument', 'info_req', 'phone');
		for ($j = 0 ; $j < 4 ; $j++)
		{
			$data[$params[$j]]	=	null;
		}
		$data['newsletter']	=	0;
		// Required Fields
		$params	=	array('fname', 'lname', 'email', 'message');
		for ($j = 0 ; $j < 4 ; $j++)
		{
			if ($_POST[$params[$j]] != '')
			{
				$data[$params[$j]]	=	mysql_entities_fix_string($conn, $_POST[$params[$j]]);
			} else {
				$data		=	false;
				$errorData	=	array(	'title'		=>	'Missing Data',
										'message'	=>	'Please ensure all required fields have been filled.',
										'error'		=>	'Missing Parameter from Contact Form'
								);
				handleError($errorData, $conn);
				break;
			}
		}
		return $data;
	}
	
	private static function parseEstimateForm($userData)
	{
		$conn	=	db_connect(AL_DB, $userData);
	
		$data	=	array();
		// Required fields
		$params	=	array('fname', 'lname', 'email', 'instrument', 'info_req', 'newsletter');
		for ($j = 0 ; $j < 6 ; $j++)
		{
			if ($_POST[$params[$j]] != '')
			{
				$data[$params[$j]]	=	mysql_entities_fix_string($conn, $_POST[$params[$j]]);
			} else {
				$data		=	false;
				$errorData	=	array(	'title'		=>	'Missing Data',
						'message'	=>	'Please ensure all required fields have been filled.',
						'error'		=>	'Missing Parameter from Contact Form'
				);
				handleError($errorData, $conn);
				break;
			}
		}
		if ($data != false)
		{
			// Optional fields
			$params	=	array('phone', 'message', 'referrer');
			for ($j = 0 ; $j < 3 ; $j++)
			{
				if	($_POST[$params[$j]] == '')
				{
					$data[$params[$j]]	=	null;
				} else {
					$data[$params[$j]]	=	mysql_entities_fix_string($conn, $_POST[$params[$j]]);
				}
			}
		}
		return $data;
	}
	
	private static function saveLeadInfo($userData, $formData)
	{
		$conn	=	db_connect(AL_DB, $userData);
		$q		=	"SELECT id FROM leads WHERE email='{$formData['email']}'";
		$r		=	db_query($q, $conn);
		if ($r->num_rows != 0)
		{
			$r->data_seek(0);
			$row 	=	$r->fetch_array(MYSQLI_NUM);
			$id		=	$row[0];
			$update	=	PublicModel::updateLead($id, $formData, $conn);
			if (!$update)
			{
				// Error already logged.
			}
		} else {
			$q		=	"INSERT INTO leads (fname, lname, email, phone, street_addr, city, state, postal_code, country, newsletter) VALUES (?,?,?,?,?,?,?,?,?,?)";
			try
			{
				$stmt	=	$conn->prepare($q);
				if ($stmt === false)
				{
					throw new Exception('prepare() failed: ' . htmlspecialchars($conn->error));
				}
				// Bind Parameters
				$rc		=	$stmt->bind_param("sssssiisii", 	$formData['fname'], $formData['lname'], 		$formData['email'],
																$formData['phone'], $formData['street_addr'], 	$formData['city'], 
																$formData['state'], $formData['postal_code'], 	$formData['country'],
																$formData['newsletter']);
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
				// Get Assigned ID
				$id	=	$conn->insert_id;
			} catch (Exception $e) {
				$id			= 	false;
				$errorData	=	array(	'title'		=>	'An Error has Occurred',
										'message'	=>	'Our server was unable to process your request at this time. Please try again.',
										'error'		=>	"Lead data failed to save: { {$formData['fname']}, {$formData['lname']}, {$formData['email']} }" . $e->getMessage()
								);
				handleError($errorData, $conn, 'mysql', 1);
			}
		}
		return $id;
	}
	
	private static function updateLead($id, $formData, &$conn)
	{
		$paramNames		=	array('fname', 'lname', 'phone', 'street_addr', 'city', 'state', 'postal_code', 'country', 'newsletter', 'last_update');
		$params			=	array();
		$type			=	'';
		foreach ($paramNames as $name)
		{
			if (isset($formData[$name]) && !empty($formData[$name]))
			{
				$params[$name]	=	$formData[$name];
			}
		}
		if (count($params))
		{
			$q		=	"UPDATE leads SET ";
			foreach ($params as $key => $value)
			{
				$q	.=	"$key=?, ";
				switch ($key)
				{
					case 'fname':
					case 'lname':
					case 'phone':
					case 'street_addr':
					case 'postal_code':
					case 'last_update':
						$type	.=	's';
						break;
					case 'city':
					case 'state':
					case 'country':
					case 'newsletter':
						$type	.=	'i';
						break;
				}
			}
			$q		.=	'last_update=? WHERE id=?';
			$type	.=	'si';
			$params['last_update']	=	date('Y-m-d H:i:s');
			$params['id']			=	$id;
			
			try
			{
				$stmt	=	$conn->prepare($q);
				if ($stmt === false)
				{
					throw new Exception('prepare() failed: ' . htmlspecialchars($conn->error));
				}
				// Bind parameters
				$params =	array_merge(array($type), array_values($params));
				$rc		=	call_user_func_array(array(&$stmt, 'bind_param'), refValues($params));
				if ($rc === false)
				{
					$err	=	error_get_last();
					throw new Exception('bind_param() failed: ' . htmlspecialchars($err['message']) . ' | ' . htmlspecialchars($stmt->error));
				}
				// Execute
				$rc		=	$stmt->execute();
				if ($rc === false)
				{
					throw new Exception('execute() failed: ' . htmlspecialchars($stmt->error));
				}
				$r	=	true;
			} catch (Exception $e) {
				$r		= 	false;
				$errorData	=	array(	'title'		=>	'Failed to update lead data.',
										'message'	=>	'Failed to update lead data',
										'error'		=>	"Lead data failed to update: { {$formData['fname']}, {$formData['lname']}, {$formData['email']} }" . $e->getMessage()
								);
				handleError($errorData, $conn, 'mysql', 0);
			}
			return $r;
		}
	}
	
	private static function submitTicket($leadID, $type, $formData, $userData)
	{
		$conn	=	db_connect(AL_DB, $userData);
		
		$q		=	"INSERT INTO support_tickets (leadID, type, message, instrument, info_req, referrer) VALUES (?,?,?,?,?,?)";
		
		try
		{
			$stmt	=	$conn->prepare($q);
			if ($stmt === false)
			{
				throw new Exception('prepare() failed: ' . htmlspecialchars($conn->error));
			}
			// Bind Parameters
			$rc		=	$stmt->bind_param("isssss", $leadID, $type, $formData['message'], $formData['instrument'], $formData['info_req'], $formData['referrer']);
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
			// Get Assigned ID
			$id	=	$conn->insert_id;
		} catch (Exception $e) {
			$id			=	false;
			$errorData	=	array(	'title'		=>	'Message Failed to Send',
									'message'	=>	'Our server was unable to process your request at this time. Please try again.',
									'error'		=>	"Failed to create ticket for: { {$formData['fname']}, {$formData['lname']}, {$formData['email']} }" . $e->getMessage()
							);
			handleError($errorData, $conn, 'mysql', 1);
		}
		return $id;
	}
	
	private static function sendMail($recip, $subject, $msg, $header = '')
	{
		if (!mail($recip, $subject, $msg, $header))
		{
			$err		=	error_get_last();
			$errorData	=	array(	'title'		=>	'Message Failed to Send',
									'message'	=>	'Unfortunately, the server was unable to complete your request at this time. Please try again.',
									'error'		=>	$err['message']
							);
			handleError($errorData, $conn, 0, 0);
			$r	=	false;
		} else {
			$r	=	true;
		}
		return $r;
	}
}