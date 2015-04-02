<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_muchosamuchos extends CI_Controller {
    
    
    function __construct(){
        parent::__construct();
        $this->load->model('mf_usuario/m_usuario');
        $this->load->model('mf_menu/m_menu');
    }
    
    function index(){
        if(isset($_POST['idObj'])){
            $data['titulo'] = 'Titulo contenido '.$_POST['idObj'];
            $data['table'] = $this->init();
            $this->load->view('vf_muchosamuchos/v_muchosamuchos',$data);
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
        
        return $tab;
    }
    
    function traeDataRow($nid){
        
        $result = $this->m_usuario->getPermisosxUsuario($nid);
        
        $res = '';
        foreach($result as $fila){
            $res .=  '<form class="form-inline">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">idPermiso</div>
                          <input type="text" class="form-control" id="exampleInputAmount" value="'.$fila['id_menu'].'" disabled>
                        </div>
                              <br/>
                              <br/>
                        <div class="input-group">
                          <div class="input-group-addon">Descripcion</div>
                          <input type="text" class="form-control" id="exampleInputAmount" value="'.$fila['desc_menu'].'" disabled>
                        </div>
                                    
                      </div>
                    </form>
                              
                              <br/>';
             
        }
        
            

        
        
        echo $res;   
    }
    
    public function getlistaPermisos($nidUsuario){
        
        $result = $this->m_usuario->getPermisosxUsuario($nidUsuario);
        $result1 = $this->m_menu->getMenuByNotidUsuario($nidUsuario);
        
        $res = 'VERDE = ASIGNADO   -    ROJO = NO ASIGNADO  <br/>';
        
        $tipo = 1;
        
        foreach($result as $fila){
            $tipo = 0;
            $res.='<button type="button" id="'.$fila['id_menu'].'" onclick="agregarPermiso('.$fila['id_menu'].','.$nidUsuario.','.$tipo.')" class="btn btn-success">'.$fila['desc_menu'].'</button> <br/>';
        }
        
        foreach($result1 as $fila){
            $tipo = 1;
            $res.='<button type="button" id="'.$fila['id_menu'].'" onclick="agregarPermiso('.$fila['id_menu'].','.$nidUsuario.','.$tipo.')" class="btn btn-danger">'.$fila['desc_menu'].'</button> <br/>';
        }
        
        
        echo $res;
    }
    
    public function transPermisosUsuario(){
        
        $myPostData = json_decode($_POST['myPostData'],true);
        $nidPermiso = $myPostData["nidPermiso"];
        $nidUsuario = $myPostData["nidUsuario"];
        $tipo = $myPostData["tipo"];
        
        if($tipo == 1){
            $newRow = array(
                "id_menu" => $nidPermiso,
                "nidusuario" => $nidUsuario
            );
            
            $this->m_menu->insertarUsuarioMenu($newRow);
        }else{
            $this->m_menu->eliminarUsuarioMenu($nidUsuario,$nidPermiso);
        }
        
    }
}