<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_tabla_modal extends CI_Controller {
    
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_consulta');
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
        $sedes = $this->m_consulta->getArrayFunct();
        $tabla = $this->getDataCtrl($sedes);
        return $tabla;
    }
    
    function getDataCtrl($data){
      
        $tab="";
        
        $tab = '      <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" data-show-columns="true">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">DNI</th>
                                        <th style="text-align:center">Nombre</th>
                                        <th style="text-align:center">Correo</th>
                                        <th style="text-align:center">Boton</th>
                                    </tr>
                                </thead>
                                <tbody>';
        
        foreach($data as $fila){
            $est = $fila['estado'];
            if($est == 1){
                $tab.='<tr  class="success"> ';
                $tab.='<th style="text-align:center">'.$fila['dniprof'].'</th> ';
                $tab.='<th style="text-align:center">'.$fila['nombres'].'</th> ';
                $tab.='<th style="text-align:center">'.$fila['correo'].'</th> ';
                $tab.='<th style="text-align:center">'.'<button class="btn btn-primary btn-md" onclick="abrirModal('.$fila['dniprof'].')">Ver</button>'.'</th> ';
                $tab.='</tr> ';
            }
            else{
                $tab.='<tr class="danger"> ';
                $tab.='<th style="text-align:center">'.$fila['dniprof'].'</th> ';
                $tab.='<th style="text-align:center">'.$fila['nombres'].'</th> ';
                $tab.='<th style="text-align:center">'.$fila['correo'].'</th> ';
                $tab.='<th style="text-align:center">'.'<button class="btn btn-primary btn-md" onclick="abrirModal('.$fila['dniprof'].')">Ver</button>'.'</th> ';
                $tab.='</tr> ';
            }
        }
        
        
        $tab.=' </tbody> </table> </div>';
        
        
        
        
        
        $tabla = $this->table->generate();
        return $tab;
    }
    
    function traeDataRow($dni){
        
        $result = $this->m_consulta->getDataProfesorSelecc($dni);
        
        $res = 'fe';
        foreach($result as $fila){
            $res =  '<form class="form-inline">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">DNI</div>
                          <input type="text" class="form-control" id="exampleInputAmount" value="'.$fila['dniprof'].'" disabled>
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