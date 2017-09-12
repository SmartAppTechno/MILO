<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Capacitacion_presencial_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('capacitacion_presencial_model');
            $data['presencial'] = $this->capacitacion_presencial_model->get_presencial();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/presencial/index',$data);
		}else{
            redirect('admin');
        }
	}
    public function guardar_presencial(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $titulo = $this->input->post('titulo');
            $contenido = $this->input->post('contenido');
            //Cargar el modelo
            $this->load->model('capacitacion_presencial_model');
            if (isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])){
                //Subir foto
                $config['upload_path'] = 'templates/capacitacion/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->do_upload('foto');
                $data_upload_files = $this->upload->data();
                $foto = $config['upload_path'] . $data_upload_files['file_name'];
                //Actualizar en bd
                $this->capacitacion_presencial_model->guardar_presencial_foto($titulo,$foto,$contenido);
                redirect('presencial');
            }else{
                //Actualizar en bd
                $this->capacitacion_presencial_model->guardar_presencial($titulo,$contenido);
                redirect('presencial');
            }
            
        }else{
            redirect('admin');
        }
    }
}