<?php
use Cartalyst\Sentinel\Native\Facades\Sentinel;
require_once ADMIN_PATH . '/admin_controller.php';

try {
	$json	=	AdminController::decodeJSON();

	if (isset($json['logout'])) {
		if (!Sentinel::logout()) {
			throw new Exception('Server Error - Could not end user session.');
		}
	} else {
		$user	=	Sentinel::findByCredentials([
				'login'	=>	htmlentities($json['un'], ENT_QUOTES) . '@atlanticlabequipment.com'
		]);
		if (!$user) {
			throw new Exception('Invalid Username');
		}
		if (!Sentinel::validateCredentials($user, [
				'email'		=>	$user->email,
				'password'	=>	$json['pw']
		]))	{
			throw new Exception('Invalid Password');
		}
		if (!Sentinel::login($user)) {
			throw new Exception('Login Error');
		}
		echo json_encode(array('result'=>1, 'user'=>$user));
	}
} catch (Exception $e) {
	echo json_encode(array('result'=>0, 'message'=>$e->getMessage()));
}
