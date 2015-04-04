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
	
	public function enviarCorreo(){
		$myPostData  = json_decode($_POST['myPostData'],true);
		$correo      = $myPostData["correoEnvia"];
		$claveCorreo = $myPostData["claveCorreo"];
		$destino     = $myPostData["destino"];
		$asunto      = $myPostData["asunto"];
		$body        = $myPostData["body"];
		//log_message('error','datos: '.$correo.' '.$claveCorreo.' '.$destino.' '.$asunto.' '.$body);
		$res = $this->enviarCorreoGmail($correo, $claveCorreo, $destino, $asunto, $body);
		echo $res;
	}
	
	function enviarCorreoGmail($correo,$claveCorreo,$destino,$asunto,$body){
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
			'newline' => "\r\n"
		);
		//cargamos la configuración para enviar con gmail
		$this->email->initialize($configGmail);
	
		$this->email->from($correo);
		$this->email->to($destino);
		$this->email->subject($asunto);
		$this->email->message($body);
		$this->email->attach('uploads/CARTA_Trasera.pdf');
		//$this->email->send();
		if ($this->email->send()) {
			return "Se envió el correo!";
		} else {
			log_message('error','err: '.var_dump($this->email->print_debugger()));
			return "Hubo un error al enviar el correo";
		}
		//con esto podemos ver el resultado
		//log_message('error','err: '.var_dump($this->email->print_debugger()));
	}
}