<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function view()
	{
		$this->load->view('login');
	}

	public function getUserInfo()
	{
		$data = array();
		$data['success'] = false;
		$username = isset($_POST['username'])?$_POST['username']:"0";
		$password = isset($_POST['password'])?$_POST['password']:"0";

		$res = $this->login->userExists($username, $password);
		if(!empty($res))
		{
			$data['success'] = true;
		}
		$data['data'] = $res;
		$data['username'] = $username;
		$data['password'] = $password;
		echo json_encode($data);
	}
}
