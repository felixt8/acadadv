<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class add_fac extends CI_Controller {
	
	public function __construct() {
    
    parent::__construct();

    $this->load->model('Faculty','',TRUE);
	$this->load->model('Programme','',TRUE);
	$this->load->model('Course','',TRUE);
	$this->load->model('Admin','',TRUE);
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
	}
	
	
	public function index($id)
	{
		
		$query4 = $this->Admin->getAdmin($this->uri->segment('3'));
		
		$data['ADMIN'] = $query4;
		
		$this->load->view('add_fac_view',$data);
	}
	
	
	function add_fc($id){
		//form validation
		$this->load->library('form_validation');
		$data['content'] = "Register_form"; 
		$this->form_validation->set_rules('name','Name','trim|required');
		
		$this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');
		if($this->form_validation->run() == FALSE){
			//Field Validation failed. User redirected to login page
			$this->session->set_flashdata('status','<div class="alert alert-danger text-center" style="width:500px"> Error! Please Enter the Info Again!</div>');
			$que = $this->Admin->getAdmin($this->uri->segment('3'));
			$data['ADMIN'] = $que;
			$this->load->view('add_fac_view',$data);
		}

		else{
		//Binding form data from view into array $Data
		$data['FacName']= $this->input->post('name');
		$data['Link']= $this->input->post('link');
		
		if(empty($_FILES['facPic']['tmp_name']) && !file_exists($_FILES['facPic']['tmp_name'])){
			$result = $this->Faculty->addFaculty($data);
		}else{
			$xt=explode('.',$_FILES['facPic']['name']);
			$ext=end($xt);
			$file_ext=strtolower($ext);
			$extensions= array("jpeg","jpg","png");
			
			if(!in_array($file_ext,$extensions)){
				$result=false;
				
			}else{
				$data['FacPic']= file_get_contents($_FILES['facPic']['tmp_name']);
				$result = $this->Faculty->addFaculty2($data);
			}
			
		}
		
		
		$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
		
		if($result){
			$data['FACULTY'] = $this->Faculty->getAllFaculty();
			$this->load->view('fac_list_view',$data);
		}
		else{
			$this->session->set_flashdata('status','<div class="alert alert-danger text-center" style="width:600px"> Error Invalid Input! Please Try Again!!</div>');
			$this->load->view('add_fac_view',$data);
		}
		}	
	}
}