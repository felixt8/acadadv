<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Del_fac extends CI_Controller {


	function __construct(){
		parent::__construct();

		$this->load->model('Admin','',TRUE);
		$this->load->model('Faculty','',TRUE);
		$this->load->model('Mapping','',TRUE);
		$this->load->model('Cco','',TRUE);
		$this->load->model('Clo','',TRUE);
		$this->load->model('Keyword','',TRUE);
		$this->load->model('Course','',TRUE);
		$this->load->model('PrgObj','',TRUE);
		$this->load->model('Including','',TRUE);
		$this->load->model('Plo','',TRUE);
		$this->load->model('Programme','',TRUE);
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}
	
	public function index()
	{
		$query = $this->Faculty->getAllFaculty();
  		$query2 = $this->Admin->getAdmin($this->uri->segment('3'));
		
   		$data['FACULTY'] = $query;
		$data['ADMIN'] = $query2;
		
 		$this->load->view('fac_list_view', $data);
	}

	public function del_faculty(){   
        $this->load->model("Faculty");  
		$id=$this->uri->segment(4);
		
		//Course
		$this->Mapping->delMapbyFac($this->uri->segment(3)); 
		$this->Including->delIncbyFac($this->uri->segment(3)); 
		$this->Cco->delCCObyFac($this->uri->segment(3)); 
		$this->Clo->delCLObyFac($this->uri->segment(3)); 
		$this->Keyword->delMatchbyFac($this->uri->segment(3)); 
        $this->Course->delCrsbyFac($this->uri->segment(3));
		
		//Programme
		$this->PrgObj->delObjbyFac($this->uri->segment(3)); 
		$this->Including->delIncbyFac($this->uri->segment(3)); 
		$this->Mapping->delMapbyPrgFac($this->uri->segment(3)); 
		$this->Plo->delPLObyFac($this->uri->segment(3)); 
        $this->Programme->delPrgbyFac($this->uri->segment(3));
		
		
        $this->Faculty->delete_faculty($this->uri->segment(3));  
        redirect(base_url() ."Del_fac/index/$id");  
    }  

}