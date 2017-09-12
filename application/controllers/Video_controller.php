<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Video_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('video_model');
            $data['videos'] = $this->video_model->get_videos();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/videos/index',$data);
		}else{
            redirect('admin');
        }
	}
	public function nuevo_video(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('video_model');
            $data['categorias'] = $this->video_model->get_categorias();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/videos/nuevo',$data);
        }else{
            redirect('admin');
        }
	}
	public function crear_video(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	$video_id = $this->input->post('video_id');
        	$categoria = $this->input->post('categoria');
        	//Cargar el modelo
            $this->load->model('video_model');
            //Insertar en bd
            $this->video_model->insertar_video($video_id,$categoria);
            redirect('administrar_videos');
        }else{
            redirect('admin');
        }
	}
	public function editar_video(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('video_model');
            $data['video'] = $this->video_model->mostrar_video($id);
            $data['categorias'] = $this->video_model->get_categorias();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/videos/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_video(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $video_id = $this->input->post('video_id');
            $categoria = $this->input->post('categoria');
            //Cargar el modelo
            $this->load->model('video_model');
            //Actualizar en bd
            $this->video_model->guardar_video($id,$video_id,$categoria);
            redirect('administrar_videos');
        }else{
            redirect('admin');
        }
    }
    public function eliminar_video(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('video_model');
            $this->video_model->eliminar_video($id);
            redirect('administrar_videos');
        }else{
            redirect('admin');
        }
    }
}