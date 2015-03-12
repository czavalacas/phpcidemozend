<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_combo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_consulta');
	}

	public function index(){
		if(isset($_POST['idObj'])){
			$data['titulo'] = 'Titulo contenido '.$_POST['idObj'];
			$sedes = $this->m_consulta->getDataArrayCombo();
			form_open('insert');//document.getElementById(\'table_div\')
			$js = 'id="field1" onChange = "drawAulasTabla(this.value,$(\'#table_div\')[0]); loadDropdown($(\'#field2\'),this.value); " ';
			$data['combo1'] = form_dropdown('field1', $sedes, NULL, $js);
			$data['combo2'] = form_dropdown('field2', array('0' => '...'), NULL, 'id="field2"');
			form_close();
			$this->load->view('vf_combo/v_combo',$data);
		}
	}
	//
}