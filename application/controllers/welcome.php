<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_consulta');
		$this->load->library('table');
		$this->load->helper('form');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
	    $data = $this->init();
		$this->load->view('welcome_message',$data);
		//$this->load->view('admin');
	}
	
	public function init(){
		$sedes = $this->m_consulta->getDataArrayCombo();
		$data['nombre'] = 'Diego';
		$data['sedes'] = $sedes;
		return $data;
	}
	
	public function init2(){
		$sedes = $this->m_consulta->getDataArrayCombo();
		$data['nombre'] = 'Diego';
		$data['sedes'] = $sedes;
		return $data;
	}
    /**
     * Retornar Nombre
     * Esta es mi primera funcion
     * 
     * @param string $_ps_nom_usua <p>Nombre de usuario</p>
     * @return string El nombre del usuario
     */
    public function miFuncion2(){
    	$_nomb = $this->nvl($_POST['nombre']);
        $this->getDataCtrl2($_nomb);
        $data = $this->init2();
        $data['nombre2'] = 'HOLA '.$_nomb;
        $this->load->view('welcome_message',$data);
    }

    public function nvl($var){
    	return isset($var) ? $var : null;
    }

    public function ajaxReq(){
    	// Array with names
    	$a[] = "Anna";
    	$a[] = "Brittany";
    	$a[] = "Cinderella";
    	$a[] = "Diana";
    	$a[] = "Eva";
    	$a[] = "Fiona";
    	$a[] = "Gunda";
    	$a[] = "Hege";
    	$a[] = "Inga";
    	$a[] = "Johanna";
    	$a[] = "Kitty";
    	$a[] = "Linda";
    	$a[] = "Nina";
    	$a[] = "Ophelia";
    	$a[] = "Petunia";
    	$a[] = "Amanda";
    	$a[] = "Raquel";
    	$a[] = "Cindy";
    	$a[] = "Doris";
    	$a[] = "Eve";
    	$a[] = "Evita";
    	$a[] = "Sunniva";
    	$a[] = "Tove";
    	$a[] = "Unni";
    	$a[] = "Violet";
    	$a[] = "Liza";
    	$a[] = "Elizabeth";
    	$a[] = "Ellen";
    	$a[] = "Wenche";
    	$a[] = "Vicky";
    	
    	// get the q parameter from URL
    	$q = $_REQUEST["q"];
    	
    	$hint = "";
    	
    	// lookup all hints from array if $q is different from ""
    	if ($q !== "") {
    		$q = strtolower($q);
    		$len=strlen($q);
    		foreach($a as $name) {
    			if (stristr($q, substr($name, 0, $len))) {
    				if ($hint === "") {
    					$hint = $name;
    				} else {
    					$hint .= ", $name";
    				}
    			}
    		}
    	}
    	
    	// Output "no suggestion" if no hint was found or output correct values
    	echo $hint === "" ? "no suggestion" : $hint;
    }

    function getDataCtrl2($param){
    	$data = $this->m_consulta->getDataArrays($param);
    	$tmpl = array('table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">');
    	$this->table->set_template($tmpl);
    	$this->table->set_heading('ID SEDE', 'SEDE');
    	foreach($data as $fila){
    		$this->table->add_row($fila['nidsede'],$fila['desc_sede']);
    	}
    	echo $this->table->generate();
    }
    
    function getDataJSONCtrl(){
    	$data = $this->m_consulta->getDataArrayForJSON();
    	echo json_encode($data);
    }
    
    function getDataFiltradaJSONCtrl(){
    	$myPostData = json_decode($_POST['myPostData'],true);
    	$params = $myPostData["descSede"];
    	$data = $this->m_consulta->getDataFiltradaArrayForJSON($params);
    	echo json_encode($data);
    }
    
    function getAulasFiltradaJSONCtrl(){
    	$myPostData = json_decode($_POST['myPostData'],true);
    	$nidSede = $myPostData["nidSede"];
    	$data = $this->m_consulta->getAulasArrayForJSON($nidSede);
    	echo json_encode($data);
    }
    
    function cargarAulasCombo($nidSede){
    	$data = $this->m_consulta->getAulasComboForJSON($nidSede);
    	echo form_dropdown('field2', $data, NULL, 'id="field2"');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */