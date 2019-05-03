<?php
require_once('../models/main.model.php');

$result = array();
$action = (isset($_POST['action']) ? trim($_POST['action']) : null);
switch($action){
	case "login":
		$result['message'] = 'Error occured, please contact the system administrator.';
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
		break;
	case "addBorrower":
		$query1 = "INSERT INTO `borrower` (`borrowerID`, `fName`, `mName`, `lName`, `bDay`, `civilStatus`, `gender`, `presentAddr`, `homeAddr`, `ownHouse`, `renting`, `lengthOfStay`, `noOfChildren`, `occupation`, `contactNo`, `validID`, `loanCount`, `comakerID`) VALUES (:borrowerID, :FirstName, :MiddleName, :LastName, :Birthdate, :CivilStatus, :Gender, :PresentAddress, :HomeAddress, :HouseOwner, :Renting, :LengthOfStay, :NumberofChildren, :Occupation, :ContactNumber, :ValidID,:NoofLoans, :Comaker)";
		$lastId = $main->getOne("SELECT borrowerID FROM borrower ORDER BY borrowerID DESC",array());
		$_POST["borrower"]["borrowerID"] = (is_numeric($lastId)?$lastId:0) + 1;
		$_POST["borrower"]["Comaker"] = $_POST["comaker"]["Comaker"];
		$query2 = "INSERT INTO `borrower_income` (`borrowerID`, `incomeOrSalary`, `otherIncome`, `otherIncomeDetails`, `netIncome`) VALUES (:borrowerID, :IncomeorSalary, :OtherIncome, :OtherIncomeDetails, :NetIncome)";
		$_POST["income"]["borrowerID"] = $_POST["borrower"]["borrowerID"];
		$query3 = "INSERT INTO `borrower_expense` (`borrowerID`, `food`, `bills`, `education`, `rental`, `repairMaintenance`, `misc`) VALUES (:borrowerID, :Food, :Bills, :Education, :Rentals, :RepairorMaintenance, :Miscellaneous)";
		$_POST["expenses"]["borrowerID"] = $_POST["borrower"]["borrowerID"];
		$result = $main->perfBind($query1,$_POST["borrower"])&&$main->perfBind($query2,$_POST["income"])&&$main->perfBind($query3,$_POST["expenses"]);
		break;
	case "addComaker":
		$query = "INSERT INTO `comaker` (`comakerID`, `fName`, `midName`, `lName`, `bDay`, `civilStatus`, `contactNo`, `presentAddr`, `homeAddr`, `occupation`, `salaryOrIncome`, `employerID`) VALUES (:comakerID, :FirstName, :MiddleName, :LastName, :Birthdate, :CivilStatus, :ContactNumber, :PresentAddress, :HomeAddress, :Occupation, :SalaryorIncome, :Employer)";
		$lastId = $main->getOne("SELECT comakerID FROM comaker ORDER BY comakerID DESC",array());
		$_POST["comaker"]["comakerID"] = (is_numeric($lastId)?$lastId:0) + 1;
		$result["id"] = $_POST["comaker"]["comakerID"];
		$result["name"] = $_POST["comaker"]["First Name"]." ".$_POST["comaker"]["Middle Name"]." ".$_POST["comaker"]['Last Name'];
		$result["success"] = $main->perfBind($query,$_POST["comaker"]);
		break;
	case "getBorrower":
		$id = isset($_POST["id"])?$_POST["id"]:0;
		$result = $main->getAll("SELECT * FROM borrower WHERE borrowerID = ?",array($id));
		break;
	case "saveBorrower":
		$updates = [];
		$data = [];
		$id = isset($_POST["borrowerID"])?$_POST["borrowerID"]:0;
		foreach($_POST as $key => $val){
			if($key!="action"&&$key!="borrowerID"){
				$updates[] = "`$key` = ?";
				$data[] = $val;
			}
		}
		$data[] = $id;
		$updates = implode(", ",$updates);
		$query = "UPDATE borrower SET $updates WHERE borrowerID = ?";
		$result = $main->perf($query,$data);
		break;
	case "deleteBorrower":
		$id = isset($_POST["id"])?$_POST["id"]:0;
		$query = "UPDATE borrower SET borrower_deleted = 1 WHERE borrowerID = ?";
		$result = $main->perf($query,array($id));
		break;
}

echo json_encode($result);
?>
