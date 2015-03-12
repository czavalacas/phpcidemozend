<?php
class M_consulta extends CI_Model{
	
	function __construct(){
		parent::__construct();
		//$this->load->database();
	}
	
	function getData(){
		$result = mysql_query(" Select s.nidSede,s.desc_sede From mmsi_sped.admsede s ");
		return $result;
	}
	
    function getData2($param){
		$result = mysql_query(" Select s.nidSede,s.desc_sede From mmsi_sped.admsede s Where s.desc_sede Like '%".$param."%' ");
		return $result;
	}
	
	function getProfesoresByName($nombre){
		$result = mysql_query(" Select p.dniProfesor,Concat(p.apellidos,' ',p.nombres) nombres 
				                  from admprof p where p.flg_acti = 1
				                   And p.nombres Like '%".$nombre."%'
				                 Order By p.apellidos; ");
		return $result;
	}
	
	function getAutoCompletarProfes($nombre){
		$profes = $this->getProfesoresByName($nombre);
		$data = array();
		while ($row = mysql_fetch_array($profes)) {
			$fila = array("dniProfesor"=>$row['dniProfesor'],"nombres"=>$row['nombres']);
			array_push($data, $fila);
		}
		return $data;
	}
	
	function getAulas($nidSede){
		$result = mysql_query(" Select nidAula,desc_aula From mmsi_sped.admaula o where o.nidSede = ".$nidSede);
		return $result;
	}
	
	function getAulasArrayForJSON($nidSede){
		$aulas = $this->getAulas($nidSede);
		$data['cols'][] = array('type' => 'string', 'label' => 'desc');
		while ($row = mysql_fetch_array($aulas)) {
			$data['rows'][] = array('c' => array( array('v' => $row['desc_aula'])) );
		}
		return $data;
	}
	
	function getAulasComboForJSON($nidSede){
		$aulas = $this->getAulas($nidSede);
		$fila = array();
		while ($row = mysql_fetch_array($aulas)) {
			$fila[$row['nidAula']] = $row['desc_aula'];
		}
		return $fila;
	}
	
	function getDataArrayForJSON(){
		$sedes = $this->getData();
		$data['cols'][] = array('type' => 'number', 'label' => 'id');
		$data['cols'][] = array('type' => 'string', 'label' => 'desc');
		while ($row = mysql_fetch_array($sedes)) {
			$data['rows'][] = array('c' => array( array('v' => $row['nidSede']),array('v' => $row['desc_sede'])) );
		}
		return $data;
	}
	
	function getDataFiltradaArrayForJSON($param){
		$sedes = $this->getData2($param);
		$data['cols'][] = array('type' => 'number', 'label' => 'id');
		$data['cols'][] = array('type' => 'string', 'label' => 'desc');
		while ($row = mysql_fetch_array($sedes)) {
			$data['rows'][] = array('c' => array( array('v' => $row['nidSede']),array('v' => $row['desc_sede'])) );
		}
		return $data;
	}
	
	function getDataArray(){
		$sedes = $this->getData();
		$data = array();
		while ($row = mysql_fetch_array($sedes)) {
			$fila = array("nidSede"=>$row['nidSede'],"desc_sede"=>$row['desc_sede']);
			array_push($data, $fila);
		}
		return $data;
	}
	
	function getDataArrayCombo(){
		$sedes = $this->getData();
		$fila = array();
		while ($row = mysql_fetch_array($sedes)) {
			$fila[$row['nidSede']] = $row['desc_sede'];
		}
		return $fila;
	}
	
	function getDataArrays($param){
		$sedes = $this->getData2($param);
		$data = array();
		while ($row = mysql_fetch_array($sedes)) {
			$fila = array("nidSede"=>$row['nidSede'],"desc_sede"=>$row['desc_sede']);
			array_push($data, $fila);
		}
		return $data;
	}
}
?>