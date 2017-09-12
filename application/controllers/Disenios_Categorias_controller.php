<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Disenios_Categorias_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('disenios_categorias_model');
            $data['categorias'] = $this->disenios_categorias_model->get_categorias();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/categorias_disenios/index',$data);
		}else{
            redirect('admin');
        }
	}
	public function nueva_categoria_disenios(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/categorias_disenios/nueva',$data);
        }else{
            redirect('admin');
        }
	}
	public function crear_categoria_disenios(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	$nombre = $this->input->post('nombre');
        	//Cargar el modelo
            $this->load->model('disenios_categorias_model');
            //Insertar en bd
            $this->disenios_categorias_model->insertar_categoria($nombre);
            redirect('categorias_disenios');
        }else{
            redirect('admin');
        }
	}
	public function editar_categoria_disenios(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('disenios_categorias_model');
            $data['categoria'] = $this->disenios_categorias_model->mostrar_categoria($id);
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/categorias_disenios/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_categoria_disenios(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            //Cargar el modelo
            $this->load->model('disenios_categorias_model');
            //Actualizar en bd
            $this->disenios_categorias_model->guardar_categoria($id,$nombre);
            redirect('categorias_disenios');
        }else{
            redirect('admin');
        }
    }
    public function eliminar_categoria_disenios(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('disenios_categorias_model');
            $this->disenios_categorias_model->eliminar_categoria($id);
            redirect('categorias_disenios');
        }else{
            redirect('admin');
        }
    }
}