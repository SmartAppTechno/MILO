<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
		//Revisar si hay una sesión iniciada
		if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
			redirect('panel');
		}else{
			$this->load->view('admin/login/index');
		}
	}
	public function iniciar_sesion(){
		if( $this->input->post('usuario') && $this->input->post('contrasenia') ){
			//Obtener datos del formulario
			$usuario = $this->input->post('usuario');
			$contrasenia = $this->input->post('contrasenia');
			//Cargar el modelo
			$this->load->model('login_model');
			//Validar que exista el usuario
			$usuario_existente = $this->login_model->validar_usuario($usuario);
			if(count($usuario_existente)>0){
				$usuario_existente = $usuario_existente[0];
				//Obtener el hash del usuario
				$hash = $this->login_model->obtener_hash($usuario);
				//Encriptar contraseña
				$aux = $contrasenia . $hash;
				$final = hash('sha256', $aux);
				//Obtener datos del usuario logueado
				$posible_usuario = $this->login_model->validar_credenciales($usuario,$final);
				//Validar que exista el usuario con esa contraseña
				if(count($posible_usuario)>0){
					$posible_usuario = $posible_usuario[0];
					//Crear la sesión
					$this->load->library('session');
					$this->session->set_userdata('usuario_nombre', $posible_usuario['nombre']);
					$rol = $this->login_model->get_rol($posible_usuario['rol']);
					$this->session->set_userdata('usuario_rol', $rol);
					//Permisos
					$permisos_db = $this->login_model->mostrar_permisos_usuario($posible_usuario['id']);
		            $permisos = array();
		            foreach ($permisos_db as $key => $permiso) {
		                $permisos[$permiso['menu']] = $permiso['estado'];
		            }
		            $this->session->set_userdata('usuario_permisos', $permisos);
					redirect('panel');
				}else{
					//Mostrar mensaje de que las credenciales son incorrectas
					$data['mensaje'] = 'La contraseña es incorrecta';
					$this->load->view('admin/login/index',$data);
				}
			}else{
				//Mostrar mensaje de que las credenciales son incorrectas
				$data['mensaje'] = 'El usuario no existe';
				$this->load->view('admin/login/index',$data);
			}
		}else{
			redirect('admin');
		}
	}
	public function cerrar_sesion(){
		//Borrar la sesión
		$this->load->library('session');
        $this->session->sess_destroy();
		//Mostrar el login
		redirect('admin');
	}
}