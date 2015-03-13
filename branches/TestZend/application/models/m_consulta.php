<?php
class M_consulta extends CI_Model{
	
	function __construct(){
		parent::__construct();
		//$this->load->database();
	}
	
	function getData(){
		$result = $this->db->query("Select s.nidsede,s.desc_sede From admsede s ");
		return $result;
	}
	
    function getData2($param){
		$result = $this->db->query("Select s.nidsede,s.desc_sede From admsede s Where Lower(s.desc_sede) Like Lower('%".$param."%') ");
		return $result;
	}
	
	function getProfesoresByName($nombre){
		$result = $this->db->query(" Select p.dniprofesor,Concat(p.apellidos,' ',p.nombres) nombres 
					                   From admprof p where p.flg_acti = 1
					                    And Lower(p.nombres) Like Lower('%".$nombre."%')
					                  Order By p.apellidos ");
		return $result;
	}
	
	function getAutoCompletarProfes($nombre){
		$profes = $this->getProfesoresByName($nombre);
		$data = array();
		foreach ($profes->result() as $row){
			$fila = array("dniprofesor"=>$row->dniprofesor,"nombres"=>$row->nombres);
			array_push($data, $fila);
		}
		return $data;
	}
	
	function getAulas($nidSede){
		$result = $this->db->query(" Select nidaula,desc_aula From admaula o where o.nidSede = ".$nidSede);
		return $result;
	}
	
	function getAulasArrayForJSON($nidSede){
		$aulas = $this->getAulas($nidSede);
		$data['cols'][] = array('type' => 'string', 'label' => 'desc');
		foreach ($aulas->result() as $row){
			$data['rows'][] = array('c' => array( array('v' => $row->desc_aula)) );
		}
		return $data;
	}
	
	function getAulasComboForJSON($nidSede){
		$aulas = $this->getAulas($nidSede);
		$fila = array();
		foreach ($aulas->result() as $row){
			$fila[$row->nidaula] = $row->desc_aula;
		}
		return $fila;
	}
	
	function getDataArrayForJSON(){
		$sedes = $this->getData();
		$data['cols'][] = array('type' => 'number', 'label' => 'id');
		$data['cols'][] = array('type' => 'string', 'label' => 'desc');
		foreach($sedes->result() as $row) {
			$data['rows'][] = array('c' => array( array('v' => $row->nidsede),array('v' => $row->desc_sede)) );
		}
		return $data;
	}
	
	function getDataFiltradaArrayForJSON($param){
		$sedes = $this->getData2($param);
		$data['cols'][] = array('type' => 'number', 'label' => 'id');
		$data['cols'][] = array('type' => 'string', 'label' => 'desc');
		foreach($sedes->result() as $row) {
			$data['rows'][] = array('c' => array( array('v' => $row->nidsede),array('v' => $row->desc_sede)) );
		}
		return $data;
	}
	
	function getDataArray(){
		$sedes = $this->getData();
		$data = array();
		foreach($sedes->result() as $row) {
			$fila = array("nidsede"=>$row->nidsede,"desc_sede"=>$row->desc_sede);
			array_push($data, $fila);
		}
		return $data;
	}
	
	function getDataArrayCombo(){
		$sedes = $this->getData();
		$fila = array();
		foreach($sedes->result() as $row) {
			$fila[$row->nidsede] = $row->desc_sede;
		}
		return $fila;
	}
	
	function getDataArrays($param){
		$sedes = $this->getData2($param);
		$data = array();
		foreach($sedes->result() as $row) {
			$fila = array("nidsede"=>$row->nidsede,"desc_sede"=>$row->desc_sede);
			array_push($data, $fila);
		}
		return $data;
	}
}
?>