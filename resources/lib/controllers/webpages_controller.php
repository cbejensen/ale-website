<?php

class WebpagesController
{
	public function home()
	{
		require_once PAGE_PATH . '/home.php';
		//require_once 'lib/functions.php';
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
		if (isset($_GET['page']))
		{
			$page	=	htmlentities($_GET['page'], ENT_QUOTES);
			require_once PAGE_PATH . "/products/$page.php";
		} else {
			require_once PAGE_PATH . '/products/index.php';
		}
	}
}