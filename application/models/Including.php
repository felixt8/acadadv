<?php
class Including extends CI_Model {

function __construct(){
	parent::__construct();
}

public function addInc($crs,$sem,$prg){
	$value=array(
		'CrsID' => $crs,
		'PrgID' => $prg,
		'Semester' => $sem);
		
		$this->db->insert('including', $value);

}

 function delInc($id){  
    $this->db->where("PrgID", $id);  
    $this->db->delete("including");  
    
 } 

 function delIncbyCrs($id){  
	$this->db->where("CrsID", $id);  
    $this->db->delete("including");  
 }

 function delIncbyFac($id){  
	$this->db->select('PrgID');
	$this->db->from('programme');
	$this->db->where('programme.FacID', $id);
	$where_clause = $this->db->get_compiled_select();
	
    $this->db->where("`PrgID` IN ($where_clause)", NULL, FALSE);  
    $this->db->delete("including");  
    
 } 


}
