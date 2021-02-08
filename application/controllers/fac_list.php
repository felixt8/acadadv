<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fac_list extends CI_Controller {
	
	public function __construct() {
    
    parent::__construct();

    $this->load->model('Faculty','',TRUE);
	$this->load->model('Admin','',TRUE);
	$this->load->helper('url');
	}
	
	
	public function index()
	{
		$data['FACULTY'] = $this->Faculty->getAllFaculty();
		$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
		
		
		$this->load->view('fac_list_view',$data);
	}
	
	public function delFac(){  
           $id = $this->uri->segment(3);  
           $this->load->model("Faculty");  
           $this->Faculty->delFac($id);  
           redirect(base_url() . "Fac_list/deleted");  
    } 

	public function deleted()  
    {  
           $this->index();  
    } 

}