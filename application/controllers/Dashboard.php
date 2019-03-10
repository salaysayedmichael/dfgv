<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('dashboard');
	}

	public function addApplication()
	{
		$this->load->view('dashboard');
	}
	public function view($page = 'home')
	{
		 if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter

	        $this->load->view('templates/header', $data);
	        $this->load->view($page, $data);
	        $this->load->view('templates/footer', $data);
	}
	public function process()
	{
		$type = isset($_POST['type'])?$_POST['type']:'0';
		$data = array();
		$data['html'] = "";
		$data['success'] = false;
		$data['message'] = "";

		switch ($type) {
			case 'insertNewBorrower':
				$borrower_info                             = array();
				$spouse_info                               = array();
				$income                                    = array();
				$expenses                                  = array();
				
				$borrower_info['fname']                    = isset($_POST['fname'])?$_POST['fname']:'0';
				$borrower_info['mname']                    = isset($_POST['mname'])?$_POST['mname']:'0';
				$borrower_info['lname']                    = isset($_POST['lname'])?$_POST['lname']:'0';
				$borrower_info['borrower_bdate']           = isset($_POST['borrower_bdate'])?$_POST['borrower_bdate']:'0';
				$borrower_info['borrower_gender']          = isset($_POST['borrower_gender'])?$_POST['borrower_gender']:'0';
				$borrower_info['borrower_civil_status']    = isset($_POST['borrower_civil_status'])?$_POST['borrower_civil_status']:'0';
				$borrower_info['borrower_present_address'] = isset($_POST['borrower_present_address'])?$_POST['borrower_present_address']:'0';
				$borrower_info['borrower_home_address']    = isset($_POST['borrower_home_address'])?$_POST['borrower_home_address']:'0';
				$borrower_info['own_house']                = isset($_POST['own_house'])?$_POST['own_house']:'0';
				$borrower_info['lenght_of_stay']           = isset($_POST['lenght_of_stay'])?$_POST['lenght_of_stay']:'0';
				$borrower_info['num_of_children']          = isset($_POST['num_of_children'])?$_POST['num_of_children']:'0';
				$borrower_info['num_of_dependents']        = isset($_POST['num_of_dependents'])?$_POST['num_of_dependents']:'0';
				$borrower_info['occupation']               = isset($_POST['occupation'])?$_POST['occupation']:'0';
				$borrower_info['Employer']                 = isset($_POST['Employer'])?$_POST['Employer']:'0';
				$borrower_info['valid_id']                 = isset($_POST['valid_id'])?$_POST['valid_id']:'0';
				$borrower_info['contact_number']           = isset($_POST['contact_number'])?$_POST['contact_number']:'0';
				$spouse_info['name_spouse']                = isset($_POST['name_spouse'])?$_POST['name_spouse']:'0';
				$spouse_info['spouse_bdate']               = isset($_POST['spouse_bdate'])?$_POST['spouse_bdate']:'0';
				$spouse_info['spouse_gender']              = isset($_POST['spouse_gender'])?$_POST['spouse_gender']:'0';
				$spouse_info['spouse_civil_status']        = isset($_POST['spouse_civil_status'])?$_POST['spouse_civil_status']:'0';
				$spouse_info['spouse_present_address']     = isset($_POST['spouse_present_address'])?$_POST['spouse_present_address']:'0';
				$spouse_info['spouse_home_address']        = isset($_POST['spouse_home_address'])?$_POST['spouse_home_address']:'0';
				$spouse_info['spuse_occupation']           = isset($_POST['spuse_occupation'])?$_POST['spuse_occupation']:'0';
				$spouse_info['spouse_employer']            = isset($_POST['spouse_employer'])?$_POST['spouse_employer']:'0';
				$spouse_info['spouse_valid_id']            = isset($_POST['spouse_valid_id'])?$_POST['spouse_valid_id']:'0';
				$spouse_info['spouse_contact_number']      = isset($_POST['spouse_contact_number'])?$_POST['spouse_contact_number']:'0';
				$income['borrower_income']                 = isset($_POST['borrower_income'])?$_POST['borrower_income']:'0';
				$income['spouse_income']                   = isset($_POST['spouse_income'])?$_POST['spouse_income']:'0';
				$income['other_income']                    = isset($_POST['other_income'])?$_POST['other_income']:'0';
				$income['other_income_details']            = isset($_POST['other_income_details'])?$_POST['other_income_details']:'0';
				$income['net_income']                      = isset($_POST['net_income'])?$_POST['net_income']:'0';
				$expenses['exp_food']                      = isset($_POST['exp_food'])?$_POST['exp_food']:'0';
				$expenses['exp_bills']                     = isset($_POST['exp_bills'])?$_POST['exp_bills']:'0';
				$expenses['exp_education']                 = isset($_POST['exp_education'])?$_POST['exp_education']:'0';
				$expenses['exp_rentals']                   = isset($_POST['exp_rentals'])?$_POST['exp_rentals']:'0';
				$expenses['exp_repair']                    = isset($_POST['exp_repair'])?$_POST['exp_repair']:'0';
				$expenses['exp_miscellaneous']             = isset($_POST['exp_miscellaneous'])?$_POST['exp_miscellaneous']:'0';

				$data['borrower_id'] = $this->dashboard->insertBorrower($borrower_info);
			break;
			default:
				# code...
			break;
		}
		echo json_encode($data);
	}
}
