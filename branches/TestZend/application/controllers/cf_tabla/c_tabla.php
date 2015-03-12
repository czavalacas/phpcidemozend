<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_tabla extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_consulta');
		$this->load->library('table');
	}

	public function index(){
		if(isset($_POST['idObj'])){
			$data['tabla'] = $this->init();
			$data['titulo'] = 'Titulo contenido '.$_POST['idObj'];
			$this->load->view('vf_tabla/tabla',$data);
		}
	}
	
	public function init(){
		$sedes = $this->m_consulta->getDataArray();
		$tabla = $this->getDataCtrl($sedes);
		return $tabla;
	}
	
	function getDataCtrl($data){
		$tmpl = array('table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">');
		$this->table->set_template($tmpl);
		$this->table->set_heading('ID SEDE', 'SEDE');
		foreach($data as $fila){
			$this->table->add_row($fila['nidSede'],$fila['desc_sede']);
		}
		$tabla = $this->table->generate();
		return $tabla;
	}
	//
}