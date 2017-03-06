<?php

class PagesController
{
	public function home()
	{
		require_once 'views/pages/home.php';
		//require_once 'lib/functions.php';
	}

	public function error()
	{
		require_once 'views/pages/error.php';
	}
}