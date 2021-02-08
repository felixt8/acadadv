<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SDel_crs extends CI_Controller {


	function __construct(){
		parent::__construct();

		$this->load->model('Staff','',TRUE);
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
		$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('3'));
  		$data['STAFF'] = $this->Staff->getStaff($this->uri->segment('4'));
		$data['PROGRAMME'] = $this->Programme->getPrgbyFac($this->uri->segment('3'));
		$data['COURSE'] = $this->Course->getCrsbyFac($this->uri->segment('3'));
		
 		$this->load->view('sedit_fac_view', $data);
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
        redirect(base_url() ."SDel_crs/index/$fid/$aid");  
    }  

}