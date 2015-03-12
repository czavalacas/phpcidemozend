<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_bootstrap extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		//$this->load->model('m_consulta');
	}
	
	public function index(){
		$this->load->view('bootstrap');
	}
	//
}