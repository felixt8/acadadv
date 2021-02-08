<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_staff extends CI_Controller {


function __construct(){
	parent::__construct();

	$this->load->model('Staff','',TRUE);
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
	$this->load->library('session');
}

	public function index()
	{
		$this->load->library('form_validation');
		$data['content'] = "Register_form";
		$this->form_validation->set_rules('id','ID','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		
		if($this->form_validation->run()==FALSE){
			//Field validation failed. User redirected to login page
			$this->session->set_flashdata('status','<div class="alert alert-danger text-center" style="width:550px"> Error! Please Enter the Info Again!</div>');
			$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('3'));

		
		$this->load->view('stf_acc_view', $data);
		}
		else{

			if($this->input->post('pass')==""){
			
			$data['StfID']= $this->input->post('id');
			$data['StfPwd']= $this->input->post('password');
			$data['StfName']= $this->input->post('name');
			$data['StfIC']= $this->input->post('ic');
			$data['StfEmail']= $this->input->post('email');

			//pass $data to model
			$this ->load->model('Staff','',TRUE);
			$result = $this->Staff->updateStaff($data);

			if($result){
				$this->session->set_flashdata('status','<div class="alert alert-success text-center" style="width:550px"> Data Was Update Successfully!</div>');
				
				$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('3'));
				$this->load->view('stf_acc_view',$data);
			}

			else{
				$this->session->set_flashdata('status','<div class="alert alert-danger text-center" style="width:550px"> Error! Please Try Again!!</div>');
				
				$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('3'));
				$this->load->view('stf_acc_view',$data);
				}

			}

		}

	}
}