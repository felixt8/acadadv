<?php
class Mapping extends CI_Model {


function __construct(){
	parent::__construct();
}

public function addMap($clnum,$id,$plnum,$pid){
	
	#Create where clause
	$this->db->select('CLOID');
	$this->db->from('clo');
	$this->db->where('clo.CLONum', $clnum);
	$this->db->where('clo.CrsID', $id);
	$where_clo = $this -> db -> get()->result();
	
	#Create where clause
	$this->db->select('PLOID');
	$this->db->from('plo');
	$this->db->where('plo.PLONum', $plnum);
	$this->db->where('plo.PrgID', $pid);
	$where_plo = $this -> db -> get()->result();
	
	$value=array(
			'CLOID' => $where_clo[0]->CLOID,
			'PLOID' => $where_plo[0]->PLOID);
	
	$this->db->insert('mapping', $value);

}

public function getMapByCrs($crsID) 
{
	$this -> db -> select('*');
	$this -> db -> from('mapping');
	$this -> db -> join('clo', 'clo.CLOID = mapping.CLOID');
	$this -> db -> join('plo', 'plo.PLOID = mapping.PLOID');
	$this -> db -> where('CrsID',$crsID);
	$query = $this -> db -> get();
	

	return $query->result();
}

public function getMapByCrsPrg($crsID,$prgID) 
{
	$this -> db -> select('*');
	$this -> db -> from('mapping');
	$this -> db -> join('clo', 'clo.CLOID = mapping.CLOID');
	$this -> db -> join('plo', 'plo.PLOID = mapping.PLOID');
	$this -> db -> where('CrsID',$crsID);
	$this -> db -> where('PrgID',$prgID);
	$query = $this -> db -> get();
	

	return $query->result();
}

function delMap($id){
	#Create where clause
	$this->db->select('CLOID');
	$this->db->from('clo');
	$this->db->where('clo.CrsID', $id);
	$where_clause = $this->db->get_compiled_select();

	#Create main query
	$this->db->where("`CLOID` IN ($where_clause)", NULL, FALSE);
	$this->db->delete('mapping');  
} 

function delMapbyPrg($id){
	#Create where clause
	$this->db->select('MapID');
	$this->db->from('mapping');
	$this -> db -> join('plo', 'plo.PLOID = mapping.PLOID');
	$this->db->where('plo.PrgID', $id);
	$where_clause = $this->db->get_compiled_select();

	#Create main query
	$this->db->where("`MapID` IN ($where_clause)", NULL, FALSE);
	$this->db->delete('mapping'); 
} 

function delMapbyFac($id){
	#Create where clause
	$this->db->select('CLOID');
	$this->db->from('clo');
	$this -> db -> join('course', 'course.CrsID = clo.CrsID');
	$this->db->where('course.FacID', $id);
	$where_clause = $this->db->get_compiled_select();

	#Create main query
	$this->db->where("`CLOID` IN ($where_clause)", NULL, FALSE);
	$this->db->delete('mapping');  
} 

function delMapbyPrgFac($id){
	#Create where clause
	$this->db->select('PLOID');
	$this->db->from('plo');
	$this -> db -> join('programme', 'programme.PrgID = plo.PrgID');
	$this->db->where('programme.FacID', $id);
	$where_clause = $this->db->get_compiled_select();

	#Create main query
	$this->db->where("`PLOID` IN ($where_clause)", NULL, FALSE);
	$this->db->delete('mapping');  
} 

}
