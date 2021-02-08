<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sadd_prog extends CI_Controller {
	
	public function __construct() {
    
    parent::__construct();

	$this->load->model('Programme','',TRUE);
	$this->load->model('Staff','',TRUE);
	$this->load->model('Faculty','',TRUE);
	$this->load->model('PrgObj','',TRUE);
	$this->load->model('Course','',TRUE);
	$this->load->model('Plo','',TRUE);
	$this->load->model('Including','',TRUE);
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
	}
	
	public function index($id)
	{
		$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('3'));
		$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('4'));
		$data['AUNI'] = $this->Course->getUni($this->uri->segment('4'));
		$data['AFAC'] = $this->Course->getFac($this->uri->segment('4'));
		$data['APRG'] = $this->Course->getPrg($this->uri->segment('4'));
		$data['AELE'] = $this->Course->getElec($this->uri->segment('4'));
		
		$this->load->view('sadd_prog_view',$data);
	}
	
	
	function addPrg($id){
		//form validation
		$this->load->library('form_validation');
		$data['content'] = "Register_form"; 
		$this->form_validation->set_rules('code','Code','trim|required');
		$this->form_validation->set_rules('name','Name','trim|required');
		
		$this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');
		if($this->form_validation->run() == FALSE){
			//Field Validation failed. User redirected to login page
			$this->session->set_flashdata('status','<div class="alert alert-danger text-center" style="width:600px"> Error! Please Enter the Info Again!</div>');
			$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('3'));
			$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('4'));
			$data['AUNI'] = $this->Course->getUni($this->uri->segment('4'));
			$data['AFAC'] = $this->Course->getFac($this->uri->segment('4'));
			$data['APRG'] = $this->Course->getPrg($this->uri->segment('4'));
			$data['AELE'] = $this->Course->getElec($this->uri->segment('4'));
			
			$this->load->view('sadd_prog_view',$data);
		}
		else{
		
		if(empty($_FILES['pic']['tmp_name']) && !file_exists($_FILES['pic']['tmp_name'])){
			$Data['PrgID'] = $this->input->post('code');
			$Data['PrgName'] = $this->input->post('name');
			$Data['PrgDesc'] = $this->input->post('desc');
			$Data['PrgProspect'] = $this->input->post('career');
			$Data['PrgDuration'] = $this->input->post('duration');
			$Data['FacID'] = $this->uri->segment('4');
			
			$this->Programme->addProgramme($Data);
			
			$id = $this->input->post('code');
			$obj = $this->input->post('obj');
			if($obj){
			$i=0;
			foreach($obj as $ob){
				$this->PrgObj->addObj($obj[$i],$id);
				$i+=1;
			}
			}
			
			$plo = $this->input->post('plo');
			$descrp = $this->input->post('descrp');
			if($plo){
			$i=0;
			foreach($plo as $pl){
				$this->Plo->addPLO($pl,$descrp[$i],$id);
				$i+=1;
			}
			}
			
			$uni = $this->input->post('uni');
			$usem = $this->input->post('usem');
			if($uni){
			$i=0;
			foreach($uni as $u){
				$this->Including->addInc($u,$usem[$i],$id);
				$i+=1;
			}
			}
			
			$fac = $this->input->post('fac');
			$fsem = $this->input->post('fsem');
			if($fac){
			$i=0;
			foreach($fac as $f){
				$this->Including->addInc($f,$fsem[$i],$id);
				$i+=1;
			}
			}
			
			$prg = $this->input->post('prg');
			$psem = $this->input->post('psem');
			if($prg){
			$i=0;
			foreach($prg as $p){
				$this->Including->addInc($p,$psem[$i],$id);
				$i+=1;
			}
			}
			
			$ele = $this->input->post('ele');
			$esem = $this->input->post('esem');
			if($ele){
			$i=0;
			foreach($ele as $e){
				$this->Including->addInc($e,$esem[$i],$id);
				$i+=1;
			}
			}
			
			$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('4'));
			$data['PROGRAMME'] = $this->Programme->getPrgbyFac($this->uri->segment('4'));
			$data['COURSE'] = $this->Course->getCrsbyFac($this->uri->segment('4'));
			$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('3'));
			
			
			$this->load->view('sedit_fac_view',$data);
		}else{
			$xt=explode('.',$_FILES['pic']['name']);
			$ext=end($xt);
			$file_ext=strtolower($ext);
			$extensions= array("jpeg","jpg","png");
			
			if(!in_array($file_ext,$extensions)){
				$this->session->set_flashdata('status','<div class="alert alert-danger text-center" style="width:600px"> Error Invalid Input! Please Enter the Info Again!</div>');
				$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('3'));
				$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('4'));
				$data['AUNI'] = $this->Course->getUni($this->uri->segment('4'));
				$data['AFAC'] = $this->Course->getFac($this->uri->segment('4'));
				$data['APRG'] = $this->Course->getPrg($this->uri->segment('4'));
				$data['AELE'] = $this->Course->getElec($this->uri->segment('4'));
				
				$this->load->view('sadd_prog_view',$data);
				
			}else{
				$Data['PrgID'] = $this->input->post('code');
				$Data['PrgName'] = $this->input->post('name');
				$Data['PrgDesc'] = $this->input->post('desc');
				$Data['PrgProspect'] = $this->input->post('career');
				$Data['PrgDuration'] = $this->input->post('duration');
				$Data['FacID'] = $this->uri->segment('4');
				$Data['PrgPic'] = file_get_contents($_FILES['pic']['tmp_name']);
				$this->Programme->addProgramme2($Data);
				
					
				$id = $this->input->post('code');
				$obj = $this->input->post('obj');
				if($obj){
				$i=0;
				foreach($obj as $ob){
					$this->PrgObj->addObj($obj[$i],$id);
					$i+=1;
				}
				}
				
				$plo = $this->input->post('plo');
				$descrp = $this->input->post('descrp');
				if($plo){
				$i=0;
				foreach($plo as $pl){
					$this->Plo->addPLO($pl,$descrp[$i],$id);
					$i+=1;
				}
				}
				
				$uni = $this->input->post('uni');
				$usem = $this->input->post('usem');
				if($uni){
				$i=0;
				foreach($uni as $u){
					$this->Including->addInc($u,$usem[$i],$id);
					$i+=1;
				}
				}
				
				$fac = $this->input->post('fac');
				$fsem = $this->input->post('fsem');
				if($fac){
				$i=0;
				foreach($fac as $f){
					$this->Including->addInc($f,$fsem[$i],$id);
					$i+=1;
				}
				}
				
				$prg = $this->input->post('prg');
				$psem = $this->input->post('psem');
				if($prg){
				$i=0;
				foreach($prg as $p){
					$this->Including->addInc($p,$psem[$i],$id);
					$i+=1;
				}
				}
				
				$ele = $this->input->post('ele');
				$esem = $this->input->post('esem');
				if($ele){
				$i=0;
				foreach($ele as $e){
					$this->Including->addInc($e,$esem[$i],$id);
					$i+=1;
				}
				}
				
				$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('4'));
				$data['PROGRAMME'] = $this->Programme->getPrgbyFac($this->uri->segment('4'));
				$data['COURSE'] = $this->Course->getCrsbyFac($this->uri->segment('4'));
				$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('3'));
				
				
				$this->load->view('sedit_fac_view',$data);
			}
			
		}
		
		}
	}
}