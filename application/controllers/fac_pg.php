<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fac_pg extends CI_Controller {

	public function __construct() {
    
    parent::__construct();

    $this->load->model('Faculty','',TRUE);
	$this->load->model('Programme','',TRUE);
	$this->load->helper('url');
	}
	
	public function index($facId)
	{
		$query = $this->Faculty->getFaculty($this->uri->segment('3'));
		$query2 = $this->Programme->getAllProgramme($this->uri->segment('3'));
		if($query){
		$data['FACULTY'] = $query;
		$data['PROGRAMME'] = $query2;
		}
		$this->load->view('fac_pg_view',$data);
	}
}