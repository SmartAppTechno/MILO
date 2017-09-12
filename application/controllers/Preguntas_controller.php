<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Preguntas_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('preguntas_model');
            $data['preguntas'] = $this->preguntas_model->get_preguntas();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/preguntas/index',$data);
		}else{
            redirect('admin');
        }
	}
	public function nueva_pregunta(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/preguntas/nueva',$data);
        }else{
            redirect('admin');
        }
	}
	public function crear_pregunta(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	$pregunta = $this->input->post('pregunta');
        	$respuesta = $this->input->post('respuesta');
        	//Cargar el modelo
            $this->load->model('preguntas_model');
            //Insertar en bd
            $this->preguntas_model->insertar_pregunta($pregunta,$respuesta);
            redirect('preguntas');
        }else{
            redirect('admin');
        }
	}
	public function editar_pregunta(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('preguntas_model');
            $data['pregunta'] = $this->preguntas_model->mostrar_pregunta($id);
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/preguntas/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_pregunta(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $pregunta = $this->input->post('pregunta');
            $respuesta = $this->input->post('respuesta');
            //Cargar el modelo
            $this->load->model('preguntas_model');
            //Actualizar en bd
            $this->preguntas_model->guardar_pregunta($id,$pregunta,$respuesta);
            redirect('preguntas');
        }else{
            redirect('admin');
        }
    }
    public function eliminar_pregunta(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('preguntas_model');
            $this->preguntas_model->eliminar_pregunta($id);
            redirect('preguntas');
        }else{
            redirect('admin');
        }
    }
}