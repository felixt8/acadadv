<?php
class Pipeline extends CI_Model {

	function filter($postData){
	$data = array(
		'sentences' => $this->input->post('msg')
    );
	
	$pyscript = 'C:\\xampp\\htdocs\\fyproj\\public\\js\\pipeline.py';
	$python = 'C:\\Users\\Tcwei\\AppData\\Local\\Programs\\Python\\Python38\\python.exe';
	$sent = $data['sentences'];
	$cmd = "$python $pyscript $sent";
	exec("$cmd", $output);
	
	return $output;
	}
	
	function tfidf($postData){
	$data = array(
		'key' => $postData['keyword'],
		'course' => $postData['course'],
		'kw' => $postData['crskw']
    );
	
	$pyscript = 'C:\\xampp\\htdocs\\fyproj\\public\\js\\tfidf.py';
	$python = 'C:\\Users\\Tcwei\\AppData\\Local\\Programs\\Python\\Python38\\python.exe';
	
	$crs = $data['course'];
	$kw = $data['kw'];
	$key = $data['key'];
	$cmd = "$python $pyscript $crs $kw $key";
	exec("$cmd", $output);
	
	return $output;
	}
}
?>