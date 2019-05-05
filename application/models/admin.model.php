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
	
	public function updateEmployee($user = array(), $employee = array()) {
		try {
			$result = false;
			$sql = $this->conn->prepare("UPDATE `employee` SET `fName` = ?, `mName` = ?,
												`lName` = ?, `gender` = ?, `position` = ?,
												`address` = ?, `email` = ?, `birthdate` = ?,
												`marital_status` = ?, `home_phone` = ?, 
												`personal_phone` = ? WHERE `employee`.`userID` = ?");

			$sql2 = $this->conn->prepare("UPDATE `users` SET `password` = ? WHERE `users`.`userID` = ?");
			$sql->bindParam(1, $employee['fName']);
			$sql->bindParam(2, $employee['mName']);
			$sql->bindParam(3, $employee['lName']);
			$sql->bindParam(4, $employee['gender']);
			$sql->bindParam(5, $employee['position']);
			$sql->bindParam(6, $employee['address']);
			$sql->bindParam(7, $employee['email']);
			$sql->bindParam(8, $employee['birthdate']);
			$sql->bindParam(9, $employee['mStatus']);
			$sql->bindParam(10, $employee['home_phone']);
			$sql->bindParam(11, $employee['per_phone']);
			$sql->bindParam(12, $employee['user_id']); 	
			$sql2->bindParam(1, $user['password']);
			$sql2->bindParam(2, $user['user_id']);
			$exe = $sql->execute();
			$exe2 = $sql2->execute();

			if($exe && $exe2)
			{
				$result = true;
			}

			return $result;
		} catch(PDOException $e) {
			echo 'Something went wrong!<br>Error:'.$e->getMessage();
		}
	}
	public function checkUserDupli($user_id)
	{
		try
		{
			$result = false;
			$sql = $this->conn->prepare('SELECT * FROM users WHERE userID = ? AND users_deleted = 0');
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
			$sql = $this->conn->prepare('UPDATE employee SET employee_deleted = 1 WHERE empID = ?');
			$sql2 = $this->conn->prepare('UPDATE users SET users_deleted = 1 WHERE userID = ?');
			$sql->bindParam(1,$user_id);
			$sql2->bindParam(1,$user_id);
			$exe = $sql->execute();
			$exe2 = $sql2->execute();
			if($exe && $exe2)
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
		$sql = $this->conn->prepare("SELECT * FROM employee e LEFT JOIN users u USING(userID) WHERE e.empID = ?");
		$decode_edit = base64_decode($edit);
		$sql->bindParam(1, $decode_edit);
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
	public function getCollectionDetails($empID) {
		try {
			$result = array();
			$sql = $this->conn->prepare("SELECT 
									    `e`.`empID`,
									    `e`.`fName` AS `eFname`,
									    `e`.`mName` AS `eMname`,
									    `e`.`lName` AS `eLname`,
									    `e`.`position` AS `position`,
									    `e`.`email` AS `email`,
									    `e`.`personal_phone` AS `phone`,
									    `e`.`gender` AS `gender`,
									    `b`.`borrowerID`,
									    `b`.`fName` AS `bFname`,
									    `b`.`mName` AS `bMname`,
									    `b`.`lName` AS `bLname`,
									    `l`.`applicationNo` AS `appNo`,
									    `l`.`loanAmount` AS `amount`,
									    `l`.`loanStatus` AS `status`
									FROM
									    `employee` `e`
									        INNER JOIN
									    `borrower` `b` USING (`empID`)
									        INNER JOIN
									    `loan` `l` USING (`borrowerID`)
									WHERE
									    `e`.`empID` = ?
									        AND `e`.`position` = 'collector'
									        AND `b`.`empID` = ?
									        AND `l`.`empID` = ?");
			$decode_id = base64_decode($empID);
			$sql->bindParam(1, $decode_id);
			$sql->bindParam(2, $decode_id);
			$sql->bindParam(3, $decode_id);
			$exe = $sql->execute();
			if(!empty($sql->rowCount()))
			{
				while($row = $sql->fetch(PDO::FETCH_ASSOC))
					{
						$result[] = $row;
					}
			}
			return $result;
		}catch(PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}
}

$admin = new admin;
