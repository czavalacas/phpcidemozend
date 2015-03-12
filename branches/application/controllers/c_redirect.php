<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_redirect extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('m_consulta');
	}

	public function index(){
		if(isset($_POST['idObj'])){
			$data['titulo'] = 'Titulo contenido '.$_POST['idObj'];
			$this->load->view($_POST['idObj'],$data);
		}
	}
	//
}