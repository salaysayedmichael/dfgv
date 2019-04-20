<?php
define('HOST',$_SERVER['SERVER_NAME']);
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE','dfgv_db');

(!isset($_SESSION) ? session_start() : null);

class main 
{
	function __construct()
	{
		$this->connection();
		// $this->checkUserDupli('123');
	}


	public function connection()
	{
		try
		{
			$this->conn = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD,
			array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}
		catch(PDOException $e)
		{
			echo 'Something went wrong!<br>Error: '.$e->getMessage();
		}
	}
	public function getOne($query,$data){ //added by Joe Apr 6, 2019
		$stmt = $this->conn->prepare($query);
		$stmt->execute($data);
		$rows = $stmt->fetch(PDO::FETCH_ASSOC);
		if(!empty($rows)){
			foreach($rows as $row){
                return $row;
            }
		}
		return null;
	}
	public function getAll($query,$data){ //added by Joe Apr 6, 2019
		$stmt = $this->conn->prepare($query);
		$stmt->execute($data);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function perf($query,$data){ //added by Joe Apr 6, 2019
		$stmt = $this->conn->prepare($query);
		return $stmt->execute($data);
	}
	public function perfBind($query,$data){ //added by Joe Apr 16, 2019
		$stmt = $this->conn->prepare($query);
		foreach($data as $key => $value){
			$bindName = str_replace(" ", '', $key);
			$stmt->bindValue(":$bindName", $value);
		}
		return $stmt->execute();
	}
	public function login($user_id, $password)
	{
		try
		{
			$result = false;
			$sql = $this->conn->prepare('SELECT * FROM users WHERE userID = ? AND password = ? AND users_deleted = 0');
			$columns = array();
			$data = array(1=>$user_id, 2=>$password);
			foreach($data as $key => $value) {
				$sql->bindValue($key, $value);
			}
			$sql->execute();
			$row = $sql->fetch(PDO::FETCH_ASSOC);
			if($sql->rowCount() > 0)
			{
				$_SESSION['uid'] = $row['userID'];
				$_SESSION['user_type'] = $row['userType'];
				$result = true;
			}
			return $result;
		}
		catch(PDOExcetion $e)
		{
			echo 'Something went wrong!<br>Error: '.$e->getMessage();
		}
	}


	public function getUser($user_id) //added by Dave, day one
	{
		$result = [];
		try
		{
			$result = array();
			$sql = $this->conn->prepare('SELECT * FROM employee WHERE userID = ?');
			$sql->bindParam(1, $user_id);
			$sql->execute();
			$row = $sql->fetch(PDO::FETCH_ASSOC);
			if(!empty($sql->rowCount()))
			{
				$result[] = $row;
			}
			return $result;
		}
		catch(PDOException $e)
		{
			echo 'Something went wrong!<br>Error: '.$e->getMessage();
		}
	}

	public function getAllEmployees($type) //added by Dave, day one
	{
		$result = [];
		try
		{	
			$collector = 'SELECT * FROM employee WHERE position = "collector" AND employee_deleted = 0 ORDER BY created DESC';
			$allEmp = 'SELECT * FROM employee WHERE employee_deleted = 0 ORDER BY created DESC';
			$stmt = $type == "all_emp"? $type = $allEmp : $type = $collector;
			$result = array();
			$sql = $this->conn->prepare("$stmt");
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
		catch(PDOException $e)
		{
			echo 'Something went wrong!<br> Error: '.$e->getMessage();
		}
	}
	public function getAllBorrowers()
	{
		try
		{	
			$sql = $this->conn->prepare('SELECT * FROM borrower WHERE borrower_deleted != 1');
			$sql->execute();
			$result = [];
			if(!empty($sql->rowCount()))
			{
				while($row = $sql->fetch(PDO::FETCH_ASSOC))
				{
					$result[] = $row;
				}
			}
			return $result;
		}
		catch(PDOException $e)
		{
			echo 'Something went wrong!<br> Error: '.$e->getMessage();
		}
	}
	public function getAllComakers()
	{
		try
		{	
			$sql = $this->conn->prepare('SELECT * FROM comaker');
			$sql->execute();
			$result = [];
			if(!empty($sql->rowCount()))
			{
				while($row = $sql->fetch(PDO::FETCH_ASSOC))
				{
					$result[] = $row;
				}
			}
			return $result;
		}
		catch(PDOException $e)
		{
			echo 'Something went wrong!<br> Error: '.$e->getMessage();
		}
	}
	public function getAllEmployers()
	{
		try
		{	
			$sql = $this->conn->prepare('SELECT * FROM employer');
			$sql->execute();
			$result = [];
			if(!empty($sql->rowCount()))
			{
				while($row = $sql->fetch(PDO::FETCH_ASSOC))
				{
					$result[] = $row;
				}
			}
			return $result;
		}
		catch(PDOException $e)
		{
			echo 'Something went wrong!<br> Error: '.$e->getMessage();
		}
	}
	public function logout()
	{
		$logout = (isset($_GET['logout']) ? $_GET['logout'] : null);
		if($logout == 1)
		{
			session_destroy();
			header("Location: .");
		}
	}
}
$main = new main;
$main->logout();

?>