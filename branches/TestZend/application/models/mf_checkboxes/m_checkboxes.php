<?php
class M_checkboxes extends CI_Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	function getRutaCertificacion(){
		$result = $this->db->query("Select * FROM admrutacerti Order by desc_ruta");
		return $result;
	}

	function updatearRutaCertificacion($update_data,$id){
		
		$this->db->update('admrutacerti', $update_data, "nidRuta = ".$id);
	}
	
	function insertarRuta($insert_data){
		$this->db->insert('admrutacerti', $insert_data);
	}
	
	function insertRuta($data){
	    $this->db->insert("admrutacerti",$data);
	}
	
	function getRutabyNid($nid){
	    
	    $query = "Select * FROM admrutacerti WHERE nidruta = ?";
	     
	    $result = $this->db->query($query, array($nid));
	    
	    return $result;
	}
	
	function elimRuta($nid){
	    $this->db->where("nidruta",$nid);
	    $this->db->delete("admrutacerti");
	}
	
	function editRuta($data,$nid){
	    $this->db->where("nidruta",$nid);
	    $this->db->update("admrutacerti",$data);
	}
	
}
?>