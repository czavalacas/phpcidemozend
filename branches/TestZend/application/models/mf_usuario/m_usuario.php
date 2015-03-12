<?php
class M_usuario extends CI_Model{
	//http://www.codeigniter.com/userguide3/database/results.html
	function __construct(){
		parent::__construct();
	}
	
	function mLogearUsuario($s_usr,$s_pwd){
		if(isset($s_usr) && isset($s_pwd)){
			$sql = " Select *
	                   From mmsi_sped.admusua o
	                  Where o.usuario = ?
				        And o.dni     = ?
	                    And o.estado_usuario = '1' Limit 1 ";
			$result = $this->db->query($sql, array($s_usr, $s_pwd));
			//$result = mysql_query($sql) /*or die ($query)*/;
			return $result;
		}
		return null;
	}
	
	function getUsuarioLogin($s_usr,$s_pwd){
		$result = $this->mLogearUsuario($s_usr, $s_pwd);
		$data = array();
		if($result->num_rows() > 0){
			$data = $result->row_array();
			/*foreach ($result->result_array() as $row){
				$data = $row;
				/*echo $row['title'];
				echo $row['name'];
				echo $row['body'];*/
			//}
			/*foreach ($result->result() as $row){
				$data['nombres']    = $row->nombres;
				$data['correo']     = $row->correo;
				$data['nidUsuario'] = $row->nidUsuario;
			}*/
			/*while ($row = mysql_fetch_array($result)) {
				$data['nombres']    = $row['nombres'];
				$data['correo']     = $row['correo'];
				$data['nidUsuario'] = $row['nidUsuario'];
			}*/
		}/*else{
			$error = $this->db->_error_message();
			log_message('error','errrro: '.$error);
		}*/
		return $data;
	}
}