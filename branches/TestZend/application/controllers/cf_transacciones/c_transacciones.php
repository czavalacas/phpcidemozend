<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_transacciones extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('mf_checkboxes/m_checkboxes');
    }
    
    public function index(){
        if(isset($_POST['idObj'])){
            $data['titulo'] = 'Titulo contenido '.$_POST['idObj'];
            
            $data['table'] = $this->generarTabbla();
            
            $this->load->view('vf_transacciones/v_transacciones',$data);
        }
    }
    
    public function insertarRuta(){
        
        $myPostData = json_decode($_POST['myPostData'],true);
    	$descrip = $myPostData["descrip"];
    	$estado = $myPostData["estado"];
        
        $newRow = array(
            "desc_ruta" => $descrip,
            "estado" => $estado
        );
        
        $this->m_checkboxes->insertRuta($newRow);
		
    }
    
    
    public function generarRows($rutas){
        $tab = '';
        foreach($rutas->result() as $row) {
            $nidRuta=$row->nidruta;
            $desc_ruta= $row->desc_ruta;
            $estado= $row->estado;
        
            if($estado == 1){
                $tab.='<tr  class="success"> ';
            }
            else{
                $tab.='<tr class="danger"> ';
            }
            $tab.='<th style="text-align:center">'.$desc_ruta.'</th> ';
            $tab.='<th style="text-align:center">'.'<button class="btn btn-primary btn-md"onclick="abrirModal('."'edit',"."".$nidRuta."".')">Editar</button>'.'   '.'<button class="btn btn-danger btn-md" onclick="abrirModal('."'elim',"."".$nidRuta."".')">Eliminar</button>'.'</th> ';
            $tab.='</tr> ';
        
        }
        
        return $tab;
    }
    
    public function generarTabbla(){
        $rutas = $this->m_checkboxes->getRutaCertificacion();
        $tab="";
        
        $tab = '      <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" data-show-columns="true">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Descripcion</th>
                                        <th style="text-align:center">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>';
        $tab.= $this->generarRows($rutas);
        $tab.=' </tbody> </table> </div>';
        
        return $tab;
    }

    
    public function traeInfoRuta($nid){
        $ruta = $this->m_checkboxes->getRutabyNid($nid);
        $res = '';
        foreach($ruta->result() as $row) {
            $nidRuta=$row->nidruta;
            $desc_ruta= $row->desc_ruta;
            $estado= $row->estado;
            
            $res.=  '<form class="form-inline">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">Ruta</div>
                          <input type="text" class="form-control" id="exampleInputAmount" value="'.$desc_ruta.'" disabled>
                        </div>
                              <br/>
                              <br/>
                        <div class="input-group">
                          <div class="input-group-addon">Estado</div>';
                          
            
            if($estado == 1){
                $res.='<input type="text" class="form-control" id="exampleInputAmount" value="'.'Activo'.'" disabled>';
            }else{
                $res.='<input type="text" class="form-control" id="exampleInputAmount" value="'.'Inactivo'.'" disabled>';
            }
            
            $res.='                        </div>
            
                      </div>
                    </form>';
        }
        
        echo $res;
    }
    
    function traeInfoRuta1($nid){
        $ruta = $this->m_checkboxes->getRutabyNid($nid);
        $res = '';
        foreach($ruta->result() as $row) {
            $nidRuta=$row->nidruta;
            $desc_ruta= $row->desc_ruta;
            $estado= $row->estado;
        
            $res.=  '<form class="form-inline">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">Ruta</div>
                          <input type="text" class="form-control" id="descripcionEdit" name="descripcionEdit" value="'.$desc_ruta.'">
                        </div>
                              <br/>
                              <br/>
                        <div class="input-group">
                          <div class="input-group-addon">Estado</div>';
        
        
            if($estado == 1){
                $res.=' <input name="estadoEdit" type="checkbox" id="estadoEdit" checked="checked"></input>';
            }else{
                $res.=' <input name="estadoEdit" type="checkbox" id="estadoEdit"></input>';
            }
        
            $res.='                        </div>
        
                      </div>
                    </form>';
        }
        
        echo $res;
    }
    function eliminarRuta($nid){
        $this->m_checkboxes->elimRuta($nid);
    }
    
    function editarRuta(){
        $myPostData = json_decode($_POST['myPostData'],true);
        $descrip = $myPostData["descrip"];
        $estado = $myPostData["estado"];
        $nid = $myPostData["nid"];
        
        $data =array(
            'desc_ruta' => $descrip,
            'estado' => $estado
        );
        
        $this->m_checkboxes->editRuta($data,$nid);
        
    }
      
}