<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stf_list extends CI_Controller {
	
	public function __construct() {
    
    parent::__construct();

    $this->load->model('Staff','',TRUE);
	$this->load->model('Admin','',TRUE);
	$this->load->helper('url');
	}
	
	
	public function index()
	{
		$data['STAFF'] = $this->Staff->getAllStaff();
		$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('3'));
		
		
		$this->load->view('stf_list_view',$data);
	}
	
	public function delStf(){  
           $id = $this->uri->segment(3);  
           $this->load->model("Staff");  
           $this->Faculty->delFac($id);  
           redirect(base_url() . "Stf_list/deleted");  
    } 

	public function deleted()  
    {  
           $this->index();  
    } 

}