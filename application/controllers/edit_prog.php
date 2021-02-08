<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class edit_prog extends CI_Controller {
	
	public function __construct() {
    
    parent::__construct();

	$this->load->model('Programme','',TRUE);
	$this->load->model('Course','',TRUE);
	$this->load->model('Plo','',TRUE);
	$this->load->model('Including','',TRUE);
	$this->load->model('PrgObj','',TRUE);
	$this->load->model('Admin','',TRUE);
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
	}
	
	public function index($id)
	{
		$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
		$data['PROGRAMME'] = $this->Programme->getProgramme($this->uri->segment('4'));
		$data['PLO'] = $this->Plo->getPLO($this->uri->segment('4'));
		$data['OBJECTIVE'] = $this->PrgObj->getPrgObj($this->uri->segment('4'));
		$data['UNIC'] = $this->Course->getUnicbyPrg($this->uri->segment('4'));
		$data['FACC'] = $this->Course->getFaccbyPrg($this->uri->segment('4'));
		$data['PRGC'] = $this->Course->getPrgcbyPrg($this->uri->segment('4'));
		$data['ELEC'] = $this->Course->getElecbyPrg($this->uri->segment('4'));
		$data['AUNI'] = $this->Course->getUni($this->uri->segment('5'));
		$data['AFAC'] = $this->Course->getFac($this->uri->segment('5'));
		$data['APRG'] = $this->Course->getPrg($this->uri->segment('5'));
		$data['AELE'] = $this->Course->getElec($this->uri->segment('5'));
		
		
		$this->load->view('edit_prog_view',$data);
	}
	
	public function update()
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
			$data['PROGRAMME'] = $this->Programme->getProgramme($this->uri->segment('4'));
			$data['PLO'] = $this->Plo->getPLO($this->uri->segment('4'));
			$data['OBJECTIVE'] = $this->PrgObj->getPrgObj($this->uri->segment('4'));
			$data['UNIC'] = $this->Course->getUnicbyPrg($this->uri->segment('4'));
			$data['FACC'] = $this->Course->getFaccbyPrg($this->uri->segment('4'));
			$data['PRGC'] = $this->Course->getPrgcbyPrg($this->uri->segment('4'));
			$data['ELEC'] = $this->Course->getElecbyPrg($this->uri->segment('4'));
			$data['AUNI'] = $this->Course->getUni($this->uri->segment('5'));
			$data['AFAC'] = $this->Course->getFac($this->uri->segment('5'));
			$data['APRG'] = $this->Course->getPrg($this->uri->segment('5'));
			$data['AELE'] = $this->Course->getElec($this->uri->segment('5'));
			
			$this->load->view('edit_prog_view',$data);
		}
		else{
			
		if(empty($_FILES['pic']['tmp_name']) && !file_exists($_FILES['pic']['tmp_name'])){
			$Data['Code'] = $this->input->post('code');
			$Data['Name'] = $this->input->post('name');
			$Data['Desc'] = $this->input->post('desc');
			$Data['Career'] = $this->input->post('career');
			$Data['Duration'] = $this->input->post('duration');
			$this->Programme->updatePrg($Data);
			
			$this->PrgObj->delObj($this->input->post('code'));
		
			$this->Including->delInc($this->input->post('code'));
			
			$id = $this->input->post('code');
			$obj = $this->input->post('obj');
			if($obj){
			foreach($obj as $ob){
				$this->PrgObj->addObj($ob,$id);
			}
			}
			
			$ploid = $this->input->post('ploid');
			$plo = $this->input->post('plo');
			$descrp = $this->input->post('descrp');
			$ploin = $this->Plo->getPLOID($this->input->post('code'));
			if($ploid){
			$diff = array_diff($ploin,$ploid);
			
			foreach($diff as $dif){
				$this->Plo->delPLObyID($dif);
			}
			//delete diff
			}else{
				$this->Plo->delPLO($Data['Code']);
			}
			
			if($plo){
			$i=0;
			foreach($plo as $index => $pl){
				if(isset($ploid[$index]) && in_array($ploid[$index], $ploin)){
				$this->Plo->updatePLO($pl,$descrp[$index],$ploid[$index]);
				}else{
				$this->Plo->addPLO($pl,$descrp[$index],$id);
				}
				
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
			
			$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
			$data['PROGRAMME'] = $this->Programme->getProgramme($this->uri->segment('4'));
			$data['PLO'] = $this->Plo->getPLO($this->uri->segment('4'));
			$data['OBJECTIVE'] = $this->PrgObj->getPrgObj($this->uri->segment('4'));
			$data['UNIC'] = $this->Course->getUnicbyPrg($this->uri->segment('4'));
			$data['FACC'] = $this->Course->getFaccbyPrg($this->uri->segment('4'));
			$data['PRGC'] = $this->Course->getPrgcbyPrg($this->uri->segment('4'));
			$data['ELEC'] = $this->Course->getElecbyPrg($this->uri->segment('4'));
			$data['AUNI'] = $this->Course->getUni($this->uri->segment('5'));
			$data['AFAC'] = $this->Course->getFac($this->uri->segment('5'));
			$data['APRG'] = $this->Course->getPrg($this->uri->segment('5'));
			$data['AELE'] = $this->Course->getElec($this->uri->segment('5'));
			
			$this->load->view('edit_prog_view',$data);
			
		}else{
			$xt=explode('.',$_FILES['pic']['name']);
			$ext=end($xt);
			$file_ext=strtolower($ext);
			$extensions= array("jpeg","jpg","png");
			
			if(!in_array($file_ext,$extensions)){
				$this->session->set_flashdata('status','<div class="alert alert-danger text-center" style="width:600px"> Error Invalid Input! Please Enter the Info Again!</div>');
				$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
				$data['PROGRAMME'] = $this->Programme->getProgramme($this->uri->segment('4'));
				$data['PLO'] = $this->Plo->getPLO($this->uri->segment('4'));
				$data['OBJECTIVE'] = $this->PrgObj->getPrgObj($this->uri->segment('4'));
				$data['UNIC'] = $this->Course->getUnicbyPrg($this->uri->segment('4'));
				$data['FACC'] = $this->Course->getFaccbyPrg($this->uri->segment('4'));
				$data['PRGC'] = $this->Course->getPrgcbyPrg($this->uri->segment('4'));
				$data['ELEC'] = $this->Course->getElecbyPrg($this->uri->segment('4'));
				$data['AUNI'] = $this->Course->getUni($this->uri->segment('5'));
				$data['AFAC'] = $this->Course->getFac($this->uri->segment('5'));
				$data['APRG'] = $this->Course->getPrg($this->uri->segment('5'));
				$data['AELE'] = $this->Course->getElec($this->uri->segment('5'));
				
				$this->load->view('edit_prog_view',$data);

			}else{
				$Data['Code'] = $this->input->post('code');
				$Data['Name'] = $this->input->post('name');
				$Data['Pic'] = file_get_contents($_FILES['pic']['tmp_name']);
				$Data['Desc'] = $this->input->post('desc');
				$Data['Career'] = $this->input->post('career');
				$Data['Duration'] = $this->input->post('duration');
				$this->Programme->updatePrg2($Data);
				
				$this->PrgObj->delObj($this->input->post('code'));
				
				$this->Including->delInc($this->input->post('code'));
				
				$id = $this->input->post('code');
				$obj = $this->input->post('obj');
				if($obj){
				foreach($obj as $ob){
					$this->PrgObj->addObj($ob,$id);
				}
				}
				
				$ploid = $this->input->post('ploid');
				$plo = $this->input->post('plo');
				$descrp = $this->input->post('descrp');
				$ploin = $this->Plo->getPLOID($this->input->post('code'));
				$diff = array_diff($ploin,$ploid);
				
				foreach($diff as $dif){
					$this->Plo->delPLObyID($dif);
				}
				//delete diff
				if($plo){
				$i=0;
				foreach($plo as $index => $pl){
					if(isset($ploid[$index]) && in_array($ploid[$index], $ploin)){
					$this->Plo->updatePLO($pl,$descrp[$index],$ploid[$index]);
					}else{
					$this->Plo->addPLO($pl,$descrp[$index],$id);
					}
					
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
				
				$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
				$data['PROGRAMME'] = $this->Programme->getProgramme($this->uri->segment('4'));
				$data['PLO'] = $this->Plo->getPLO($this->uri->segment('4'));
				$data['OBJECTIVE'] = $this->PrgObj->getPrgObj($this->uri->segment('4'));
				$data['UNIC'] = $this->Course->getUnicbyPrg($this->uri->segment('4'));
				$data['FACC'] = $this->Course->getFaccbyPrg($this->uri->segment('4'));
				$data['PRGC'] = $this->Course->getPrgcbyPrg($this->uri->segment('4'));
				$data['ELEC'] = $this->Course->getElecbyPrg($this->uri->segment('4'));
				$data['AUNI'] = $this->Course->getUni($this->uri->segment('5'));
				$data['AFAC'] = $this->Course->getFac($this->uri->segment('5'));
				$data['APRG'] = $this->Course->getPrg($this->uri->segment('5'));
				$data['AELE'] = $this->Course->getElec($this->uri->segment('5'));
				
				
				$this->load->view('edit_prog_view',$data);
			}
		}
		
		
	}
	}
}