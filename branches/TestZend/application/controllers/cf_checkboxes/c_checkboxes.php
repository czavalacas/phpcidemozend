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
					$nidRuta=$row->nidruta;
					$desc_ruta= $row->desc_ruta;			
					$estado= $row->estado;
   
					$strConcatenado = $strConcatenado.form_checkbox($this->setPropiedadesCheckBoxes($nidRuta,$estado,$desc_ruta)).$desc_ruta.'<br>';
				}		
		
			$data['checkbox'] =	array($strConcatenado);
			
		    $data['titulo'] = ' Ejemplo de CheckBox '.$_POST['idObj'];
			$data['checkbox'] =	array($this->drawCheckBoxes());		
			$data['titulo'] = ' Ejemplo de CheckBox '.$_POST['idObj'];
			$data['js'] = '<script> $(document).ready(function (){ customCheckbox("rutas");  }) </script>'; //js para dar estilo
			$this->load->view('vf_checkboxes/v_checkboxes',$data);
		}
	}
	
	function drawCheckBoxes(){
		$rutas = $this->m_checkboxes->getRutaCertificacion();
		$strConcatenado='';
			
		foreach($rutas->result() as $row) {
			$nidRuta=$row->nidruta;
			$desc_ruta= $row->desc_ruta;
			$estado= $row->estado;
			 
			$strConcatenado .= '<label>'.form_checkbox($this->setPropiedadesCheckBoxes($nidRuta,$estado,$desc_ruta)).' '.$desc_ruta.'</label><br>';
		}
		return $strConcatenado;		
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
	function sumas($dato1,$dato2){
		$suma= $dato1+$dato2;
		echo $suma;
	}
	
	function getPopup(){
		$data = '  <div class="table-responsive">
   					 Nueva Ruta
   					 <input type="text" name="texto_ruta" id="inputRuta" value="" placeholder="Escriba Ruta"/>
			         <input id="newRuta" type="submit" value="Agregar"   onclick="agregarRuta();" /> 
    				</div>';
		echo $data;
	}
	
	function agregarNuevaRuta($desc_ruta){
	$insert_data = array(
							//se manda sin nid 
					'desc_ruta' => $desc_ruta ,
					'estado' => '0',
			);
		
		    $this->m_checkboxes->insertarRuta($insert_data);
		    
		    

		    $js='<script> $(document).ready(function (){ customCheckbox("rutas");  }) </script>';
		    $checkbox = $this->drawCheckBoxes();
		    echo $js;
		    echo $checkbox;
		    
	}
	
	
}
