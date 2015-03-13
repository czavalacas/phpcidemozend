<?php
class M_usuario extends CI_Model{
	//http://www.codeigniter.com/userguide3/database/results.html
	function __construct(){
		parent::__construct();
	}
	
	function mLogearUsuarioMySql($s_usr,$s_pwd){
		if(isset($s_usr) && isset($s_pwd)){
			$res = $this->db->query("SELECT AES_ENCRYPT('".$s_pwd."','".$s_pwd."') as encry");
			if ($res->num_rows() > 0) {
				$s_pwd = $res->row()->encry;
			}
			$sql = " Select *
	                   From mmsi_sped.admusua o
	                  Where o.usuario = ?
				        And o.clave   = ?
	                    And o.estado_usuario = '1' Limit 1 ";
			$result = $this->db->query($sql, array($s_usr, $s_pwd));
			return $result;
		}
		return null;
	}
	
	function mLogearUsuarioPostgresql($s_usr,$s_pwd){
		if(isset($s_usr) && isset($s_pwd)){
			$res = $this->db->query("SELECT encrypt('".$s_pwd."','".$s_pwd."','aes') as encry");
			if ($res->num_rows() > 0) {
				$s_pwd = $res->row()->encry;
			}
			$sql = " Select *
	                   From admusua o
	                  Where o.usuario = ?
				        And o.clave   = ?
	                    And o.estado_usuario = '1' Limit 1 ";
			$result = $this->db->query($sql, array($s_usr, $s_pwd));
			return $result;
		}
		return null;
	}
	
	function getUsuarioLogin($s_usr,$s_pwd){
		//$result = $this->mLogearUsuarioMySql($s_usr, $s_pwd);
		$result = $this->mLogearUsuarioPostgresql($s_usr, $s_pwd);
		$data = array();
		if($result->num_rows() == 1){
			$data = $result->row_array();
			//log_message('error','$data: '.print_r($data,true));
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
/*
 CREATE EXTENSION pgcrypto;

select convert_from(decrypt((select encrypt('123456789012345','1234','aes')),'1234','aes'),'SQL_ASCII');


select encrypt('123456789012345','1234','aes');

select encrypt('123456789012345','1234','aes');

update admusua set clave = '123' where nidusuario = 19;
select * from admusua o where o.usuario = 'admin';
Select s.nidsede,s.desc_sede From admsede s;
delete from admusua;
 * *
 */