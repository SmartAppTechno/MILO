<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Creaciones_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('creaciones_model');
            $data['creaciones'] = $this->creaciones_model->get_creaciones();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/creaciones/index',$data);
		}else{
            redirect('admin');
        }
	}
	public function ver_creacion(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
        	$this->load->model('creaciones_model');
            $data['creacion'] = $this->creaciones_model->ver_creacion($id);
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/creaciones/creacion',$data);
		}else{
            redirect('admin');
        }
	}
}