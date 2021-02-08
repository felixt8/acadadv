<?php
class Programme extends CI_Model {
	private $prgID;
	private $prgName;
	private $prgPic;
	private $prgLink;


function __construct(){
	parent::__construct();
}

public function getProgramme($prgId) 
{
	$this -> db -> select('*');
	$this -> db -> from('programme');
	$this -> db -> where('PrgID',$prgId);
	$query = $this -> db -> get();
	if($query -> num_rows() == 1)
	{
		return $query->result();
	}
	else{
		return false;
	}
}

public function getPrgbyFac($facId) 
{
	$this -> db -> select('*');
	$this -> db -> from('programme');
	$this -> db -> where('FacID',$facId);
	$query = $this -> db -> get();
	
	return $query->result();

}


public function getAllProgramme($facId) 
{
	$this -> db -> select('*');
	$this -> db -> from('programme');
	$this -> db -> where('FacID',$facId);
	$query = $this -> db -> get();
	return $query->result();
}


public function addProgramme($data){
	if($data){
		$value=array(
			'PrgID' => trim($data['PrgID']),
			'PrgName' => trim($data['PrgName']),
			'PrgDesc' => trim($data['PrgDesc']),
			'PrgProspect' => trim($data['PrgProspect']),
			'PrgDuration' => trim($data['PrgDuration']),
			'FacID' => $data['FacID']);
			

		$query = $this->db->get_where('programme', array('PrgID' => $data['PrgID']));

		$count = $query->num_rows();

		if($count == 0){
			if($this->db->insert('programme', $value)) {
				return true;
			}

			else{
				return false;
			}
		}
	}
}

public function addProgramme2($data){
	if($data){
		$value=array(
			'PrgID' => trim($data['PrgID']),
			'PrgPic' => trim($data['PrgPic']),
			'PrgName' => trim($data['PrgName']),
			'PrgDesc' => trim($data['PrgDesc']),
			'PrgProspect' => trim($data['PrgProspect']),
			'PrgDuration' => trim($data['PrgDuration']),
			'FacID' => $data['FacID']);
			

		$query = $this->db->get_where('programme', array('PrgID' => $data['PrgID']));

		$count = $query->num_rows();

		if($count == 0){
			if($this->db->insert('programme', $value)) {
				return true;
			}

			else{
				return false;
			}
		}
	}
}

 function delete_programme($id){  
    $this->db->where("PrgID", $id);  
    $this->db->delete("programme");  
     //DELETE FROM tbl_user WHERE id = $id  
 } 
 
  function delPrgbyFac($id){  
    $this->db->where("FacID", $id);  
    $this->db->delete("programme");  
     //DELETE FROM tbl_user WHERE id = $id  
 } 

function updatePrg ($Data){
	$value=array(
	'PrgName' => $Data['Name'],
	'PrgDesc' => $Data['Desc'],
	'PrgProspect' => $Data['Career'],
	'PrgDuration' => $Data['Duration']);
	

	$this -> db -> where('PrgID',$Data['Code']);
	$this -> db -> update('programme',$value);

}


function updatePrg2 ($Data){
	$value=array(
	'PrgName' => $Data['Name'],
	'PrgPic'=> $Data['Pic'],
	'PrgDesc' => $Data['Desc'],
	'PrgProspect' => $Data['Career'],
	'PrgDuration' => $Data['Duration']);
	

	$this -> db -> where('PrgID',$Data['Code']);
	$this -> db -> update('programme',$value);

}



}
