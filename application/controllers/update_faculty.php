<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_faculty extends CI_Controller {


function __construct(){
	parent::__construct();

	$this->load->model('Admin','',TRUE);
	$this->load->model('Faculty','',TRUE);
	$this->load->model('Programme','',TRUE);
	$this->load->model('Course','',TRUE);
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
}

	public function index()
	{
		$this->load->library('form_validation');
		$data['content'] = "Register_form";
		$this->form_validation->set_rules('faculty','name','trim|required');

		
		if($this->form_validation->run()==FALSE){
			//Field validation failed. User redirected to login page
			$this->session->set_flashdata('status','<div class="alert alert-danger text-center" style="width:600px"> Error! Faculty Name cannot be empty</div>');
			$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('4'));
			$data['PROGRAMME'] = $this->Programme->getPrgbyFac($this->uri->segment('4'));
			$data['COURSE'] = $this->Course->getCrsbyFac($this->uri->segment('4'));
			$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
		
			$this->load->view('edit_fac_view', $data);
		}
		else{

			$data['FacID']= $this->uri->segment('4');
			$data['FacName']= $this->input->post('faculty');
			$data['Link']= $this->input->post('link');
			
			if(empty($_FILES['facPic']['tmp_name']) && !file_exists($_FILES['facPic']['tmp_name'])){
				$result = $this->Faculty->updateFaculty($data);
			}else{
				$xt=explode('.',$_FILES['facPic']['name']);
				$ext=end($xt);
				$file_ext=strtolower($ext);
				$extensions= array("jpeg","jpg","png");
				
				if(!in_array($file_ext,$extensions)){
					$result=false;
					
				}else{
					$data['FacPic']= file_get_contents($_FILES['facPic']['tmp_name']);
					$result = $this->Faculty->updateFaculty2($data);
				}
			}

			if($result){
				$this->session->set_flashdata('status','<div class="alert alert-success text-center" style="width:600px"> Data Was Update Successfully!</div>');
				
				$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
				$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('4'));
				$data['PROGRAMME'] = $this->Programme->getPrgbyFac($this->uri->segment('4'));
				$data['COURSE'] = $this->Course->getCrsbyFac($this->uri->segment('4'));
				$this->load->view('edit_fac_view',$data);
			}

			else{
				$this->session->set_flashdata('status','<div class="alert alert-danger text-center" style="width:600px"> Error Invalid Input! Please Try Again!!</div>');
				
				$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
				$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('4'));
				$data['PROGRAMME'] = $this->Programme->getPrgbyFac($this->uri->segment('4'));
				$data['COURSE'] = $this->Course->getCrsbyFac($this->uri->segment('4'));
				$this->load->view('edit_fac_view',$data);
				}

			}

		

	}
}