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
		$columns = [];
		$values = [];
		$data = [];
		$columns[] = "borrowerID";
		$lastId = $main->getOne("SELECT borrowerID FROM borrower ORDER BY borrowerID DESC",array());
		$data[] = (is_numeric($lastId)?$lastId:0) + 1;
		$values[] = "?";
		foreach($_POST as $key => $val){
			if($key!="action"){
				$columns[] = "`$key`";
				$data[] = $val;
				$values[] = "?";
			}
		}
		$columns = implode(",",$columns);
		$values = implode(",",$values);
		$query = "INSERT INTO `borrower` ($columns) VALUES ($values)";
		$result = $main->perf($query,$data);
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
		$query = "DELETE FROM borrower WHERE borrowerID = ?";
		$result = $main->perf($query,array($id));
		break;
}

echo json_encode($result);
?>
