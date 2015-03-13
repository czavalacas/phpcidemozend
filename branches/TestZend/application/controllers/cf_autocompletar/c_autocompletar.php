<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_autocompletar extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_consulta');
	}
	
	public function index(){
		$this->load->view('vf_autocompletar/autocompletar');
	}
	
	function buscarProfes(){
		if(isset($_POST['name'])){
			$profes = $this->m_consulta->getAutoCompletarProfes($_POST['name']);
			foreach($profes as $fila){
				echo '<li dniProf= "'.$fila['dniprofesor'].'" >'.$fila['nombres'].'</li>';
			}
		}
	}
	//
}