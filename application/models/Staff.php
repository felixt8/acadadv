<?php
class Staff extends CI_Model {
	private $stfID;
	private $stfName;
	private $stfIC;
	private $stfPwd;
	private $stfEmail;



function __construct(){
	parent::__construct();
}

public function addStaff($data){
	if($data){
		$value=array(
			'StfID' => trim($data['StfID']),
			'StfPwd' => trim($data['StfPwd']),
			'FacID' => trim($data['FacID']));

		$query = $this->db->get_where('Staff', array('StfID' => $data['StfID']));

		$count = $query->num_rows();

		if($count == 0){
			if($this->db->insert('Staff', $value)) {
				return true;
			}

			else{
				return false;
			}
		}
	}
}

function stfLogin($id, $password)
{
	$this -> db -> select('StfID,StfName,StfEmail');
	$this -> db -> from('staff');
	$this -> db -> where('StfID',$id);
	$this -> db -> where('StfPwd',$password); 
	$this -> db -> limit(1);
	$query = $this -> db -> get();

	if($query ->num_rows() == 1)
	{
		return $query->result();
	}
	else
	{
		return false;
	}
}


public function getStaff($id) 
{
	$this -> db -> select('*');
	$this -> db -> from('staff');
	$this -> db -> where('StfID',$id);
	$query = $this -> db -> get();


	if($query -> num_rows() == 1)
	{
		return $query->result();
	}

	else{
		return false;
	}
}


public function getAllStaff() 
{
	$this -> db -> select('*');
	$this -> db -> from('staff');
	$this -> db -> join('faculty', 'faculty.FacID = staff.FacID');
	$query = $this -> db -> get();
	return $query->result();
}


 function delete_staff($id){  
    $this->db->where("StfID", $id);  
    $this->db->delete("staff");  
     //DELETE FROM tbl_user WHERE id = $id  
 }  


function updateStaff($data){

	$data = array(
	'StfID'=> $data['StfID'],
	'StfPwd'=> $data['StfPwd'],
	'StfName'=> $data['StfName'],
	'StfIC'=> $data['StfIC'],
	'StfEmail'=> $data['StfEmail']);

	$this->db->where('StfID', $data['StfID']);
	if ($this ->db->update('Staff', $data)) {
		//echo'update success';
		return true;
	}

	else{
		return false;
		//echo'update error';
	}

}






}
