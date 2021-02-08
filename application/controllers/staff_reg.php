<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_reg extends CI_Controller {

	public function __construct() {
    
    parent::__construct();

    $this->load->model('Admin','',TRUE);
	$this->load->model('Staff','',TRUE);
	$this->load->model('Faculty','',TRUE);
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
	}
	
	public function index($id)
	{
		$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
		$data['FAC'] = $this->Faculty->getAllFaculty();
		
		$this->load->view('staff_reg_view',$data);
	}
	
	function reg_stf($id){
		//form validation
		$this->load->library('form_validation');
		$data['content'] = "Register_form"; 
		$this->form_validation->set_rules('id','Name','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('faculty','Faculty','trim|required');
		
		$this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');
		if($this->form_validation->run() == FALSE){
			//Field Validation failed. User redirected to login page
			$this->session->set_flashdata('regstatus','<div class="alert alert-danger text-center" style="width:550px"> Error Invalid Input! Please Enter the Info Again!</div>');
			$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
			$data['FAC'] = $this->Faculty->getAllFaculty();
		
			$this->load->view('staff_reg_view',$data);
			
		}else{
			
			//Binding form data from view into array $Data
			$data['StfID']= $this->input->post('id');
			$data['StfPwd']= $this->input->post('password');
			$data['FacID']= $this->input->post('faculty');
			$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
			
			
			//pass $data to model
			$result = $this->Staff->addStaff($data);
			
			$data['FAC'] = $this->Faculty->getAllFaculty();
			if($result){
				$this->session->set_flashdata('regstatus','<div class="alert alert-success text-center" style="width:550px"> Data Was Added Successfully!</div>');
				$this->load->view('staff_reg_view',$data);
			}
			else{
				$this->session->set_flashdata('regstatus','<div class="alert alert-danger text-center" style="width:550px"> Error! Please Try Again!!</div>');
				$this->load->view('staff_reg_view',$data);
			}
			
		}	
	}
}