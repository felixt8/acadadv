<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sadd_crs extends CI_Controller {
	
	public function __construct() {
    
    parent::__construct();

	$this->load->model('Course','',TRUE);
	$this->load->model('Staff','',TRUE);
	$this->load->model('Faculty','',TRUE);
	$this->load->model('Programme','',TRUE);
	$this->load->model('Mapping','',TRUE);
	$this->load->model('Keyword','',TRUE);
	$this->load->model('Clo','',TRUE);
	$this->load->model('Cco','',TRUE);
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
	}
	
	public function index($id)
	{
		$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('3'));
		$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('4'));
		$data['AKW'] = $this->Keyword->getAllKeyword();
		
		$this->load->view('sadd_crs_view',$data);
	}
	
	
	function addCrs($id){
		//form validation
		$this->load->library('form_validation');
		$data['content'] = "Register_form"; 
		$this->form_validation->set_rules('code','Code','trim|required');
		$this->form_validation->set_rules('name','Name','trim|required');
		
		$this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');
		if($this->form_validation->run() == FALSE){
			//Field Validation failed. User redirected to login page
			$this->session->set_flashdata('status','<div class="alert alert-danger text-center" style="width:600px"> Error Invalid Input! Please Enter the Info Again!</div>');
			$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('3'));
			$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('4'));
			$data['AKW'] = $this->Keyword->getAllKeyword();
			
			$this->load->view('sadd_crs_view',$data);
		}
		else{
		//Binding form data from view into array $Data
		
		$data['CrsID']= $this->input->post('code');
		$data['CrsName']= $this->input->post('name');
		$data['CrsCtg']= $this->input->post('ctg');
		$data['CrsSynopsis']= $this->input->post('syn');
		$data['CrsCredit']= $this->input->post('credit');
		$data['CrsPreq']= $this->input->post('preque');
		$data['FacID']= $this->uri->segment('4');

		//pass $data to model
		$result = $this->Course->addCourse($data);

		
		$clo = $this->input->post('clo');
	    $desc = $this->input->post('desc'); 
		$crs = $this->input->post('code');
		$i=0;
		if($clo){
	    foreach($clo as $c)
	    {
		  $this->Clo->addCLO($c,$desc[$i],$crs);
		  $i+=1;
	    }
		}
		
		$cp = $this->input->post('cp');
		$plo = $this->input->post('plo');
		$prg = $this->input->post('prog');
		if($cp){
		$i=0;
		foreach($cp as $c){
			$this->Mapping->addMap($c,$crs,$plo[$i],$prg[$i]);
			$i+=1;
		}
		}
		
		$clox = $this->input->post('clox');
	    $chap = $this->input->post('chap'); 
		$i=0;
		if($clox){
		foreach($clox as $cl)
	    {
		  $cloID = $this->Clo->getCLOID($cl,$crs);
		  $this->Cco->addCCO($chap[$i],$cloID);
		  $i+=1;
	    }
		}

		$key = $this->input->post('key');
		if($key){
		foreach($key as $k){
			$this->Keyword->addMatch($k,$crs);
		}
		}
		
		$nkey = $this->input->post('newkey');
		if($nkey){
		foreach($nkey as $k){
			$success=$this->Keyword->addKeyword($k);
			
			if($success){
				$kid=$this->Keyword->getKeyID($k);
				$this->Keyword->addMatch($kid[0]->KeyID,$crs);
			}
		}
		}
		
		if($result){
			$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('4'));
			$data['PROGRAMME'] = $this->Programme->getPrgbyFac($this->uri->segment('4'));
			$data['COURSE'] = $this->Course->getCrsbyFac($this->uri->segment('4'));
			$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('3'));
			
			$this->load->view('sedit_fac_view',$data);
		}
		else{
			$this->session->set_flashdata('status','<div class="alert alert-danger text-center" style="width:600px"> Error! Please Try Again!!</div>');
			$this->load->view('sadd_crs_view',$data);
		}
		}	
	}
}