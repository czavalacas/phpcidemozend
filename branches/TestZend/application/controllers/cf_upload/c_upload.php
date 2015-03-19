<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_upload extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$this->load->helper('html');
		if(isset($_POST['idObj'])){
			$data['titulo'] = 'Titulo contenido '.$_POST['idObj'];
			$image_properties = array(
					'src'   => '',
					'style' => 'display:none',
					'class' => 'post_images');
			$data['imagen'] = img($image_properties);
			$this->load->view('vf_upload/v_upload',$data);
		}
	}

	function do_upload(){
		$this->load->helper('html');//otra ruta>> D:/Work_Carpeta/
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']	= 1024 * 3;//KBs
		$config['max_width']  = '1300';
		$config['max_height']  = '2000';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload()){
			$data['error'] = $this->upload->display_errors();
			echo $data['error'];
		}else{
			$upload_data = $this->upload->data();
			$this->load->model('mf_upload/m_upload');
			$tituloImg = 'uploads/'.$upload_data['file_name'];
			$rutaMostrar = 'testzend/uploads/'.$upload_data['file_name'];
			if($upload_data['file_ext'] == '.pdf'){
				//log_message('error',print_r($upload_data,true));
				$data['objeto'] = '
				<object width="400" height="500" type="application/pdf"
						data="/'.$rutaMostrar.'?#zoom=85&scrollbar=0&toolbar=0&navpanes=0" id="pdf_content">
						<p>Hubo un error al mostrar el PDF.</p>
				</object>';
			}else{
				$image_properties = array('src' => $tituloImg,
                                          'class' => 'post_images');
				$data['objeto'] = img($image_properties);
			}
			$insert_data = array(
					'file_name' => $upload_data['file_name'],
					'file_type' => $upload_data['file_type'],
					'file_path' => $upload_data['file_path'],
					'full_path' => $upload_data['full_path'],
					'raw_name'  => $upload_data['raw_name'],
					'file_ext'  => $upload_data['file_ext'],
					'file_size' => $upload_data['file_size'],
					'ruta_mostrar' => $rutaMostrar,
					'is_image'     => $upload_data['is_image'],
					'image_width'  => empty($upload_data['image_width']) ? null : $upload_data['image_width'],
					'image_height' => empty($upload_data['image_height']) ? null : $upload_data['image_height'],
					'image_type'   => empty($upload_data['image_type']) ? null : $upload_data['image_type'],
					'image_size_str' => empty($upload_data['image_size_str']) ? null : $upload_data['image_size_str']
			);
			$this->m_upload->insertarArchivo($insert_data);
			echo $data['objeto'];
		}
	}
}