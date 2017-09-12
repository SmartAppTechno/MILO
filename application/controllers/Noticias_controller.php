<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Noticias_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('noticias_model');
            $data['noticias'] = $this->noticias_model->get_noticias();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/noticias/index',$data);
		}else{
            redirect('admin');
        }
	}
	public function nueva_noticia(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/noticias/nueva',$data);
        }else{
            redirect('admin');
        }
	}
	public function crear_noticia(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	$titulo = $this->input->post('titulo');
        	$contenido = $this->input->post('contenido');
            //Subir foto
            $config['upload_path'] = 'templates/noticias/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $data_upload_files = $this->upload->data();
            $foto = $config['upload_path'] . $data_upload_files['file_name'];
        	//Cargar el modelo
            $this->load->model('noticias_model');
            //Insertar en bd
            $this->noticias_model->insertar_noticia($titulo,$foto,$contenido);
            redirect('administrar_noticias');
        }else{
            redirect('admin');
        }
	}
	public function editar_noticia(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('noticias_model');
            $data['noticia'] = $this->noticias_model->mostrar_noticia($id);
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/noticias/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_noticia(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $titulo = $this->input->post('titulo');
            $contenido = $this->input->post('contenido');
            //Cargar el modelo
            $this->load->model('noticias_model');
            if (isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])){
                //Subir foto
                $config['upload_path'] = 'templates/noticias/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->do_upload('foto');
                $data_upload_files = $this->upload->data();
                $foto = $config['upload_path'] . $data_upload_files['file_name'];
                //Actualizar en bd
                $this->noticias_model->guardar_noticia_foto($id,$titulo,$foto,$contenido);
                redirect('administrar_noticias');
            }else{
                //Actualizar en bd
                $this->noticias_model->guardar_noticia($id,$titulo,$contenido);
                redirect('administrar_noticias');
            }
            
        }else{
            redirect('admin');
        }
    }
    public function eliminar_noticia(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('noticias_model');
            $this->noticias_model->eliminar_noticia($id);
            redirect('administrar_noticias');
        }else{
            redirect('admin');
        }
    }
}