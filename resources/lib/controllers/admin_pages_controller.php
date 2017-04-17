<?php

class Admin_PagesController
{
	public function dashboard()
	{
		require_once 'views/pages/admin/dashboard.php';
	}
	
	public function manage_ads()
	{
		require_once 'views/pages/admin/manage_ads.php';
	}
}
