<?php
require_once('../models/admin.model.php');
$action = (isset($_POST['action']) ? $_POST['action'] : null);

//Action for Adding Employee
if ($action == 'addEmployee') {
	$result = array();
	$result['message'] = 'Error occured. Please contact the system administrator.';
	$result['error'] = true;
	$userData = array('user_id'   =>trim($_POST['user_id']),
					  'password'  =>trim($_POST['password']),
					  'position'  =>trim($_POST['position']),
					  'cpassword' =>trim($_POST['cpassword']));
	$empData = array('fName'      =>trim($_POST['fName']),
					 'mName'      =>trim($_POST['mName']),
				     'lName'      =>trim($_POST['lName']),
				     'gender'     =>trim($_POST['gender']),
				 	 'position'   =>trim($_POST['position']),
				 	 'address'    =>trim($_POST['address']),
				 	 'email'      =>trim($_POST['email']),
				 	 'birthdate'  =>trim($_POST['birthdate']),
				 	 'mStatus'    =>trim($_POST['status']),
				 	 'home_phone' =>trim($_POST['home_phone']),
				 	 'per_phone'  =>trim($_POST['per_phone']),
				 	 'user_id'    =>trim($_POST['user_id']));
	$checkFields = checkEmptyFields($empData, $userData);
	if(!empty($checkFields))
	{
		$result['message'] = $checkFields['message'];
		$result['type'] = $checkFields['type'];
	}
	elseif(!empty($_POST['user_id']))
	{
		$userDupli = $admin->checkUserDupli($userData['user_id']);
			if($userDupli)
			{
				$result['message'] = ucfirst($userData['user_id']).' is already taken.<br>Kindly, choose something else';
				$result['type'] = 'login_details';
			}
			else
	{
		$user = $admin->addUser($userData);
		if($user)
		{
			$employee = $admin->addEmployee($empData);
			if($employee)
			{
				$result['message'] = ucfirst($empData['lName']).', '.ucfirst($empData['fName']).' '.mb_substr($empData['mName'], 0, 1, 'utf-8').'.'.' is now an offical employee of DFGV.';
				$result['error'] = false;
			}
			else
			{
				$result['message'] = 'Failed to add employee. If you think this is wrong, please do contact the System Administrator.';
				$removeUser = $admin->removeUser($userData['user_id']);
			}
		}
		else
		{
			$result['message'] = 'Failed to add employee. If you think this is wrong, please do contact the System Administrator.';
		}
	}
	}
	

	echo json_encode($result);
	}
	//Action for Deleting employee
	elseif($action == 'deleteEmp')
	{
		$result = array();
		$result['message'] = 'Error occured while deleting employee. Please contact the system administrator.';
		$result['error'] = true;
		$userID = $_POST['userID'];
		$result['remove'] = $admin->removeUser($userID);
		if($result['remove'])
		{
			$result['message'] = 'Successfully deleted employee.';
			$result['error'] = false;
		}
		echo json_encode($result);
	}

	function checkEmptyFields($empData = array(), $userData = array())
	{
		$result = array();
		
		if(empty($empData['lName']) && empty($empData['fName']))
		{
			$result['message'] = 'Names are required.';
			$result['type'] = 'personal_info';
		}
		elseif(empty($empData['address']))
		{
			$result['message'] = 'Address is required.';
			$result['type'] = 'personal_info';
		}
		elseif(empty($empData['email']))
		{
			$result['message'] = 'Email is required.';
			$result['type'] = 'personal_info';
		}
		elseif(empty($empData['per_phone']))
		{
			$result['message'] = 'Phone contact is requred.';
			$result['type'] = 'personal_info';
		}
		elseif(empty($userData['position']))
		{
			$result['message'] = 'Position is required';
			$result['type'] = 'personal_info';
		}
		elseif(empty($empData['birthdate']))
		{
			$result['message'] = 'Birthdate is required.';
			$result['type'] = 'personal_info';
		}
		elseif(empty($empData['gender']))
		{
			$result['message'] = 'Gender is required.';
			$result['type'] = 'personal_info';
		}
		elseif(empty($empData['mStatus']))
		{
			$result['message'] = 'Status is required.';
			$result['type'] = 'personal_info';
		}
		elseif(empty($userData['user_id']))
		{
			$result['message'] = 'User ID is required.';
			$result['type'] = 'login_details';
		}
		elseif(empty($userData['password']))
		{
			$result['message'] = 'Password is required.';
			$result['type'] = 'login_details';
		}
		elseif(empty($userData['cpassword']))
		{
			$result['message'] = 'Confirm Password is required.';
			$result['type'] = 'login_details';
		}
		elseif(!empty($userData['password']))
		{
			if($userData['password'] != $userData['cpassword'])
			{
				$result['message'] = 'Password does not match.';
				$result['type'] = 'login_details';
			}
		}
		return $result;
	}
?>