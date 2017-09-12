<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_controller extends CI_Controller {
	public function index()
	{
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('perfil_model');
			$id_usuario = $this->session->userdata('usuario_id');
			$data['nombre'] = $this->perfil_model->mostrar_perfil($id_usuario)[0]['nombre'];
			$data['email'] = $this->perfil_model->mostrar_perfil($id_usuario)[0]['email'];
			$data['foto'] = $this->perfil_model->mostrar_perfil($id_usuario)[0]['foto'];
			$data['paises'] = $this->perfil_model->mostrar_paises();
			$data['direccion'] = $this->perfil_model->mostrar_direccion($id_usuario);
			$this->load->view('cliente/perfil/index',$data);
		}else{
            redirect();
        }
	}
	public function guardar_direccion(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			//ID del usuario
			$id_usuario = $this->session->userdata('usuario_id');
			//Datos del formulario
			$calle = $this->input->post('calle');
			$numero = $this->input->post('numero');
			$colonia = $this->input->post('colonia');
			$postal = $this->input->post('postal');
			$estado = $this->input->post('estado');
			$pais = $this->input->post('pais');
			//Insertar a la bd
			$this->load->model('perfil_model');
			$this->perfil_model->direcion_db($id_usuario,$calle,$numero,$colonia,$postal,$estado,$pais);
			//Volver a cargar el perfil
			$data['nombre'] = $this->perfil_model->mostrar_perfil($id_usuario)[0]['nombre'];
			$data['email'] = $this->perfil_model->mostrar_perfil($id_usuario)[0]['email'];
			$data['foto'] = $this->perfil_model->mostrar_perfil($id_usuario)[0]['foto'];
			$data['paises'] = $this->perfil_model->mostrar_paises();
			$data['direccion'] = $this->perfil_model->mostrar_direccion($id_usuario);
			$this->load->view('cliente/perfil/index',$data);
		}else{
            redirect();
        }
	}
}