<?php
class PrgObj extends CI_Model {
	private $objID;
	private $objDesc;
	private $prgID;


function __construct(){
	parent::__construct();
}

public function addObj($obj,$id){

	$value=array(
		'ObjDesc' => $obj,
		'PrgID' => $id);

	$this->db->insert('prgobjective', $value);

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


public function getPrgObj($prgId) 
{
	$this -> db -> select('*');
	$this -> db -> from('prgobjective');
	$this -> db -> where('PrgID',$prgId);
	$query = $this -> db -> get();
	return $query->result();
}

 function delete_objbyPrg($id){  
    $this->db->where("PrgID", $id);  
    $this->db->delete("prgobjective");  
 } 

 function delObj($id){  
    $this->db->where("PrgID", $id);  
    $this->db->delete("prgobjective");  
    
 }  

 function delObjbyFac($id){  
	$this->db->select('PrgID');
	$this->db->from('programme');
	$this->db->where('programme.FacID', $id);
	$where_clause = $this->db->get_compiled_select();
	
    $this->db->where("`PrgID` IN ($where_clause)", NULL, FALSE);  
    $this->db->delete("prgobjective");  
    
 }


}
