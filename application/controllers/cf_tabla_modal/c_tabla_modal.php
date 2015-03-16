<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_tabla_modal extends CI_Controller {
    
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_consulta');
        $this->load->model('mf_usuario/m_usuario');
        $this->load->library('table');
    }
    
    public function index(){
        if(isset($_POST['idObj'])){
            $data['titulo'] = 'Titulo contenido '.$_POST['idObj'];
            $data['table'] = $this->init();
            $this->load->view('vf_tabla_modal/v_tabModal',$data);
        }
    }
    
    public function init(){
        $usua = $this->m_usuario->getallUsuaPostgres();
        $tabla = $this->getDataCtrl($usua);
        return $tabla;
    }
    
    function getDataCtrl($data){
      
        $tab="";
        
        $tab = '      <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" data-show-columns="true">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">NidUusuario</th>
                                        <th style="text-align:center">Usuario</th>
                                        <th style="text-align:center">Correo</th>
                                        <th style="text-align:center">Boton</th>
                                    </tr>
                                </thead>
                                <tbody>';
        
        foreach($data as $fila){
            $est = $fila['estado_usuario'];
            if($est == 1){
                $tab.='<tr  class="success"> ';
            }
            else{
                $tab.='<tr class="danger"> ';
            }
            $tab.='<th style="text-align:center">'.$fila['nidusuario'].'</th> ';
            $tab.='<th style="text-align:center">'.$fila['usuario'].'</th> ';
            $tab.='<th style="text-align:center">'.$fila['correo'].'</th> ';
            $tab.='<th style="text-align:center">'.'<button class="btn btn-primary btn-md" onclick="abrirModal('.$fila['nidusuario'].')">Ver</button>'.'</th> ';
            $tab.='</tr> ';
        }
        
        
        $tab.=' </tbody> </table> </div>';
        
        
        
        
        
        $tabla = $this->table->generate();
        return $tab;
    }
    
    function traeDataRow($nid){
        
        $result = $this->m_usuario->getDataUsuarioSelecc($nid);
        
        $res = '';
        foreach($result as $fila){
            $res =  '<form class="form-inline">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">DNI</div>
                          <input type="text" class="form-control" id="exampleInputAmount" value="'.$fila['dni'].'" disabled>
                        </div>
                              <br/>
                              <br/>
                        <div class="input-group">
                          <div class="input-group-addon">Nombres</div>
                          <input type="text" class="form-control" id="exampleInputAmount" value="'.$fila['nombres'].'" disabled>
                        </div>
                                    
                      </div>
                    </form>';
        }
        
            

        
        
        echo $res;   
    }
    
    
}