<?php
/*
 * The Public controller serves all public webpages.
 */

class PublicController
{
	private $userData;
	private $model;
	//private $conn;
	
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
		require_once PUBLIC_PATH . '/public_model.php';
		// Create an instance of the model.
		$this->model	=	new PublicModel;
		
		// Create a connection to the database
		//$this->conn		=	db_connect(AL_DB, $this->userData);
	}
	
	public function home()
	{
		require_once PAGE_PATH . '/home.php';
	}

	public function error()
	{
		$error	=	array(
				'title'		=>	'500: Internal Server Error',
				'message'	=>	'You\'re likely seeing this error because of a problem with the server. We track these errors automatically, but if the problem persists please contact the administrator.'
		);
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
	
	public function services()
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
	
	public function store()
	{
		if (isset($_GET['page']))
		{
			$page		=	htmlentities($_GET['page'], ENT_QUOTES);
			$storePage	=	PAGE_PATH . "/store/$page.php";
		} elseif (isset($_GET['category']) || isset($_GET['q'])) {
			$storePage	=	PAGE_PATH . '/store/search.php';
		} else {
			$storePage	=	PAGE_PATH . '/store/index.php';
		}
		require_once PAGE_PATH . '/store/store.php';
	}
	
	public function listing() 
	{
		if (!isset($_GET['id']))
		{
			require_once PAGE_PATH . '/store/index.php';
			return;
		} 
		if (!isset($_GET['ltype'])) {
			// listing error page?
			$storePage	=	PAGE_PATH . '/listing_error.php';
			require_once PAGE_PATH . '/store/store.php';
			return;
		} 
		if ($_GET['ltype'] == 'general' || $_GET['ltype'] == 'item') 
		{
			$type = $_GET['ltype']; 
		} else {
			//error
			return;
		}
		if ($this->model->setListing($_GET['id'], $type, $this->userData))
		{
			$storePage	=	PAGE_PATH . "/listing.php";
			require_once PAGE_PATH . '/store/store.php';
		} else {
			// If false, the db returned 0 results for the supplied id.
			$storePage	=	PAGE_PATH . '/listing_not_found.php';
			require_once PAGE_PATH . '/store/store.php';
		}
	}
	
	public function submitForm()
	{
		if (!isset($_POST['formType']))
		{
			// Error
			return;
		}
		$formType	=	htmlentities($_POST['formType']);
		switch ($formType)
		{
			case 'question':
				$this->model->submitQuestion($this->userData);
				break;
			case 'estimate':
				$this->model->submitEstimateForm($this->userData);
				break;
			case 'newsletter':
				$this->model->submitNewsletterForm($this->userData);
				break;
			default:
				// error
				break;
		}
	}
}