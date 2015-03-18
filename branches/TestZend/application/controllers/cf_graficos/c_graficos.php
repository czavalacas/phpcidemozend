<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_graficos extends CI_Controller {
    
    
    function __construct(){
        parent::__construct();
        $this->load->model('mf_usuario/m_usuario');
    }
    
    function index(){
        if(isset($_POST['idObj'])){
            $data['titulo'] = 'Titulo contenido '.$_POST['idObj'];
            $this->load->view('vf_graficos/v_graficos',$data);
            echo "<script language=\"javascript\">drawGrafic();</script>";
        }
    }
    
    function dataJSONusuaEst(){
        $usua = $this->m_usuario->getCountEstUsua();
        
        $re = json_encode($usua);
        
        echo $re;
    }
}