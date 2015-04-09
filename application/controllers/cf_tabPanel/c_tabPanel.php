<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_tabPanel extends CI_Controller {

	function __construct(){		
		parent::__construct();
		$this->load->model('mf_tabPanel/m_tabPanel');
	}

	public function index(){
		if(isset($_POST['idObj'])){			

		    $data['titulo'] = ' Ejemplo de Tab Panel (En construccion 50 %)';			
			$this->load->view('vf_tabPanel/v_tabPanel',$data);
		}
	}
	
	public function concatenarValoresTabPanel($nombres, $apellidos, $edad){
		$resultado='Usted se llama '.$nombres.' '.$apellidos.' y tiene '.$edad.' años de Edad.';
		echo $resultado;				
	}

	
	
}