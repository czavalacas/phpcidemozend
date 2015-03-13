<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_funcion extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library('table');
		$this->load->model('mf_funcion/m_funcion');
	}
	
	public function index(){
		if(isset($_POST['idObj'])){
			$data['tabla'] = $this->mostrarProfesores();
			$data['titulo'] = 'Titulo Tutorial '.$_POST['idObj'];
			$this->load->view('vf_funcion/v_funcion',$data);
		}
	}
	
	function mostrarProfesores(){
		$profes = $this->m_funcion->m_getProfesFuncPGSQL();
		
		$tmpl = array('table_open' => '<table id="example" width="100%" 
						class="display table" >');
		$this->table->set_template($tmpl);
		$this->table->set_heading('DNI', 'Nombres','Apellidos', 'Correo','Estado');
		foreach($profes as $fila){
			$this->table->add_row($fila['dniprofesor'],$fila['nombres'],
					              $fila['apellidos']  ,$fila['correo'],
					              $fila['estado']);
		}
		$tabla = $this->table->generate();
		return $tabla;
	}
	//
}