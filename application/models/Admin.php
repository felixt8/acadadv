<?php 
class Admin extends CI_Model {
	private $admID;
	private $admName;
	private $admIC;
	private $admPwd;
	private $admEmail;

function __construct(){
	parent::__construct();
}

function admLogin($id, $password)
{
	$this -> db -> select('AdmID,AdmName,AdmEmail');
	$this -> db -> from('admin');
	$this -> db -> where('AdmID',$id);
	$this -> db -> where('AdmPwd',$password); 
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

public function getAdmin($id) 
{
	$this -> db -> select('*');
	$this -> db -> from('admin');
	$this -> db -> where('AdmID',$id);
	$query = $this -> db -> get();


	if($query -> num_rows() == 1)
	{
		return $query->result();
	}

	else{
		return false;
	}

}

function updateAdmin($data){

	$data = array(
	'AdmID'=> $data['AdmID'],
	'AdmPwd'=> $data['AdmPwd'],
	'AdmName'=> $data['AdmName'],
	'AdmIC'=> $data['AdmIC'],
	'AdmEmail'=> $data['AdmEmail']);

	$this->db->where('AdmID', $data['AdmID']);
	if ($this ->db->update('Admin', $data)) {
		//echo'update success';
		return true;
	}

	else{
		return false;
		//echo'update error';
	}

}


}
