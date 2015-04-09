<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_mail extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		if(isset($_POST['idObj'])){
			$data['titulo'] = 'Titulo contenido '.$_POST['idObj'];
			$this->load->view('vf_mail/v_mail',$data);
		}
	}
	
  public function enviarCorreo(){//metodo
		$myPostData  = json_decode($_POST['myPostData'],true);
		$correo      = $myPostData["correoEnvia"];
		$claveCorreo = $myPostData["claveCorreo"];
		$destino     = $myPostData["destino"];
		$asunto      = $myPostData["asunto"];
		$body        = $myPostData["body"];
		$adjuntoRuta = $myPostData['adjuntoRuta'];
		//log_message('error','datos: '.$correo.' '.$claveCorreo.' '.$destino.' '.$asunto.' '.$body);
		$res = $this->enviarCorreoGmail($correo, $claveCorreo, $destino, $asunto, $body,$adjuntoRuta);
		echo $res;
	}
	
	function enviarCorreoGmail($correo,$claveCorreo,$destino,$asunto,$body,$adjuntoRuta){
		//cargamos la libreria email del  CI
		$this->load->library("email");
		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => $correo,
			'smtp_pass' => $claveCorreo,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n",
			'starttls' => TRUE
		);
		//cargamos la configuración para enviar con gmail
		$this->email->initialize($configGmail);
	
		$this->email->from($correo);
		$this->email->to($destino);
		$this->email->subject($asunto);
		$this->email->message($body);
		$errAdj = substr($adjuntoRuta,1,1);
		if($errAdj != '1'){
			$this->email->attach($adjuntoRuta);
		}
		if ($this->email->send()) {
			return "Se envio el correo!";
		} else {
			log_message('error','err: '.var_dump($this->email->print_debugger()));
			if($errAdj == '1'){
				$errAdj = substr($adjuntoRuta, 1);
			}else{
				$errAdj = null;
			}
			return "Hubo un error al enviar el correo. ".$errAdj;
		}
	}
	
	function do_upload(){
		$config['upload_path'] = './uploads/';//otra ruta>> D:/Work_Carpeta/
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']	= 1024 * 3;//KBs
		$config['max_width']  = '4000';
		$config['max_height']  = '4000';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload()){
			$data['error'] = $this->upload->display_errors();
			echo '1'.$data['error'];
		}else{
			$upload_data = $this->upload->data();
			$tituloImg = 'uploads/'.$upload_data['file_name'];
			log_message('error','ruta: '.$tituloImg);
			echo $tituloImg;
		}
	}
}