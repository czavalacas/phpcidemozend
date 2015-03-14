<?php
class M_menu extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function m_getMenuBD(){
		$result = $this->db->query("Select * From menu Where flg_nodo = '1' Order By orden");
		return $result;
	}
	
	function m_getMenuHijosByPadreBD($idMenuPadre){
		$result = $this->db->query("Select * From menu 
				                     Where id_menu_padre = ".$idMenuPadre." 
				                       And flg_nodo = '0' Order By orden");
		return $result;
	}
	
	function m_getMenu(){
		$menus = $this->m_getMenuBD();
		$data = array();
		foreach ($menus->result() as $row){
			$fila = array("id_menu"       =>$row->id_menu,
					      "desc_menu"     =>$row->desc_menu,
					      "css_class"     =>$row->css_class,
						  "id_obj_html"   =>$row->id_obj_html,
						  "flg_has_hijos" =>$row->flg_has_hijos
			);
			array_push($data, $fila);
		}
		return $data;
	}
	
	function m_getMenuHijosByPadre($idMenuPadre){
		$hijos = $this->m_getMenuHijosByPadreBD($idMenuPadre);
		$data = array();
		foreach ($hijos->result() as $row){
			$fila = array("id_menu"       =>$row->id_menu,
						  "desc_menu"     =>$row->desc_menu,
						  "css_class"     =>$row->css_class,
						  "id_obj_html"   =>$row->id_obj_html
			);
			array_push($data, $fila);
		}
		return $data;
	}
}
