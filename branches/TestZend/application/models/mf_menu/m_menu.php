<?php
class M_menu extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function m_getMenuBD(){
		$result = $this->db->query("Select * From menu Order By orden");
		return $result;
	}
	
	function m_getMenu(){
		$profes = $this->m_getMenuBD();
		$data = array();
		foreach ($profes->result() as $row){
			$fila = array("id_menu"     =>$row->id_menu,
					      "desc_menu"   =>$row->desc_menu,
					      "css_class"   =>$row->css_class,
						  "id_obj_html" =>$row->id_obj_html,
						  "flg_nodo"    =>$row->flg_nodo
			);
			array_push($data, $fila);
		}
		return $data;
	}
}