<?php
class Faculty extends CI_Model {
	private $facID;
	private $facName;
	private $facPic;
	private $facLink;


function __construct(){
	parent::__construct();
}


public function getFaculty($facId) 
{
	$this -> db -> select('*');
	$this -> db -> from('faculty');
	$this -> db -> where('FacID',$facId);
	$query = $this -> db -> get();
	if($query -> num_rows() == 1)
	{
		return $query->result();
	}

	else{
		return false;
	}
}

public function getFacultybyStf($stfId) 
{
	$this -> db -> select('faculty.FacID,faculty.FacName');
	$this -> db -> from('faculty');
	$this -> db -> join('staff', 'staff.FacID = faculty.FacID');
	$this -> db -> where('StfID',$stfId);
	$query = $this -> db -> get();
	if($query -> num_rows() == 1)
	{
		return $query->result();
	}

	else{
		return false;
	}
}

public function getAllFaculty() 
{
	$this -> db -> select('*');
	$this -> db -> from('faculty');
	$query = $this -> db -> get();
	return $query->result();
}


 function delete_faculty($id){  
    $this->db->where("FacID", $id);  
    $this->db->delete("faculty");  
     //DELETE FROM tbl_user WHERE id = $id  
 } 

public function addFaculty($data){
	if($data){
		$value=array(
			'FacName' => trim($data['FacName']),
			'FacLink' => trim($data['Link']));

		$query = $this->db->get_where('Faculty', array('FacName' => $data['FacName']));

		$count = $query->num_rows();

		if($count == 0){
			if($this->db->insert('Faculty', $value)) {
				return true;
			}

			else{
				return false;
			}
		}
	}
} 

public function addFaculty2($data){
	if($data){
		$value=array(
			'FacName' => trim($data['FacName']),
			'FacPic' => trim($data['FacPic']),
			'FacLink' => trim($data['Link']));

		$query = $this->db->get_where('Faculty', array('FacName' => $data['FacName']));

		$count = $query->num_rows();

		if($count == 0){
			if($this->db->insert('Faculty', $value)) {
				return true;
			}

			else{
				return false;
			}
		}
	}
} 

function updateFaculty($data){

	$data=array(
		'FacID' => trim($data['FacID']),
		'FacName' => trim($data['FacName']),
		'FacLink' => trim($data['Link']));

	$this->db->where('FacID', $data['FacID']);
	if ($this ->db->update('faculty', $data)) {
		//echo'update success';
		return true;
	}

	else{
		return false;
		//echo'update error';
	}

}

function updateFaculty2($data){

	$data=array(
		'FacID' => trim($data['FacID']),
		'FacName' => trim($data['FacName']),
		'FacPic' => trim($data['FacPic']),
		'FacLink' => trim($data['Link']));

	$this->db->where('FacID', $data['FacID']);
	if ($this ->db->update('faculty', $data)) {
		//echo'update success';
		return true;
	}

	else{
		return false;
		//echo'update error';
	}

}

}
