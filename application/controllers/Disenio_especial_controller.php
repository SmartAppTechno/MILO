<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disenio_especial_controller extends CI_Controller {
	public function index()
	{
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->view('cliente/disenio_especial/index');
		}else{
            redirect();
        }
	}
	public function enviar_mensaje(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			//Subir foto
            $config['upload_path'] = 'templates/disenios_especiales/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
        	$data_upload_files = $this->upload->data();
        	$foto = $config['upload_path'] . $data_upload_files['file_name'];
			//Datos del formulario
			$cliente = $this->session->userdata('usuario_id');
			$descripcion = $this->input->post('descripcion');
			date_default_timezone_set('America/Mexico_City');
			$fecha = date("Y-m-d");
            //Guardar en la base de datos
	       	$this->load->model('disenio_especial_model');
	       	$this->disenio_especial_model->insertar_disenio($cliente,$foto,$descripcion,$fecha);
			//Mostrar página y mensaje de éxito
		 	$data['mensaje'] = 'Tu diseño especial se ha enviado correctamente.';
			$this->load->view('cliente/disenio_especial/index',$data);
		}else{
            redirect();
        }
	}
}