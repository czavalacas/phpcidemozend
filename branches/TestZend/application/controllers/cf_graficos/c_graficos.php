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
            //echo "<script language=\"javascript\">drawGrafic();</script>";
            echo "<script language=\"javascript\">drawGrafic1();</script>";
        }
    }
    
    function dataJSONusuaEst(){
        $usua = $this->m_usuario->getCountEstUsua();
        
        $re = json_encode($usua);
        
        echo $re;
    }
    
    function dataJSONusuaEst1(){
        $usua = $this->m_usuario->getCountEstUsua1();
    
        $re = json_encode($usua);
    
        echo $re;
    }
    
    function usuarioByEstado($estado){
        
        $usua = $this->m_usuario->getUsuariosbyEstado($estado);
        
        $tab = '      <div style="height:500px" class="table-responsive">
                            <table id="table" class="table table-bordered table-hover table-striped" data-show-columns="true">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">DNI</th>
                                        <th style="text-align:center">Nombres</th>
                                    </tr>
                                </thead>
                                <tbody>';
        
        foreach($usua as $fila){
            $tab.='<tr> ';
            $tab.='<th style="text-align:center">'.$fila['dni'].'</th> ';
            $tab.='<th style="text-align:center">'.$fila['nombres'].'</th> ';
            $tab.='</tr> ';
        }
        
        
        $tab.=' </tbody> </table> </div>';
        
        echo $tab;

        
        
    }
}