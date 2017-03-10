<?php 

function db_connect($database) {
	switch ($database)
	{
		case 'al.db':
			require_once 'inc/db_login.php';
			break;
		case 'novartis':
			require_once 'inc/db_login_novartis.php';
			break;
	}
	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die($conn->connect_error); // UPDATE NEEDED: Call an alert/popup informing the user the db connection has erred.
	return $conn;
}
