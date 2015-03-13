<?php
class M_funcion extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function m_getProfesoresFromFuncion(){
		$result = $this->db->query("Select * From fun_get_profes() ");
		return $result;
	}
	
	function m_getProfesFuncPGSQL(){
		$profes = $this->m_getProfesoresFromFuncion();
		$data = array();
		foreach ($profes->result() as $row){
			$fila = array("dniprofesor" =>$row->dniprof,
					      "nombres"     =>$row->nombres,
					      "apellidos"   =>$row->apellidos,
						  "correo"      =>$row->correo,
						  "estado"      =>($row->estado == "1" ? "Activo" : "Inactivo")
			);
			array_push($data, $fila);
		}
		return $data;
	}
}