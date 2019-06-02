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
			$sql->bindParam(11, $employee['personal_phone']);
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

	public function addLoanApplication($ld) {

		try {
			$result = array();
			
			$sql = $this->conn->prepare("INSERT INTO 
											`loan`( `borrowerID`,
													`empID`,
													`percentage`,
													`purpose`,
													`loan_type`,
													`loanAmount`,
													`loanStatus`,
													`submitted`,
													`totalPayable`)
										 VALUES(?,?,?,?,?,?,?,?,?)");
			$exe = $sql->execute(array($ld['borrwowerID'],$ld['userID'],$ld['interestRate'],$ld['purpose'],$ld['loanType'],$ld['LoanAmount'],$ld['loanStatus'],$ld['submitted'],$ld['totalPayable']));
			$id = $this->conn->lastInsertId();
			return $id;
		}catch(PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}
	public function showAllCollections($id = 0)
	{
		try{
		$result = array();
			$where = "";
			if($id != 0){
				$where = "WHERE b.borrowerID = $id ";
			}
			$sql = $this->conn->prepare("SELECT 
									    `e`.`empID`,
									    `e`.`fName` AS `eFname`,
									    `e`.`mName` AS `eMname`,
									    `e`.`lName` AS `eLname`,
									    `b`.`borrowerID`,
									    `b`.`fName` AS `bFname`,
									    `b`.`mName` AS `bMname`,
									    `b`.`lName` AS `bLname`,
									    `l`.`applicationNo` AS `appNo`,
									    `l`.`loanAmount` AS `loan_amount`,
									    `l`.`percentage` AS `interest`,
									    SUM(`ci`.`collection_amount`) AS `collection_amount`
									FROM
									    `borrower` `b`
									        INNER JOIN
										`loan` `l` using(borrowerID)
											LEFT JOIN
									    `employee` `e` on e.`userID`= l.empid
									    	LEFT JOIN 
									    `collection_info` `ci` ON `ci`.`application_no` = `l`.`applicationNo`
										$where 
									    GROUP BY `ci`.`application_no`, `l`.`applicationNo`
									");
			$sql->execute();
			if(!empty($sql->rowCount())) {
				while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
					$result[] = $row;
				}
			}
			return $result;
		}catch(PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}
	public function getLoanDetails($applicationID)
	{
			try {
				$result = array();
				
				$sql = $this->conn->prepare("SELECT 
											    l.applicationNo,
											    concat(b.fName, ' ', b.lName) as `borrower_name`,
											    l.loanAmount,
											    l.percentage,
											    l.totalPayable,
											    l.purpose,
											    e.userID,
											    ls.ls_Label as `loan_status`,
											    lt.lt_Label as `loan_type`,
											    concat(e.fName, ' ', e.lName) as `processor`,
												(SELECT if(isnull(SUM(collection_amount)),0,SUM(collection_amount)) FROM collection_info WHERE application_no = l.applicationNo)as `collected`
											FROM
											    loan l
											        inner join
											    borrower b USING (borrowerID)
											        inner join
											    employee e ON e.userID = l.empID
											        inner join
											    loan_status ls ON ls.ls_id = l.loanStatus
											        inner join
											    loan_type lt ON lt.lt_id = l.loan_type
											WHERE
												l.applicationNo = ?");
				$exe = $sql->execute(array($applicationID));
				$row = $sql->fetch(PDO::FETCH_ASSOC);
				return $row;
			}catch(PDOException $e) {
				echo "Error: ".$e->getMessage();
			}
	}

	public function getCollectionInfo($applicationNo)
	{
		try {
				$result = array();
				
				$sql = $this->conn->prepare("SELECT c.collection_id, c.collector_id, c.borrower_id, c.application_no, c.collection_amount, c.comment, date_format(c.collection_date, '%M %m,%Y')as `collection_date`, concat(e.fName,' ',e.lName) as `collector`
											FROM collection_info c
											INNER JOIN employee e on e.empID = c.collector_id
											WHERE c.application_no = ?
											ORDER BY collection_date ASC;");
				$exe = $sql->execute(array($applicationNo));
				$row = $sql->fetchAll(PDO::FETCH_ASSOC);
				return $row;
			}catch(PDOException $e) {
				echo "Error: ".$e->getMessage();
			}
	}
	

	public function getCollection($app_no) {
		try {
			$result = array();
			$sql = $this->conn->prepare("SELECT `applicationNo`,`fName`,`mName`,`lName`,`borrowerID` 
										FROM `loan` INNER JOIN `borrower` 
										USING(`borrowerID`) WHERE `applicationNo` = ?");
			$sql->bindParam(1, $app_no);
			$sql->execute();
			if(!empty($sql->rowCount())) {
				while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
					$result[] = $row;
				}
			}
			return $result;
		}catch(PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}

	public function insertCollection($data = array()) {
		try {
			$success = false;
			$sql = $this->conn->prepare("INSERT INTO `collection_info` 
										(`collector_id`, `borrower_id`, `application_no`, `collection_amount`, `comment`, `collection_date`) 
										VALUES (?, ?, ?, ?, ?, ?)");
			$sql->bindParam(1,$data["collector"]);
			$sql->bindParam(2,$data["borrower"]);
			$sql->bindParam(3,$data["app_no"]);
			$sql->bindParam(4,$data["received"]);
			$sql->bindParam(5,$data["comment"]);
			$sql->bindParam(6,$data["date"]);
			$exe = $sql->execute();
			if($exe) {
				$success = true;
			}
			return $success;
		}catch(PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}

	public function getCollectionDetails($collector) {
		try {
			$result = array();
			$sql 	= $this->conn->prepare("SELECT `e`.`fname` AS `eFname`, `e`.`mname` AS `eMname`, `e`.`lname` AS `eLname`,
											`e`.`gender` AS `gender`,`e`.`position` AS `position`,`e`.`email` AS `email`,`e`.`personal_phone` AS `phone`,
										   `b`.`fname` AS `bFname`, `b`.`mname` AS `bMname`, `b`.`lname` AS `bLname`, `ci`.`application_no` AS `appNo`, 
										   `ci`.`collection_amount` AS `amount`, `ci`.`comment` AS `comment`, `ci`.`collection_date` AS `date`
										   FROM `collection_info` `ci` 
										   INNER JOIN `borrower` `b` 
											   ON `ci`.`borrower_id` = `b`.`borrowerID` 
										   INNER JOIN `employee` `e` 
											   ON `ci`.`collector_id` = `e`.`empID` 
										   WHERE `ci`.`collector_id` = ? 
										   ");
			$decoded = base64_decode($collector);
			$sql->bindParam(1,$decoded);
			$sql->execute();
			if(!empty($sql->rowCount())) {
				while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
					$result[] = $row;
				}
			}
			return $result;
		}catch(PDOException $e) {
			echo "Error: ".$e->getMessage();   
		}
	}

	public function viewCollectionPerBorrower($borrower) {
		try {
			$result = array();
			$sql = $this->conn->prepare("SELECT `fname`,`mname`,`lname`,`applicationno`,`totalpayable`,`l`.`loanAmount`, 
										SUM(`ci`.`collection_amount`) AS `c_amount`, `l`.`percentage` FROM `borrower` `b` 
											INNER JOIN `loan` `l` 
												ON `b`.`borrowerID` = `l`.`borrowerID` 
											INNER JOIN `collection_info` `ci` 
												ON `l`.`applicationNo` = `ci`.`application_no` 
										WHERE `l`.`applicationNo` = ?");
			$sql->bindParam(1, $borrower);
			$sql->execute();
			if(!empty($sql->rowCount())) {
				while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
					$result = $row;
				}
			}
			return $result;
		}catch(PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}

}

$admin = new admin;
// print_r($admin->viewCollectionPerBorrower(1));
