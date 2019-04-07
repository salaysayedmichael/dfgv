<?php
require_once('main.model.php');

class admin extends main
{
	// function __construct(){
	// 	$this->checkUserDuplication('123');
	// }
	public function addUser($data = array())
	{
		try
		{
			$result = false;
			$sql = $this->conn->prepare('INSERT INTO users (userID, password, userType) VALUES(?,?,?)');
			$sql->bindParam(1, $data['user_id']);
			$sql->bindParam(2, $data['password']);
			$sql->bindParam(3, $data['position']);
			$exe = $sql->execute();
			if($exe)
			{
				$result = true;
			}
			return $result;
		}
		catch(PDOException $e)
		{
			echo 'Something went wrong! <br>Error:'.$e->getMessage();
		}
	}

	public function addEmployee($data = array())
	{
		try
		{
			$result = false;
			$sql = $this->conn->prepare('INSERT INTO `employee` (`fName`, `mName`, `lName`, `gender`, `position`, `address`, `email`, `birthdate`, `marital_status`, `home_phone`, `personal_phone`, `userID`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
			$sql->bindParam(1,$data['fName']);
			$sql->bindParam(2,$data['mName']);
			$sql->bindParam(3,$data['lName']);
			$sql->bindParam(4,$data['gender']);
			$sql->bindParam(5,$data['position']);
			$sql->bindParam(6,$data['address']);
			$sql->bindParam(7,$data['email']);
			$sql->bindParam(8,$data['birthdate']);
			$sql->bindParam(9,$data['mStatus']);
			$sql->bindParam(10,$data['home_phone']);
			$sql->bindParam(11,$data['per_phone']);
			$sql->bindParam(12,$data['user_id']);
			$exe = $sql->execute();
			if($exe)
			{
				$result = true;
			}
			return $result;
		}
		catch(PDOException $e)
		{
			echo 'Something went wrong!<br>Error:'.$e->getMessage();
		}
	}
	
	public function checkUserDupli($user_id)
	{
		try
		{
			$result = false;
			$sql = $this->conn->prepare('SELECT * FROM users WHERE userID = ?');
			$sql->bindParam(1, $user_id);
			$sql->execute();
			$row = $sql->fetch(PDO::FETCH_ASSOC);
			if($row)
			{
				$result = true;
			}
			return $result;
		}
		catch(PDOException $e)
		{
			echo 'Something went wrong!<br> Error:'.$e->getMessage();
		}
	}

	public function removeUser($user_id)
	{
		try
		{
			$result = false;
			$sql = $this->conn->prepare('UPDATE employee SET deleted = 1 WHERE userID = ?');
			$sql->bindParam(1,$user_id);
			$exe = $sql->execute();
			if($exe)
			{
				$result = true;
			}
			return $result;
		}
		catch(PDOException $e)
		{
			echo 'Something went wrong!<br>Error: '.$e->getMessage();
		}
	}

	public function showEditEmployee($edit)
	{
		$result = array();
		$sql = $this->conn->prepare("SELECT * FROM employee e INNER JOIN users u USING(userID) WHERE u.userID = ?");
		$sql->bindParam(1, $edit);
		$sql->execute();
		if(!empty($sql->rowCount()))
		{
			while($row = $sql->fetch(PDO::FETCH_ASSOC))
				{
					$result[] = $row;
				}
		}
		
		return $result;
	}
}

$admin = new admin;
