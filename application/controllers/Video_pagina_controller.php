<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Video_pagina_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('video_pagina_model');
            $data['videos'] = $this->video_pagina_model->get_videos();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/videos_pagina/index',$data);
		}else{
            redirect('admin');
        }
	}
	public function nuevo_video_pagina(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('video_pagina_model');
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/videos_pagina/nuevo',$data);
        }else{
            redirect('admin');
        }
	}
	public function crear_video_pagina(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	$video_id = $this->input->post('video_id');
        	$orden = $this->input->post('orden');
        	//Cargar el modelo
            $this->load->model('video_pagina_model');
            //Insertar en bd
            $this->video_pagina_model->insertar_video($video_id,$orden);
            redirect('videos_pagina');
        }else{
            redirect('admin');
        }
	}
	public function editar_video_pagina(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('video_pagina_model');
            $data['video'] = $this->video_pagina_model->mostrar_video($id);
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/videos_pagina/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_video_pagina(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $video_id = $this->input->post('video_id');
            $orden = $this->input->post('orden');
            //Cargar el modelo
            $this->load->model('video_pagina_model');
            //Actualizar en bd
            $this->video_pagina_model->guardar_video($id,$video_id,$orden);
            redirect('videos_pagina');
        }else{
            redirect('admin');
        }
    }
    public function eliminar_video_pagina(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('video_pagina_model');
            $this->video_pagina_model->eliminar_video($id);
            redirect('videos_pagina');
        }else{
            redirect('admin');
        }
    }
}