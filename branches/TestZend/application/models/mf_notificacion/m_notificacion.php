<?php
class M_notificacion extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getNotidicacionesTiempo(){
		$query = "select o.tiempo from notificacion o ORDER BY o.tiempo DESC LIMIT 1";
	    
	    $result = $this->db->query($query);
	    
	    $data = array();
	    
	    $res = '';
	    
	    foreach($result->result() as $row) {
	        $res = $row->tiempo;
	    }
	     
	    return $res;
	}
	
	function getNotificacion(){
	   $query = "SELECT o.contenido,o.tiempo from notificacion o ORDER BY o.tiempo DESC LIMIT 1";
	     
	    $result = $this->db->query($query);
	     
	    $data = array();
	    foreach($result->result() as $row) {
	        $fila = array("contenido"=>$row->contenido,"tiempo"=>$row->tiempo);
	        array_push($data, $fila);
	    }
	    
	    return $data;
	}
	
	function getcountNotificacionSinVer(){
	    $query = "SELECT count(o) as cantidad from notificacion o WHERE o.visto = 1";
	
	    $result = $this->db->query($query);
	    
	    $res = $result->result();
	     
	    return $res;
	}
	
    function insertNotif($insert_data){
    		$this->db->insert('notificacion', $insert_data);
    }
    
    function getNotificaciones(){
        
        
        $data = $this->getcountNotificacionSinVer();
        $res = '';
        foreach($data as $row) {
            $res = $row->cantidad;
        }
        
        $query = '';
        
        if($res >= 5){
            $query = "SELECT o.contenido,o.tiempo,o.visto from notificacion o WHERE o.visto = 1 ORDER BY o.tiempo DESC";
        }else{
            $query = "SELECT o.contenido,o.tiempo,o.visto from notificacion o ORDER BY o.tiempo DESC LIMIT 5";
        }

        $result = $this->db->query($query);
        
        $data = array();
        foreach($result->result() as $row) {
            $fila = array("contenido"=>$row->contenido,"tiempo"=>$row->tiempo,"visto"=>$row->visto);
            array_push($data, $fila);
        }
         
        return $data;
    }
    
    function cambiarVisto($data){
        $this->db->where("visto",1);
        $this->db->update("notificacion",$data);
    }
	
}
