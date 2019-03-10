<?php
class Login_model extends CI_Model {

	public function userExists($username, $password)
	{
		// $this->load->model('login_model');
		$sql = "SELECT * FROM `users` WHERE `userID` = ? AND `password` = ?;";
        $exe = $this->db->query($sql,array($username, $password));
        // $rows = $exe->fetchAll("PDO::FETCH_ASSOC");
        // $id = $this->db->lastInsertId();
        return $exe->result_array();
		


	}
}
?>