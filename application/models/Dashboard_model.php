<?php
class Dashboard_model extends CI_Model {

	public function insertBorrower($bi)
	{
		$this->load->model('dashboard_model');
		$sql = "INSERT INTO borrower(`fName`,`mName`,`lName`,`bDay`,`civilStatus`,`gender`,`presentAddr`,`homeAddr`,`ownHouse`,`lengthOfStay`,`noOfChildren`,`occupation`,`contactNo`,`validID`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $exe = $this->db->query($sql,array($bi['fname'],$bi['mname'],$bi['lname'],$bi['borrower_bdate'],$bi['borrower_civil_status'],$bi['borrower_gender'],$bi['borrower_present_address'],$bi['borrower_home_address'],$bi['own_house'],$bi['lenght_of_stay'],$bi['num_of_children'],$bi['occupation'],$bi['contact_number'],$bi['valid_id']));
        // $rows = $stmt->fetchAll("PDO::FETCH_ASSOC");

        $id = $this->db->lastInsertId();
        return $id;
		


	}
}
?>