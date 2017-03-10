<?php
class Db
{
	private static $instance = NULL;

	private function __construct() {}

	private function __clone() {}

	public static function getInstance($database)
	{
		if(!isset(self::$instance))
		{
			self::$instance = db_connect($database);
		}
		return self::$instance;
	}
}