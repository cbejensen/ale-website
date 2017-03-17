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
		$this->userData	=	array(	'db'	=>	array(
									'user'	=>	'guest',
									'pass'	=>	'default_ale_guest'
								),
								'user'	=>	array(
									'name'		=>	'Guest'
								)
							);
		
		// Require the model, create new instance.
		require_once PUBLIC_PATH . '/public_model.php';
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
		if (!isset($_GET['page']))
		{
			require_once PAGE_PATH . '/products/index.php';
		} else {
			$page	=	htmlentities($_GET['page'], ENT_QUOTES);
			require_once PAGE_PATH . "/products/$page.php";
		}
	}
}