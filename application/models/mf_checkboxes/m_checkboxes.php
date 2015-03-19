<?php
class M_checkboxes extends CI_Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	function getRutaCertificacion(){
		$result = $this->db->query("Select * FROM admrutacerti");
		return $result;
	}
	
}
?>