<?php
class Plo extends CI_Model {
	private $PLOID;
	private $PLONum;
	private $PLODesc;
	private $prgID;


function __construct(){
	parent::__construct();
}

public function addPLO($num,$desc,$id){

	$value=array(
		'PLONum' => $num,
		'PLODesc' => $desc,
		'PrgID' => $id);

	$this->db->insert('plo', $value);

}

public function updatePLO($num,$desc,$id){

	$value=array(
		'PLONum' => $num,
		'PLODesc' => $desc);
	
	$this -> db -> where('PLOID',$id);
	$this->db->update('plo', $value);

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


public function getPLO($prgId) 
{
	$this -> db -> select('*');
	$this -> db -> from('plo');
	$this -> db -> where('PrgID',$prgId);
	$query = $this -> db -> get();
	return $query->result();
}

public function getPLOID($prgId) 
{
	$this -> db -> select('PLOID');
	$this -> db -> from('plo');
	$this -> db -> where('PrgID',$prgId);
	$query = $this -> db -> get();
	$array = array();

    foreach($query->result() as $row)
    {
        $array[] = $row->PLOID;
    }

    return $array;
}

 function delPLO($id){  
    $this->db->where("PrgID", $id);  
    $this->db->delete("plo");  

 } 
 
 function delPLObyID($id){  
    $this->db->where("PLOID", $id);  
    $this->db->delete("plo");  

 } 
 
 function delPLObyFac($id){  
 	$this->db->select('PrgID');
	$this->db->from('programme');
	$this->db->where('programme.FacID', $id);
	$where_clause = $this->db->get_compiled_select();
	
    $this->db->where("`PrgID` IN ($where_clause)", NULL, FALSE);  
    $this->db->delete("plo");  

 } 
}