<?php
class Cco extends CI_Model {


function __construct(){
	parent::__construct();
}

function addCCO($chap,$crsid){

	#Create main query
	$value=array(
			'CLOID' => $crsid,
			'Ccontent' => $chap);

	$this->db->insert('coursecontent', $value);

} 

public function getCcobyCrs($crsId) 
{
	$this -> db -> select('*');
	$this -> db -> from('coursecontent');
	$this -> db -> join('clo', 'clo.CLOID = coursecontent.CLOID');
	$this -> db -> where('CrsID',$crsId);
	$query = $this -> db -> get();
	return $query->result();
}




//Update staff info by email
function editStaff ($id){
	//var_dump ($c_data);
	$staff_name = trim($postData['staff_name']);
	$staff_hp = trim($postData['staff_hp']);
	$password = trim($postData['password']);
	$staff_ic = trim($postData['staff_ic']);
	$email = trim($postData['email']);
	if($name != '' && $email != ''){
		//Update
		$value=array('staff_name' => $staff_name , 'staff_ic' => $staff_ic ,'email'=>$email);
		$this -> db -> where('email',$email);
		$this -> db -> update('staff',$value);
		return $value;
		$this -> load -> view('edit_staff_view');

	}
}

function delCCO($id){
	#Create where clause
	$this->db->select('CLOID');
	$this->db->from('clo');
	$this->db->where('clo.CrsID', $id);
	$where_clause = $this->db->get_compiled_select();

	#Create main query
	$this->db->where("`CLOID` IN ($where_clause)", NULL, FALSE);
	$this->db->delete('coursecontent');
} 

function delCCObyFac($id){
	#Create where clause
	$this->db->select('CLOID');
	$this->db->from('clo');
	$this -> db -> join('course', 'course.CrsID = clo.CrsID');
	$this->db->where('course.FacID', $id);
	$where_clause = $this->db->get_compiled_select();

	#Create main query
	$this->db->where("`CLOID` IN ($where_clause)", NULL, FALSE);
	$this->db->delete('coursecontent');
} 

}