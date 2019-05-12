<?php
require_once('../models/admin.model.php');
$action = (isset($_POST['action']) ? $_POST['action'] : null);

//Action for Adding Employee
switch ($action) {
	case 'addEmployee':
		# code...
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
					$result['type']    = 'login_details';
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
		} elseif (empty($_POST["userID"]) && $_POST['position'] == "collector") {
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
		

		echo json_encode($result);
		break;

	case 'deleteEmp':
		# code...
		$result            = array();
		$result['message'] = 'Error occured while deleting employee. Please contact the system administrator.';
		$result['error']   = true;
		$userID            = $_POST['userID'];
		$result['remove']  = $admin->removeUser($userID);
		if($result['remove'])
		{
			$result['message'] = 'Successfully deleted employee.';
			$result['error']   = false;
		}
		echo json_encode($result);
		break;

	case 'editEmployee':
			# code...
			$result = array();
			$result['message']  = 'Error occured while updating employee. Please contact the system administrator.';
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
			$checkFields = checkEmptyFields($empData , $userData);
			
			if(!empty($checkFields)) {
				$result['message'] = $checkFields['message'];
				$result['type'] = $checkFields['type'];
			} else {
				$updateEmployee = $admin->updateEmployee($userData, $empData);
				if($updateEmployee) {
					$result['message'] = ucfirst($empData['lName']).", ".ucfirst($empData['fName'])." ".mb_substr($empData['mName'], 0, 1, 'utf-8')."."."'s information is updated successfully.";
					$result['error'] = false;
				}
				else
				{
					$result['message'] = "Failed to update employee, please contact the system administrator.";
				}
			}

			echo json_encode($result);

	break;

	case 'addLoanApplication':
		$borrwowerID  = isset($_POST['borrwowerID'])?$_POST['borrwowerID']:0;
		$userID = $_SESSION['uid'];
		$interestRate = isset($_POST['interestRate'])?floatval($_POST['interestRate']):0;
		$purpose      = isset($_POST['purpose'])?trim($_POST['purpose']):0;
		$loanType     = isset($_POST['loanType'])?trim($_POST['loanType']):0;
		$LoanAmount     = isset($_POST['LoanAmount'])?floatval($_POST['LoanAmount']):0;
		$loanStatus = 1;
		$submitted =  date('Y-m-d');
		$totalPayable = $LoanAmount+($LoanAmount*($interestRate/100));
		$loanData = array('borrwowerID'=>$borrwowerID,'userID'=>$userID,'interestRate'=>$interestRate,'purpose'=>$purpose,'loanType'=>$loanType,'LoanAmount'=>$LoanAmount,'loanStatus'=>$loanStatus,'submitted'=>$submitted,'totalPayable'=>$totalPayable);
		$addLoan = $admin->addLoanApplication($loanData);
		if(!empty($addLoan))
		{
			$result['success'] = true;
			$result['message'] = "New Loan Application has been updated. <br />Loan Application ID: <strong>".$addLoan."</strong>";
		}
		else
		{
			$result['success'] = false;
			$result['message'] = "There was an error while adding new loan application. Please try again or contact system admin.";
		}
		echo json_encode($result);
	break;
	case 'get_collection':
		$result = array();
		$result["message"] = 'Error occured, please contact system admin.';
		$result["error"]   = true;
		$app_no            = isset($_POST["app_no"]) ? $_POST["app_no"] : "";
		$result["data"][]  = $admin->getCollection($app_no);

		if($result["data"]) {
			$result["message"] = "";
			$result["error"]   = false;
		}
		echo json_encode($result);
		break;
	case "insert_collection":
		$result = array();
		$result["message"] = "Error occured, please contact system admin.";
		$result["error"] = true;
		$data = array("collector" => $_POST["collector"],
					  "borrower"  => $_POST["borrower"],
					  "app_no"	  => $_POST["app_no"],
					  "received"  => $_POST["received"],
					  "comment"   => $_POST["comment"],
					  "date"      => $_POST["date"]
					);
		if(empty($_POST["received"]) || empty($_POST["collector"]) || empty($_POST["date"])) {
			$result["message"] = "Please fill in required fields.";
		}else {
			$inserted = $admin->insertCollection($data);
			if($inserted) {
				$result["message"] = "Successfully received amount.";
				$result["error"]   = false;
			}
		}
		echo json_encode($result);
	break;
		case 'loadLoanData':
			$applicationID = isset($_POST['applicationID'])?$_POST['applicationID']:0;
			$loan = $admin->getLoanDetails($applicationID);
			if(!empty($loan))
			{
				$result['purpose']       = $loan['purpose'];
				$result['borrower_name'] = $loan['borrower_name'];
				$result['loanAmount']    = number_format($loan['loanAmount'],2);
				$result['interest_rate'] = $loan['percentage'];
				$result['totalPayable']  = number_format($loan['totalPayable'],2);
				$result['loan_status']   = $loan['loan_status'];
				$result['loan_type']     = $loan['loan_type'];
				$result['purpose']       = $loan['purpose'];
				$result['processor']     = $loan['processor'];
				$result['collected']     = number_format($loan['collected'],2);
				$collectible             = $loan['totalPayable']-$loan['collected'];
				$result['collectible']   = number_format($collectible,2);
				$result['success'] = true;
			}
			else
			{
				$result['success'] = false;
			}
			echo json_encode($result);

		break;
		case 'loadCollectionInfoByApplication':
		$applicationNo = isset($_POST['applicationNo'])?$_POST['applicationNo']:0;
		$collectionInfo = $admin->getCollectionInfo($applicationNo);
		$result['html'] = "";
		if(!empty($collectionInfo))
		{
			$ctr = 1;
			foreach ($collectionInfo as $c) {
				$result['html'] .= "<tr>";
				$result['html'] .= "<td>".$ctr++."</td>";
				$result['html'] .= "<td>".$c['collection_date']."</td>";
				$result['html'] .= "<td>".$c['collector']."</td>";
				$result['html'] .= "<td class='text-right'>".number_format($c['collection_amount'],2)."</td>";
				$result['html'] .= "<td >".$c['comment']."</td>";
				$result['html'] .= "</tr>";
			}
		}
		else
		{
			$result['html'] .= "<tr>";
				$result['html'] .= "<td colspan='5'>No Collection Data Available</td>";
				$result['html'] .= "</tr>";
		}
		$result['success'] = true;
		echo json_encode($result);
		break;
		case "view_collection":
		$id 			   = isset($_POST["id"]) ? $_POST["id"] : ""; 
		$result 		   = array();
		$result["message"] = "Error occured, please contact system admin.";
		$result["success"] = false;
		
		$result["data"] = $admin->viewCollectionPerBorrower($id);
		if($result["data"]){
			$result["message"] = "";
			$result["success"] = true;
			echo json_encode($result);
		}

		default:
		# code...
		break;
}


	function checkEmptyFields($empData = array(), $userData = array())
	{
		$result = array();
		
		if(empty($empData['lName']) || empty($empData['fName']))
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
		elseif($empData["position"] != "collector")
		{
			if(empty($userData['user_id']))
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
		}
		
		return $result;
	}
?>