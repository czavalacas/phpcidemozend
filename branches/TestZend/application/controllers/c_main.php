<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_main extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		$this->load->model('mf_menu/m_menu');
	}

	public function index(){
		$this->load->library('session');//$this->session->sess_destroy();
		$logedUser = $this->session->userdata('usernameSession');
		if($logedUser != null){
			$data['titulo'] = 'PHP Demo';
			$data['opciones'] = $this->buildOpciones();
			$data['usuarioLogeado'] = $logedUser;
			$this->load->view('admin',$data);
		}else{
			$this->session->sess_destroy();
			$this->load->helper('url');
			redirect('cf_seguridad/c_login','refresh');
		}
	}
	
	function buildOpciones(){
		$opciones = $this->m_menu->m_getMenu();
		$opcionesHTml = array();
		foreach($opciones as $opcion){
			$opc = $this->buildHTML($opcion['desc_menu'], $opcion['css_class'],$opcion['id_obj_html']);
			array_push($opcionesHTml,$opc);
		}
		/*$opciones = array();
		$opc1 = $this->buildHTML('Tabla Code Igniter', 'glyphicon glyphicon-list-alt','tabla');
		$opc2 = $this->buildHTML('ComboBox Ajax', 'glyphicon glyphicon-object-align-top','combo');
		$opc3 = $this->buildHTML('Tabla Ajax', 'glyphicon glyphicon-calendar','tabAjax');
		$opc4 = $this->buildHTML('Autocompletar', 'glyphicon glyphicon-align-justify','autoc');
		$opc5 = $this->buildHTML('Tabla Funcion PSQL', 'glyphicon glyphicon-align-justify','func');
		array_push($opciones,$opc1,$opc2,$opc3,$opc4,$opc5);*/
		return $opcionesHTml;
	}
	
	function buildHTML($opcion,$clase,$idPantalla){
		return '<li>
				   <a id="'.$idPantalla.'" onClick="invocarPantalla(this.id);">
				   		<i class="'.$clase.'"></i>'.$opcion.
		          '</a>
		          		
		        </li>';
	}
	
	function logOut(){
		$this->load->library('session');
		$logedUser = $this->session->userdata('usernameSession');
		if($logedUser != null){
			$this->session->sess_destroy();
			$this->load->helper('url');
			redirect('','refresh');
		}
	}///cf_seguridad/c_login,default_controller
	//SubMenu
	//Agregar propiedad al <a> --> href="javascript:;" data-toggle="collapse" data-target="#demo"
	//Agregar antes de cerrar el <a><i class="fa fa-fw fa-caret-down"></i>
	/* Agregar antes de cerrar el <li>
	 <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
   */
}