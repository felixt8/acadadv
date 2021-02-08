<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SEdit_fac extends CI_Controller {
	
	public function __construct() {
    
    parent::__construct();

    $this->load->model('Faculty','',TRUE);
	$this->load->model('Programme','',TRUE);
	$this->load->model('Course','',TRUE);
	$this->load->model('Staff','',TRUE);
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
	}
	
	
	public function index($id)
	{
		$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('3'));
		$data['PROGRAMME'] = $this->Programme->getPrgbyFac($this->uri->segment('3'));
		$data['COURSE'] = $this->Course->getCrsbyFac($this->uri->segment('3'));
		$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('4'));
		
		
		$this->load->view('sedit_fac_view',$data);
	}
}