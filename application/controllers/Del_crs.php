<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Del_crs extends CI_Controller {


	function __construct(){
		parent::__construct();

		$this->load->model('Admin','',TRUE);
		$this->load->model('Faculty','',TRUE);
		$this->load->model('Course','',TRUE);
		$this->load->model('Programme','',TRUE);
		$this->load->model('Mapping','',TRUE);
		$this->load->model('Including','',TRUE);
		$this->load->model('Keyword','',TRUE);
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}
	
	public function index()
	{
		$query = $this->Faculty->getFaculty($this->uri->segment('3'));
  		$query2 = $this->Admin->getAdmin($this->uri->segment('4'));
		$query3 = $this->Programme->getPrgbyFac($this->uri->segment('3'));
		$query4 = $this->Course->getCrsbyFac($this->uri->segment('3'));
   		$data['FACULTY'] = $query;
		$data['ADMIN'] = $query2;
		$data['PROGRAMME'] = $query3;
		$data['COURSE'] = $query4;
		
 		$this->load->view('edit_fac_view', $data);
	}

	public function del_course(){   
        $this->load->model("Course");  
		$this->load->model("Clo");  
		$this->load->model("Cco");  
		$fid=$this->uri->segment(4);
		$aid=$this->uri->segment(5);
		$this->Including->delIncbyCrs($this->uri->segment(3)); 
		$this->Mapping->delMap($this->uri->segment(3)); 
		$this->Cco->delCCO($this->uri->segment(3)); 
		$this->Clo->delCLO($this->uri->segment(3)); 
		$this->Keyword->delMatch($this->uri->segment(3)); 
        $this->Course->delete_course($this->uri->segment(3));  
        redirect(base_url() ."Del_crs/index/$fid/$aid");  
    }  

}