<?php
class Course extends CI_Model {
	private $crsID;
	private $crsName;
	private $crsCtg;
	private $crsSynopsis;
	private $crsPreq;
	private $crsCredit;
	private $facID;
	private $semester;


function __construct(){
	parent::__construct();
}

public function addCourse($data){
	if($data){
		$value=array(
			'CrsID' => trim($data['CrsID']),
			'CrsName' => trim($data['CrsName']),
			'CrsCtg' => trim($data['CrsCtg']),
			'CrsSynopsis' => trim($data['CrsSynopsis']),
			'CrsCredit' => trim($data['CrsCredit']),
			'CrsPreq' => trim($data['CrsPreq']),
			'FacID' => trim($data['FacID']));
			

		$query = $this->db->get_where('course', array('CrsID' => $data['CrsID']));

		$count = $query->num_rows();

		if($count == 0){
			if($this->db->insert('course', $value)) {
				return true;
			}

			else{
				return false;
			}
		}
	}
}

public function getCourseByPS($prgId,$sem,$ctg) 
{
	$this -> db -> select('including.CrsID,course.CrsName');
	$this -> db -> from('course');
	$this -> db -> join('including', 'including.CrsID = course.CrsID');
	$this -> db -> where('CrsCtg',$ctg);
	$this -> db -> where('PrgID',$prgId);
	$this -> db -> where('Semester',$sem);
	$query = $this -> db -> get();
	

	return $query->result();

}

public function getCourse($crsId) 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$this -> db -> where('CrsID',$crsId);
	$query = $this -> db -> get();
	if($query -> num_rows() == 1)
	{
		return $query->result();
	}
	else{
		return false;
	}
}

public function getAllCourseID() 
{
	$this -> db -> select('CrsID');
	$this -> db -> from('course');
	$query = $this -> db -> get();
	
	return $query->result();
}

public function getAllCourse() 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$query = $this -> db -> get();
	
	return $query->result();
}

public function getAllEleCourse() 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$this -> db -> where('CrsCtg','elective');
	$query = $this -> db -> get();
	
	return $query->result();
}

public function getAllEleCrsbyPrg($prgId) 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$this -> db -> join('including', 'including.CrsID = course.CrsID');
	$this -> db -> where('CrsCtg','elective');
	$this -> db -> where('PrgID',$prgId);
	$query = $this -> db -> get();
	
	return $query->result();
}

public function getCrsbyFac($facId) 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$this -> db -> where('FacID',$facId);
	$query = $this -> db -> get();
	
	return $query->result();

}


public function getUnicbyPrg($prgId) 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$this -> db -> join('including', 'including.CrsID = course.CrsID');
	$this -> db -> where('CrsCtg','university');
	$this -> db -> where('PrgID',$prgId);
	$query = $this -> db -> get();
	
	return $query->result();
}

public function getFaccbyPrg($prgId) 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$this -> db -> join('including', 'including.CrsID = course.CrsID');
	$this -> db -> where('CrsCtg','faculty');
	$this -> db -> where('PrgID',$prgId);
	$query = $this -> db -> get();
	
	return $query->result();
}

public function getPrgcbyPrg($prgId) 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$this -> db -> join('including', 'including.CrsID = course.CrsID');
	$this -> db -> where('CrsCtg','programme');
	$this -> db -> where('PrgID',$prgId);
	$query = $this -> db -> get();
	
	return $query->result();
}


public function getElecbyPrg($prgId) 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$this -> db -> join('including', 'including.CrsID = course.CrsID');
	$this -> db -> where('CrsCtg','elective');
	$this -> db -> where('PrgID',$prgId);
	$query = $this -> db -> get();
	
	return $query->result();
}

public function getUni($facID) 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$this -> db -> where('CrsCtg','university');
	$this -> db -> where('FacID',$facID);
	$query = $this -> db -> get();
	
	return $query->result();
}

public function getFac($facID) 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$this -> db -> where('CrsCtg','faculty');
	$this -> db -> where('FacID',$facID);
	$query = $this -> db -> get();
	
	return $query->result();
}

public function getPrg($facID) 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$this -> db -> where('CrsCtg','programme');
	$this -> db -> where('FacID',$facID);
	$query = $this -> db -> get();
	
	return $query->result();
}

public function getElec($facID) 
{
	$this -> db -> select('*');
	$this -> db -> from('course');
	$this -> db -> where('CrsCtg','elective');
	$this -> db -> where('FacID',$facID);
	$query = $this -> db -> get();
	
	return $query->result();
}



 function delete_course($id){  
    $this->db->where("CrsID", $id);  
    $this->db->delete("course");  
     //DELETE FROM tbl_user WHERE id = $id  
 } 


 function delCrsbyFac($id){  
    $this->db->where("FacID", $id);  
    $this->db->delete("course");  
     //DELETE FROM tbl_user WHERE id = $id  
 } 

//Update staff info by email
function UpdateCrs ($Data){
	$value=array(
	'CrsName' => trim($Data['Name']),
	'CrsCtg'=> trim($Data['Ctg']),
	'CrsSynopsis' => trim($Data['Descrp']),
	'CrsCredit' => trim($Data['Credit']),
	'CrsPreq' => trim($Data['Preq']));
	

	$this -> db -> where('CrsID',$Data['Code']);
	$this -> db -> update('course',$value);

}












}
