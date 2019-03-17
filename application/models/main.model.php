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
		// $this->getAllEmployees();
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

	public function login($user_id, $password)
	{
		try
		{
			$result = false;
			$sql = $this->conn->prepare('SELECT * FROM users WHERE userID = ? AND password = ?');
			$sql->bindParam(1, $user_id);
			$sql->bindParam(2, $password);
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

	public function knowUserType()
	{
		switch ($_SESSION['user_type']) {
			case 1:
				# code...
			    return 'admin';
				break;
			case 2:
				#code
				return 'teller';
				break;
			default:
				# code...
				header('Location: ?logout=1');
				break;
		}
	}

	public function getUser($user_id)
	{
		try
		{
			$sql = $this->conn->prepare('SELECT * FROM employee WHERE userID = ?');
			$sql->bindParam(1, $user_id);
			$sql->execute();
			$row = $sql->fetch(PDO::FETCH_ASSOC);
			if($sql->rowCount() == 1)
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

	public function getAllEmployees()
	{
		try
		{	
			$sql = $this->conn->prepare('SELECT * FROM employee');
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