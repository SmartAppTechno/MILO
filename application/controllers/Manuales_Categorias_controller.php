<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manuales_Categorias_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('manuales_categorias_model');
            $data['categorias'] = $this->manuales_categorias_model->get_categorias();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/categorias_manuales/index',$data);
		}else{
            redirect('admin');
        }
	}
	public function nueva_categoria_manuales(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('manuales_categorias_model');
            $data['membresias'] = $this->manuales_categorias_model->get_membresias();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/categorias_manuales/nueva',$data);
        }else{
            redirect('admin');
        }
	}
	public function crear_categoria_manuales(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	$nombre = $this->input->post('nombre');
        	$membresia = $this->input->post('membresia');
        	//Cargar el modelo
            $this->load->model('manuales_categorias_model');
            //Insertar en bd
            $this->manuales_categorias_model->insertar_categoria($nombre,$membresia);
            redirect('categorias_manuales');
        }else{
            redirect('admin');
        }
	}
	public function editar_categoria_manuales(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('manuales_categorias_model');
            $data['categoria'] = $this->manuales_categorias_model->mostrar_categoria($id);
            $data['membresias'] = $this->manuales_categorias_model->get_membresias();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/categorias_manuales/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_categoria_manuales(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            $membresia = $this->input->post('membresia');
            //Cargar el modelo
            $this->load->model('manuales_categorias_model');
            //Actualizar en bd
            $this->manuales_categorias_model->guardar_categoria($id,$nombre,$membresia);
            redirect('categorias_manuales');
        }else{
            redirect('admin');
        }
    }
    public function eliminar_categoria_manuales(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('manuales_categorias_model');
            $this->manuales_categorias_model->eliminar_categoria($id);
            redirect('categorias_manuales');
        }else{
            redirect('admin');
        }
    }
}