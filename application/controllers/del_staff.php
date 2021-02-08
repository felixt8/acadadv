<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Del_staff extends CI_Controller {


	function __construct(){
		parent::__construct();

		$this->load->model('Admin','',TRUE);
		$this->load->model('Staff','',TRUE);
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}
	
	public function index()
	{
		$query = $this->Staff->getAllStaff();
  		$query2 = $this->Admin->getAdmin($this->uri->segment(3));
		
   		$data['STAFF'] = $query;
		$data['ADMIN'] = $query2;
		
 		$this->load->view('stf_list_view', $data);
	}

	public function delete_staff(){   
           $this->load->model("Staff");  
		   $id=$this->uri->segment(4);
           $this->Staff->delete_staff($this->uri->segment(3));  
           redirect(base_url() . "Del_staff/index/$id");  
    }  

}