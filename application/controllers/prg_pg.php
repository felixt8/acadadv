<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class prg_pg extends CI_Controller {

	public function __construct() {
    
    parent::__construct();
	
	$this->load->model('Faculty','',TRUE);
	$this->load->model('Programme','',TRUE);
	$this->load->model('PrgObj','',TRUE);
	$this->load->model('Plo','',TRUE);
	$this->load->model('Course','',TRUE);
	$this->load->helper('url');
	}
	
	public function index($facId,$prgId)
	{
		$query = $this->Faculty->getFaculty($this->uri->segment('3'));
		$query2 = $this->Programme->getProgramme($this->uri->segment('4'));
		$query3 = $this->PrgObj->getPrgObj($this->uri->segment('4'));
		$query4 = $this->Plo->getPLO($this->uri->segment('4'));
		
	
		$queryS1U = $this->Course->getCourseByPS($this->uri->segment('4'),1,'university');
		$queryS2U = $this->Course->getCourseByPS($this->uri->segment('4'),2,'university');
		$queryS3U = $this->Course->getCourseByPS($this->uri->segment('4'),3,'university');
		$queryS4U = $this->Course->getCourseByPS($this->uri->segment('4'),4,'university');
		$queryS5U = $this->Course->getCourseByPS($this->uri->segment('4'),5,'university');
		$queryS6U = $this->Course->getCourseByPS($this->uri->segment('4'),6,'university');
		$queryS7U = $this->Course->getCourseByPS($this->uri->segment('4'),7,'university');
		$queryS8U = $this->Course->getCourseByPS($this->uri->segment('4'),8,'university');
		
		$queryS1L = $this->Course->getCourseByPS($this->uri->segment('4'),1,'language');
		$queryS2L = $this->Course->getCourseByPS($this->uri->segment('4'),2,'language');
		$queryS3L = $this->Course->getCourseByPS($this->uri->segment('4'),3,'language');
		$queryS4L = $this->Course->getCourseByPS($this->uri->segment('4'),4,'language');
		$queryS5L = $this->Course->getCourseByPS($this->uri->segment('4'),5,'language');
		$queryS6L = $this->Course->getCourseByPS($this->uri->segment('4'),6,'language');
		$queryS7L = $this->Course->getCourseByPS($this->uri->segment('4'),7,'language');
		$queryS8L = $this->Course->getCourseByPS($this->uri->segment('4'),8,'language');
		
		$queryS1C = $this->Course->getCourseByPS($this->uri->segment('4'),1,'cocurr');
		$queryS2C = $this->Course->getCourseByPS($this->uri->segment('4'),2,'cocurr');
		$queryS3C = $this->Course->getCourseByPS($this->uri->segment('4'),3,'cocurr');
		$queryS4C = $this->Course->getCourseByPS($this->uri->segment('4'),4,'cocurr');
		$queryS5C = $this->Course->getCourseByPS($this->uri->segment('4'),5,'cocurr');
		$queryS6C = $this->Course->getCourseByPS($this->uri->segment('4'),6,'cocurr');
		$queryS7C = $this->Course->getCourseByPS($this->uri->segment('4'),7,'cocurr');
		$queryS8C = $this->Course->getCourseByPS($this->uri->segment('4'),8,'cocurr');
		
		$queryS1F = $this->Course->getCourseByPS($this->uri->segment('4'),1,'faculty');
		$queryS2F = $this->Course->getCourseByPS($this->uri->segment('4'),2,'faculty');
		$queryS3F = $this->Course->getCourseByPS($this->uri->segment('4'),3,'faculty');
		$queryS4F = $this->Course->getCourseByPS($this->uri->segment('4'),4,'faculty');
		$queryS5F = $this->Course->getCourseByPS($this->uri->segment('4'),5,'faculty');
		$queryS6F = $this->Course->getCourseByPS($this->uri->segment('4'),6,'faculty');
		$queryS7F = $this->Course->getCourseByPS($this->uri->segment('4'),7,'faculty');
		$queryS8F = $this->Course->getCourseByPS($this->uri->segment('4'),8,'faculty');
		
		$queryS1P = $this->Course->getCourseByPS($this->uri->segment('4'),1,'programme');
		$queryS2P = $this->Course->getCourseByPS($this->uri->segment('4'),2,'programme');
		$queryS3P = $this->Course->getCourseByPS($this->uri->segment('4'),3,'programme');
		$queryS4P = $this->Course->getCourseByPS($this->uri->segment('4'),4,'programme');
		$queryS5P = $this->Course->getCourseByPS($this->uri->segment('4'),5,'programme');
		$queryS6P = $this->Course->getCourseByPS($this->uri->segment('4'),6,'programme');
		$queryS7P = $this->Course->getCourseByPS($this->uri->segment('4'),7,'programme');
		$queryS8P = $this->Course->getCourseByPS($this->uri->segment('4'),8,'programme');
		
		$queryS1I = $this->Course->getCourseByPS($this->uri->segment('4'),1,'industry');
		$queryS2I = $this->Course->getCourseByPS($this->uri->segment('4'),2,'industry');
		$queryS3I = $this->Course->getCourseByPS($this->uri->segment('4'),3,'industry');
		$queryS4I = $this->Course->getCourseByPS($this->uri->segment('4'),4,'industry');
		$queryS5I = $this->Course->getCourseByPS($this->uri->segment('4'),5,'industry');
		$queryS6I = $this->Course->getCourseByPS($this->uri->segment('4'),6,'industry');
		$queryS7I = $this->Course->getCourseByPS($this->uri->segment('4'),7,'industry');
		$queryS8I = $this->Course->getCourseByPS($this->uri->segment('4'),8,'industry');
		
		$queryS1E = $this->Course->getCourseByPS($this->uri->segment('4'),1,'elective');
		$queryS2E = $this->Course->getCourseByPS($this->uri->segment('4'),2,'elective');
		$queryS3E = $this->Course->getCourseByPS($this->uri->segment('4'),3,'elective');
		$queryS4E = $this->Course->getCourseByPS($this->uri->segment('4'),4,'elective');
		$queryS5E = $this->Course->getCourseByPS($this->uri->segment('4'),5,'elective');
		$queryS6E = $this->Course->getCourseByPS($this->uri->segment('4'),6,'elective');
		$queryS7E = $this->Course->getCourseByPS($this->uri->segment('4'),7,'elective');
		$queryS8E = $this->Course->getCourseByPS($this->uri->segment('4'),8,'elective');
		

		$data['FACULTY'] = $query;
		$data['PROGRAMME'] = $query2;
		$data['PRGOBJ'] = $query3;
		$data['PLO'] = $query4;
		
		$data['SEM1U'] = $queryS1U;
		$data['SEM2U'] = $queryS2U;
		$data['SEM3U'] = $queryS3U;
		$data['SEM4U'] = $queryS4U;
		$data['SEM5U'] = $queryS5U;
		$data['SEM6U'] = $queryS6U;
		$data['SEM7U'] = $queryS7U;
		$data['SEM8U'] = $queryS8U;
		
		$data['SEM1L'] = $queryS1L;
		$data['SEM2L'] = $queryS2L;
		$data['SEM3L'] = $queryS3L;
		$data['SEM4L'] = $queryS4L;
		$data['SEM5L'] = $queryS5L;
		$data['SEM6L'] = $queryS6L;
		$data['SEM7L'] = $queryS7L;
		$data['SEM8L'] = $queryS8L;
		
		$data['SEM1C'] = $queryS1C;
		$data['SEM2C'] = $queryS2C;
		$data['SEM3C'] = $queryS3C;
		$data['SEM4C'] = $queryS4C;
		$data['SEM5C'] = $queryS5C;
		$data['SEM6C'] = $queryS6C;
		$data['SEM7C'] = $queryS7C;
		$data['SEM8C'] = $queryS8C;
		
		$data['SEM1F'] = $queryS1F;
		$data['SEM2F'] = $queryS2F;
		$data['SEM3F'] = $queryS3F;
		$data['SEM4F'] = $queryS4F;
		$data['SEM5F'] = $queryS5F;
		$data['SEM6F'] = $queryS6F;
		$data['SEM7F'] = $queryS7F;
		$data['SEM8F'] = $queryS8F;
		
		$data['SEM1P'] = $queryS1P;
		$data['SEM2P'] = $queryS2P;
		$data['SEM3P'] = $queryS3P;
		$data['SEM4P'] = $queryS4P;
		$data['SEM5P'] = $queryS5P;
		$data['SEM6P'] = $queryS6P;
		$data['SEM7P'] = $queryS7P;
		$data['SEM8P'] = $queryS8P;
		
		$data['SEM1I'] = $queryS1I;
		$data['SEM2I'] = $queryS2I;
		$data['SEM3I'] = $queryS3I;
		$data['SEM4I'] = $queryS4I;
		$data['SEM5I'] = $queryS5I;
		$data['SEM6I'] = $queryS6I;
		$data['SEM7I'] = $queryS7I;
		$data['SEM8I'] = $queryS8I;
		
		$data['SEM1E'] = $queryS1E;
		$data['SEM2E'] = $queryS2E;
		$data['SEM3E'] = $queryS3E;
		$data['SEM4E'] = $queryS4E;
		$data['SEM5E'] = $queryS5E;
		$data['SEM6E'] = $queryS6E;
		$data['SEM7E'] = $queryS7E;
		$data['SEM8E'] = $queryS8E;

		$this->load->view('prg_pg_view',$data);
	}
}