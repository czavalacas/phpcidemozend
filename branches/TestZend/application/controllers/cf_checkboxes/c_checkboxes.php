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
   
					$strConcatenado .= '<label>'.form_checkbox($this->setPropiedadesCheckBoxes($nidRuta,$estado,$desc_ruta)).' '.$desc_ruta.'</label><br>';
				}		
		
			$data['checkbox'] =	array('<form action="action.php" method="post">'.$strConcatenado.'</form>');	
			$data['titulo'] = ' Ejemplo de CheckBox '.$_POST['idObj'];
			$data['js'] = '<script> $(document).ready(function (){ customCheckbox("rutas");  }) </script>'; //js para dar estilo
			$this->load->view('vf_checkboxes/v_checkboxes',$data);
		}
	}
	
	function setPropiedadesCheckBoxes($param, $checkeado,$desc_ruta){
		if($checkeado=='1'){
		   $Checkeado=TRUE;
		}else{
		   $checkeado=FALSE;
		}		
	        $props = array(
					'name'        => 'rutas',
					'id'          => $desc_ruta,
					'value'       => $param,
					'checked'     => $checkeado,
					'style'       => 'margin:10px',
			);
		return $props;
	}
	
	function updatearRuta($StringArray,$opc){	
		$nidSeleccionados = explode("_", $StringArray);
	    foreach($nidSeleccionados as $nidUpdatear){
		$update_data = array(//
		//	'nidRuta' => 3,
		//	'desc_ruta' =>'Capacitacion',
			'estado' => $opc,
		);
			$this->m_checkboxes->updatearRutaCertificacion($update_data, $nidUpdatear);
		}
		
	}
	
}

