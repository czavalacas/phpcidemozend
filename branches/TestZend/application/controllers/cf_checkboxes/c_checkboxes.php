<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_checkboxes extends CI_Controller {

	function __construct(){		
		parent::__construct();
		$this->load->model('mf_checkboxes/m_checkboxes');
	}

	public function index(){
		if(isset($_POST['idObj'])){
				
			$rutas = $this->m_checkboxes->getRutaCertificacion();
			$strConcatenado='';
			
				foreach($rutas->result() as $row) {
					$nidRuta=$row->nidRuta;
					$desc_ruta= $row->desc_ruta;			
					$estado= $row->estado;
   
					$strConcatenado = $strConcatenado.form_checkbox($this->setPropiedadesCheckBoxes($nidRuta,$estado)).$desc_ruta.'<br>';
				}		
		
			$data['checkbox'] =	array($strConcatenado);
			
		    $data['titulo'] = ' Ejemplo de CheckBox '.$_POST['idObj'];
			$this->load->view('vf_checkboxes/v_checkboxes',$data);
		}
	}
	
	function setPropiedadesCheckBoxes($param, $checkeado){
		if($checkeado=='1'){
		   $Checkeado=TRUE;
		}else{
		   $checkeado=FALSE;
		}		
	        $props = array(
					'name'        => $param,
					'id'          => $param,
					'value'       => 'accept',
					'checked'     => $checkeado,
					'style'       => 'margin:10px',
			);
		return $props;
	}
	
}

