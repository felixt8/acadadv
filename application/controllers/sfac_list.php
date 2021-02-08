<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SFac_list extends CI_Controller {
	
	public function __construct() {
    
    parent::__construct();

    $this->load->model('Faculty','',TRUE);
	$this->load->model('Staff','',TRUE);
	$this->load->helper('url');
	}
	
	
	public function index($id)
	{
		$query = $this->Faculty->getFacultybyStf($this->uri->segment('3'));
		$query2 = $this->Staff->getStaff($this->uri->segment('3'));
		$data['FACULTY'] = $query;
		$data['STAFF'] = $query2;
		$this->load->view('sfac_list_view',$data);
	}

}