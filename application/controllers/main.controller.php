<?php
require_once('../models/main.model.php');

$action = (isset($_POST['action']) ? trim($_POST['action']) : null);
switch ($action) {
	case 'login':
		# code...
		$result = array();
		$result['message'] = 'Error occured please contact the system administrator.';
		$result['error'] = true;
		$user_id = trim($_POST['user_id']);
		$password = $_POST['password'];

		if(empty($user_id))
		{
			$result['message'] = 'Please fill in User ID.';
		}
		elseif(empty($password))
		{
			$result['message'] = 'Please fill in Password';
		}
		else
		{
			$login = $main->login($user_id, $password);
			if($login)
			{
				$result['message'] = 'Access granted.';
				$result['error'] = false;
			}
			else
			{
				$result['message'] = 'Access denied.';
			}
		}

		echo json_encode($result);
		break;
	
	default:
		# code...
		break;
}
