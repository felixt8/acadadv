<?php
class Keyword extends CI_Model {

function __construct(){
	parent::__construct();
}

public function addKeyword($name){
	if($name){
		$value=array(
			'Keyword' => $name);

		$this->db->insert('keyword', $value);
		return true;
	}
	
}

public function getKeyword($crsId) 
{
	$this -> db -> select('*');
	$this -> db -> from('matching');
	$this -> db -> join('keyword', 'keyword.KeyID = matching.KeyID');
	$this -> db -> where('CrsID',$crsId);
	$query = $this -> db -> get();

	return $query->result();

}

public function getKeyID($name) 
{
	$this -> db -> select('KeyID');
	$this -> db -> from('keyword');
	$this -> db -> where('Keyword',$name);
	$query = $this -> db -> get();

	return $query->result();

}

public function getAllKeyword() 
{
	$this -> db -> select('*');
	$this -> db -> from('keyword');
	$query = $this -> db -> get();

	return $query->result();

}

public function addMatch($keyid,$crsid){
	if($keyid || $crsid){
		$value=array(
			'KeyID' => $keyid,
			'CrsID' => $crsid);

		$this->db->insert('matching', $value);

	}
}


function delMatch($id){  
	$this->db->where("CrsID", $id);  
	$this->db->delete("matching");  

} 


function delMatchbyFac($id){  
#Create where clause
	$this->db->select('CrsID');
	$this->db->from('course');
	$this->db->where('course.FacID', $id);
	$where_clause = $this->db->get_compiled_select();
	
	$this->db->where("`CrsID` IN ($where_clause)", NULL, FALSE);
	$this->db->delete('matching'); 

} 

}