<?php
class M_upload extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function insertarArchivo($insert_data){
		$this->db->insert('archivo', $insert_data);
	}
}