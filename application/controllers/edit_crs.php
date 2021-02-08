<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class edit_crs extends CI_Controller {
	
	public function __construct() {
    
    parent::__construct();

	$this->load->model('Course','',TRUE);
	$this->load->model('Mapping','',TRUE);
	$this->load->model('Clo','',TRUE);
	$this->load->model('Admin','',TRUE);
	$this->load->model('Cco','',TRUE);
	$this->load->model('Keyword','',TRUE);
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
	}
	
	public function index($id)
	{
		$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
		$data['COURSE'] = $this->Course->getCourse($this->uri->segment('4'));
		$data['CLO'] = $this->Clo->getClobyCrs($this->uri->segment('4'));
		$data['CCO'] = $this->Cco->getCcobyCrs($this->uri->segment('4'));
		$data['MAPPING'] = $this->Mapping->getMapbyCrs($this->uri->segment('4'));
		$data['KEY'] = $this->Keyword->getKeyword($this->uri->segment('4'));
		$data['AKW'] = $this->Keyword->getAllKeyword();
		
		$this->load->view('edit_crs_view',$data);
	}
	
	public function update($id)
	{	
		//form validation
		$this->load->library('form_validation');
		$data['content'] = "Register_form"; 
		$this->form_validation->set_rules('code','Code','trim|required');
		$this->form_validation->set_rules('name','Name','trim|required');
		
		$this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');
		if($this->form_validation->run() == FALSE){
			//Field Validation failed. User redirected to login page
			$this->session->set_flashdata('status','<div class="alert alert-danger text-center" style="width:600px"> Error Invalid Input! Please Enter the Info Again!</div>');
			$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
			$data['COURSE'] = $this->Course->getCourse($this->uri->segment('4'));
			$data['CLO'] = $this->Clo->getClobyCrs($this->uri->segment('4'));
			$data['CCO'] = $this->Cco->getCcobyCrs($this->uri->segment('4'));
			$data['MAPPING'] = $this->Mapping->getMapbyCrs($this->uri->segment('4'));
			$data['KEY'] = $this->Keyword->getKeyword($this->uri->segment('4'));
			$data['AKW'] = $this->Keyword->getAllKeyword();
			
			$this->load->view('edit_crs_view',$data);
		}
		else{
			
		$Data['Code'] = $this->input->post('code');
		$Data['Name'] = $this->input->post('name');
		$Data['Ctg'] = $this->input->post('ctg');
		$Data['Descrp'] = $this->input->post('descrp');
		$Data['Credit'] = $this->input->post('credit');
		$Data['Preq'] = $this->input->post('preque');
		
		$this->Course->updateCrs($Data);
		
		
		$this->Mapping->delMap($this->input->post('code'));
		$this->Cco->delCCO($this->input->post('code'));
		$this->Clo->delCLO($this->input->post('code'));
		$this->Keyword->delMatch($this->input->post('code'));
		
		$id = $this->input->post('code');
		$clo = $this->input->post('clo');
		$desc = $this->input->post('desc');
		if($clo){
		$i=0;
		foreach($clo as $cl){
			$this->Clo->addCLO($cl,$desc[$i],$id);
			$i+=1;
		}
		}
		
		$cp = $this->input->post('cp');
		$plo = $this->input->post('plo');
		$prg = $this->input->post('prog');
		if($cp){
		$i=0;
		foreach($cp as $c){
			$this->Mapping->addMap($c,$id,$plo[$i],$prg[$i]);
			$i+=1;
		}
		}

		$cco = $this->input->post('cco');
		$chap = $this->input->post('chap');
		if($cco){
		$i=0;
		foreach($cco as $cc){
			$cloID = $this->Clo->getCLOID($cc,$id);
			$this->Cco->addCCO($chap[$i],$cloID);
			$i+=1;
		}
		}
		
		$key = $this->input->post('key');
		if($key){
		foreach($key as $k){
			$this->Keyword->addMatch($k,$id);
		}
		}
		
		$nkey = $this->input->post('newkey');
		if($nkey){
		foreach($nkey as $k){
			$success=$this->Keyword->addKeyword($k);
			
			if($success){
				$kid=$this->Keyword->getKeyID($k);
				$this->Keyword->addMatch($kid[0]->KeyID,$id);
			}
		}
		}
		
		$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
		$data['COURSE'] = $this->Course->getCourse($this->input->post('code'));
		$data['CLO'] = $this->Clo->getClobyCrs($this->input->post('code'));
		$data['CCO'] = $this->Cco->getCcobyCrs($this->input->post('code'));
		$data['MAPPING'] = $this->Mapping->getMapbyCrs($this->input->post('code'));
		$data['KEY'] = $this->Keyword->getKeyword($this->input->post('code'));
		$data['AKW'] = $this->Keyword->getAllKeyword();
		
		$this->load->view('edit_crs_view',$data);
		}
	}
}