<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stf_acc extends CI_Controller {
	
	public function __construct() {
    
    parent::__construct();

    $this->load->model('Staff','',TRUE);
	$this->load->helper('form');
	$this->load->helper('url');
	$this->load->library('session');
	}
	
	public function index($id)
	{
		$query = $this->Staff->getStaff($this->uri->segment('3'));
		$data['STAFF'] = $query;
		

		$this->load->view('stf_acc_view',$data);
	}
	
		
		
}