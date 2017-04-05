<?php
/*
 * The Public model manipulates the state of the application as it relates 
 * to the public webpages.
 */

class PublicModel
{	
	//private static $adBarIteration = 0;
	
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
				case 'banner':
					include PUBLIC_PATH . '/view/inc/ads/featured_ad.php';
					break;
				case 'list':
					include PUBLIC_PATH . '/view/inc/ads/list_item.php';
					break;
			}
			$i++;
		}
		$ad_i++;
		$conn->close();
	}
	
	public static function get_metaDesc($pageTitle)
	{	
		$conn	=	db_connect(AL_DB);
		$q		=	"SELECT description FROM meta_desc WHERE page='$pageTitle';";
	}
	
	public static function parseContactForm($userData)
	{
		$conn	=	db_connect(AL_DB, $userData);
		
		$data	=	array();
		$params	=	array('fname', 'lname', 'email', 'msg');
		for ($j = 0 ; $j < 4 ; $j++)
		{
			if (isset($_POST[$params[$j]]))
			{
				$data[$params[$j]]	=	mysql_entities_fix_string($conn, $_POST[$params[$j]]);
			} else {
				// send back error message
				$errorData	=	array(	'title'		=>	'Message Failed to Send',
										'message'	=>	'Please ensure all required fields have been filled.',
										'error'		=>	'Missing Parameter from Contact Form'
								);
				handleError($errorData, $conn);
				exit;
			}
		}
		$formData	=	array(	'recipients'	=>	'jack@atlanticlabequipment.com', // answers@atlanticlabequipment.com, jack@atlanticlabequipment.com, kelly@atlanticlabequipment.com
								'email'			=>	$data['email'],
								'subject'		=>	"{$data['fname']} {$data['lname']} asked a question",
								'message'		=>	$data['msg'],
								'headers'		=>	'From: jack@atlanticlabequipment.com'
						);
		return $formData;
	}
	
	public static function saveLeadInfo($userData, $formData)
	{
		// This method needs to be completed
		$conn	=	db_connect(AL_DB, $userData);
		
		$q		=	"INSERT INTO leads (fname, lname, email)";
	}
	
	public static function sendMail($ale_recip, $email, $subject, $message, $headers)
	{
		// Send email to ALE recips
		if (!mail($ale_recip, $subject, $message, $headers))
		{
			// Send error to user, log
			$err		=	error_get_last();
			$errorData	=	array(	'title'		=>	'Message Failed to Send',
					'message'	=>	'Unfortunately, the server was unable to complete your request at this time. Please try again.',
					'error'		=>	$err['message']
			);
			handleError($errorData, $conn);
			exit;
		} else {
			// If successful, send confirmation email to lead
			$subject	=	'ALE | Thanks for your question!';
			$message	=	'Thank you for submitting a question. We\'ll contact you as soon as possible with a solution!';
			if (!mail($data['email'], $subject, $message, $headers))
			{
				// Send error to user, log
				$err		=	error_get_last();
				$errorData	=	array(	'title'		=>	'Message Failed to Send',
						'message'	=>	'Unfortunately, the server was unable to complete your request at this time. Please try again.',
						'error'		=>	$err['message']
				);
				handleError($errorData, $conn);
				exit;
			}
		}
	}
}