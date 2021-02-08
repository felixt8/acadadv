<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $role;

	function __construct(){
		parent::__construct();
		$this->load->model('Admin','',TRUE);
		$this->load->model('Staff','',TRUE);
		$this->load->model('Faculty','',TRUE);
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index(){
		$this->load->view('login_view');
	}



function verify_User_Login(){
	//This method will have the credentials validation
	$this->load->library('form_validation');

	$this->form_validation->set_rules('id','User ID', 'trim|required');
	$this->form_validation->set_rules('password','Password', 'trim|required|min_length[5]|max_length[12]|callback_check_database');

	if($this->form_validation->run() == FALSE)
	{
		//Field validation failed. User redirected to login page

		$this->load->helper(array('form'));
		$this->session->set_flashdata('login_status', '<div class="alert alert-danger text-center" style="width:500px"> Error! PLease enter a valid user ID and login password.</div>');
		$this->load->view('login_view');

	}
	else
	{
		if($this->role==1){
		$id = $this->input->post('id');
		$data['ADMIN']= $this->Admin->getAdmin($id);
		$data['FACULTY']= $this->Faculty->getAllFaculty();
		
		$this->load->view('fac_list_view',$data);
		}
		else if($this->role==2){
		$id = $this->input->post('id');
		$data['STAFF']= $this->Staff->getStaff($id);
		$data['FACULTY']= $this->Faculty->getFacultybyStf($id);
		
		$this->load->view('sfac_list_view',$data);
		}
		
	}

}

function check_database($password){
	$id = $this->input->post('id');
	$result1 = $this->Admin->admLogin($id,$password);
	$result2 = $this->Staff->stfLogin($id,$password);

	if ($result1){

		$sess_array=array();
		foreach($result1 as $row)
		{
			$sess_array=array(
				'id'=> $id, 'adminName' => $row->AdmName, 'adminEmail' => $row->AdmEmail);

			$this->session->set_userdata('logged_in', $sess_array);
			$this->role=1;
		}

		return TRUE;
	}

	else if($result2){
		$sess_array=array();
		foreach($result2 as $row)
		{
			$sess_array=array(
				'id'=> $id, 'staffName' => $row->StfName, 'staffEmail' => $row->StfEmail);

			$this->session->set_userdata('logged_in', $sess_array);
			$this->role=2;
		}

		return TRUE;
	}

	else{
		$this->form_validation->set_message('check_database', '<div class="alert alert_danger text-center" style="font-size:15px; width:250px"> Invalid user ID or password.</div>');
		$this->session->set_flashdata('login status', '<div class="alert alert_danger text-center" style="font-size:30px; width:500px"> Please enter a valid user ID and password.</div>');
		return false;
	}



}

}