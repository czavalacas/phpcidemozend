<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_login extends CI_Controller {
	
	var $login;
	
	function __construct(){
		parent::__construct();
		$this->load->model('mf_usuario/m_usuario');
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		$this->login = 'vf_seguridad/v_login';
	}

	public function index(){
		$data['error'] = null;
		$this->load->library('session');//$this->session->sess_destroy();
		$logedUser = $this->session->userdata('usernameSession');
		if($logedUser != null){
			$this->load->helper('url');
			redirect('/c_main','refresh');
		}else{
			$this->load->view($this->login,$data);
		}
	}
	//http://stackoverflow.com/questions/17547489/how-to-save-and-extract-session-data-in-codeigniter
	public function logear(){
		$pagina = null;
		$this->form_validation->set_rules('username', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Clave', 'required');
		if ($this->form_validation->run() == FALSE){
			$data['error'] = 'Ingrese Usuario y/o clave';
			$data['user'] = $_POST['username'];
			$this->load->view($this->login,$data);
		}else{
			$result = $this->m_usuario->getUsuarioLogin($_POST['username'],$_POST['password']);
			if($result != null){
				$pagina = 'admin';
				$this->load->helper('url');
				$this->load->helper('date_helper');
				$this->load->library('session');
				$this->session->set_userdata(array('usernameSession' => $result['nombres'],
						                           'dateSession'     => now(),
						                           'correoSession'   => $result['correo']
				                                  )
						                    );
				redirect('/c_main','refresh');
			}else{
				$pagina = $this->login;
				$data['error'] = 'Usuario y/o Clave incorrecto.';
				$data['user'] = $_POST['username'];
				$this->load->view($pagina,$data);
			}
			
		}
	}

	//
}