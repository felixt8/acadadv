<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adm_acc extends CI_Controller {
	public function __construct() {
    
    parent::__construct();

    $this->load->model('Admin','',TRUE);
	$this->load->helper('form');
	$this->load->helper('url');
	$this->load->library('session');
	}
	
	public function index($id)
	{
		$query = $this->Admin->getAdmin($this->uri->segment('3'));
		$data['ADMIN'] = $query;
		
	
		$this->load->view('adm_acc_view',$data);
	}
	
	
}