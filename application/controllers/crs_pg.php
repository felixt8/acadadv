<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crs_pg extends CI_Controller {

	public function __construct() {
    
    parent::__construct();
	$this->load->model('Programme','',TRUE);
	$this->load->model('Course','',TRUE);
	$this->load->model('Clo','',TRUE);
	$this->load->model('Cco','',TRUE);
	$this->load->model('Mapping','',TRUE);
	$this->load->helper('url');
	}
	
	public function index($crsId)
	{
		$data['PROG'] = $this->Programme->getProgramme($this->uri->segment('4'));
		$data['COURSE'] = $this->Course->getCourse($this->uri->segment('3'));
		$data['CLO'] = $this->Clo->getCLObyCrs($this->uri->segment('3'));
		$data['MAP'] = $this->Mapping->getMapByCrsPrg($this->uri->segment('3'),$this->uri->segment('4'));
		$data['CCO'] = $this->Cco->getCcobyCrs($this->uri->segment('3'),$this->uri->segment('4'));
		
		
		
		$this->load->view('crs_pg_view',$data);
	}
}