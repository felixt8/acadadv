<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Del_prg extends CI_Controller {


	function __construct(){
		parent::__construct();

		$this->load->model('Admin','',TRUE);
		$this->load->model('Faculty','',TRUE);
		$this->load->model('Course','',TRUE);
		$this->load->model('Programme','',TRUE);
		$this->load->model('Including','',TRUE);
		$this->load->model('Mapping','',TRUE);
		$this->load->model("PrgObj");  
		$this->load->model("Plo"); 
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}
	
	public function index()
	{
		$data['FACULTY'] = $this->Faculty->getFaculty($this->uri->segment('3'));
  		$data['ADMIN'] = $this->Admin->getAdmin($this->uri->segment('4'));
		$data['PROGRAMME'] = $this->Programme->getPrgbyFac($this->uri->segment('3'));
		$data['COURSE'] = $this->Course->getCrsbyFac($this->uri->segment('3'));

 		$this->load->view('edit_fac_view', $data);
	}

	public function del_programme(){   
        
		$fid=$this->uri->segment(4);
		$aid=$this->uri->segment(5);
		$this->PrgObj->delete_objbyPrg($this->uri->segment(3)); 
		$this->Including->delInc($this->uri->segment(3)); 
		$this->Mapping->delMapbyPrg($this->uri->segment(3)); 
		$this->Plo->delPLO($this->uri->segment(3)); 
        $this->Programme->delete_programme($this->uri->segment(3));  
        redirect(base_url() ."Del_prg/index/$fid/$aid");  
    }  

}