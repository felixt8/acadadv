<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pipe extends CI_Controller {
	
	function __construct(){
	parent::__construct();
	$this->load->model('Faculty','',TRUE);
	$this->load->model('Pipeline','',TRUE);
	$this->load->model('Course','',TRUE);
	$this->load->model('Keyword','',TRUE);
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
	}
	
	public function index(){
		$this->load->view('index');	
	}
	
	public function pipe(){
		$postData=$this->input->post();
		$data=$this->Pipeline->filter($postData);
		
		echo json_encode($data);
	}
	
	public function tfidf(){
		$ky = $this->input->post('kw');
		$postData['keyword']= implode(",",$ky);
		$postData['keyword']= str_replace(" ","_",$postData['keyword']);
		
		$prog = $this->input->post('prog');
		$course= $this->Course->getAllEleCrsbyPrg($prog);
		
		$keyword="";
		$cs="";
		
		$x= count($course);
		$y= 0;
		
		foreach($course as $crs){
			$kw= $this->Keyword->getKeyword($crs->CrsID);
			$n= count($kw);
			$i= 0;
			foreach($kw as $k){
				if(++$i == $n){
					$keyword.= $k->Keyword;
				}else{
					$keyword.= $k->Keyword . ",";
				}
			}
			if(++$y == $x){
				$cs.= $crs->CrsID;
			}else{
				$cs.= $crs->CrsID . ",";
				$keyword.= ".";
			}
		}
		
		$postData['course']= $cs;
		$postData['crskw']= $keyword;
		$postData['crskw']= str_replace(" ","_",$postData['crskw']);
		
		$data=$this->Pipeline->tfidf($postData);
		
		$result=[];
		$i=0;
		while($i<count($data)){
			foreach($course as $crs){
				if($crs->CrsID == $data[$i]){
					array_push($result, $crs->CrsID);
					array_push($result, $crs->CrsName);
					array_push($result, $data[$i+1]);
				}
			}
			$i+=2;
		}
		
		echo json_encode($result);
	}
}