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
	
}
?>