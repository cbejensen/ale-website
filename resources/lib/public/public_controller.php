<?php
/*
 * The Public controller serves all public webpages.
 */

class PublicController
{
	private $userData;
	private $model;
	
	public function __construct()
	{
		/* The userData assignment should be refactored using functions that can be reused between controllers.
		 * The script should check whether someone's logged in and then act accordingly, rather
		 * than assigning these hard-coded values.
		 */ 
		$this->userData	= setDefaultUser();
		
		/* As an example of the above comment:
		 * 
		 * 	if (!$user->currentUser) $this->userData = setDefaultUser();
		 *  else {
		 *  	if ($user->revalidateUser()) $this->userData = $user->userData;
		 *  	else //alert the user they've been logged out.
		 *  }
		 */
		
		// Create an instance of the model.
		$this->model	=	new PublicModel;
	}
	
	public function home()
	{
		require_once PAGE_PATH . '/home.php';
	}

	public function error()
	{
		require_once PAGE_PATH . '/error.php';
	}
	
	public function test()
	{
		require_once PAGE_PATH . '/test.php';
	}
	
	public function contact()
	{
		require_once PAGE_PATH . '/contact.php';
	}
	
	public function estimates()
	{
		require_once PAGE_PATH . '/estimates.php';
	}
	
	public function products_services()
	{
		if (isset($_GET['subsection']))
		{
			$subsection		=	htmlentities($_GET['subsection'], ENT_QUOTES);
		}
		elseif (isset($_POST['subsection']))
		{
			$subsection		=	htmlentities($_POST['subsection'], ENT_QUOTES);
		}
		
		if (isset($_POST['reqIsAjax']) && $_POST['reqIsAjax'] == 1)
		{
			require_once PUBLIC_PATH . "/view/inc/prem_equip/$subsection.php";
			exit;
		}
		
		if (!isset($_GET['page']))
		{
			require_once PAGE_PATH . '/products/index.php';
		} else {
			$page	=	htmlentities($_GET['page'], ENT_QUOTES);
			require_once PAGE_PATH . "/products/$page.php";
		}
	}
	
	public function listing() 
	{
		if (!isset($_GET['id']))
		{
			require_once PAGE_PATH . '/products/index.php';
		} else {
			$id	=	htmlentities($_GET['id'], ENT_QUOTES);
			require_once PAGE_PATH . "/listing.php";
		}
	}
	
	public function submitQuestion() 
	{
		$conn	=	db_connect(AL_DB, $this->userData);
		$data	=	array();
		$params	=	array('fname', 'lname', 'email', 'msg');
		for ($j = 0 ; $j < 4 ; $j++)
		{
			if (isset($_POST[$params[$j]]))
			{
				$data[$params[$j]]	=	mysql_entities_fix_string($conn, $_POST[$params[$j]]);
			} else {
				// send back error message
				exit;
			}
		}
		$subject	=	"{$data['fname']} {$data['lname']} asked a question";
		//$recip		=	'answers@atlanticlabequipment.com, jack@atlanticlabequipment.com, kelly@atlanticlabequipment.com';
		$recip		=	'jack@atlanticlabequipment.com';
		$headers	= 	'From: jack@atlanticlabequipment.com';
		if (!mail($recip, $subject, $data['msg'], $headers))
		{
			// Send error to user, log
			exit;
		} else {
			$subject	=	'ALE | Thanks for your question!';
			$message	=	'Thank you for submitting a question. We\'ll contact you as soon as possible with a solution!';
			if (!mail($data['email'], $subject, $message, $headers))
			{
				// Send error to user, log
				exit;
			}
		}
	}
}