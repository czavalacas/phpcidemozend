<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_notificacion extends CI_Controller {
    
    
    function __construct(){
        parent::__construct();
        $this->load->model('mf_notificacion/m_notificacion');
    }
    
    function index(){
        if(isset($_POST['idObj'])){
            $data['titulo'] = 'Titulo contenido '.$_POST['idObj'];
            $this->load->view('vf_notificacion/v_notificacion',$data);
            echo "<script language=\"javascript\">notificacion();</script>";
        }
    }
    
    function getCountNotificacionSinver(){
        $data = $this->m_notificacion->getcountNotificacionSinVer();
        $res = '';
        foreach($data as $row) {
            $res = $row->cantidad;
        }
        
        echo $res;
    }
    
    function getNotificaciones(){
        $data = $this->m_notificacion->getNotificaciones();
        $res = '';
        foreach($data as $fila){
            $res .= '<li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>'.'MENSAJE'.'</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> '.$fila['tiempo'].'</p>
                                        <p>'.$fila['contenido'].'</p>
                                    </div>
                                </div>
                            </a>
                        </li> ';
        }
        
        echo $res;
    }
    
    function getNotificacion(){
        $res = '';
        $tiempoActual = time();
        
        $fechaBD = time() + 100000000;
        
        while($fechaBD <= $tiempoActual){
            $data1 = $this->m_notificacion->getNotidicacionesTiempo();
            usleep(100000);
            $fechaBD = $data1;
        }
        
        $data = $this->m_notificacion->getNotificacion();
        $res = json_encode($data);
        
        echo $res;
    }
    
    function enviarNotif($texto){
        $tiempoActual = date('Y-m-d H:i:s');
        $newRow = array(
            "contenido" => $texto,
            "visto" => 1,
            "tiempo" => $tiempoActual
        );
        
        $this->m_notificacion->insertNotif($newRow);
    }
    
    function updateVisto(){
        $data =array(
            'visto' => 0
        );
        
        $this->m_notificacion->cambiarVisto($data);
    }
}