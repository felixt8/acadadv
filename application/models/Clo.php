<?php
class Clo extends CI_Model {
	private $CLOID;
	private $CLONum;
	private $CLOContent;
	private $crsID;


function __construct(){
	parent::__construct();
}

function insert_stat($dataSet)
{
    $this->db->insert_batch('clo', $dataSet);
}

public function addCLO($num,$desc,$crsid){
	if($num || $desc){
		$value=array(
			'CLONum' => $num,
			'CLOContent' => $desc,
			'CrsID' => $crsid);

		$this->db->insert('clo', $value);

	}
}

public function getCLObyCrs($crsId) 
{
	$this -> db -> select('*');
	$this -> db -> from('clo');
	$this -> db -> where('CrsID',$crsId);
	$query = $this -> db -> get();
	return $query->result();
}


public function getCLOID($cloNum,$crsID) 
{
	$this -> db -> select('CLOID');
	$this -> db -> from('clo');
	$this -> db -> where('CLONum',$cloNum);
	$this -> db -> where('CrsID',$crsID);
	$query = $this -> db -> get();
	
	foreach ($query->result() as $row)
	{
		return $row->CLOID;
	}
}

 function delCLO($id){  
    $this->db->where("CrsID", $id);  
    $this->db->delete("clo");  
     //DELETE FROM tbl_user WHERE id = $id  
 } 

 function delCLObyFac($id){  
	#Create where clause
	$this->db->select('CrsID');
	$this->db->from('course');
	$this->db->where('course.FacID', $id);
	$where_clause = $this->db->get_compiled_select();
	
	$this->db->where("`CrsID` IN ($where_clause)", NULL, FALSE);
	$this->db->delete('clo'); 
 }


}