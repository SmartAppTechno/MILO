<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider_Promociones_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('slider_promociones_model');
            $data['fotos'] = $this->slider_promociones_model->get_fotos();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/slider_promociones/index',$data);
		}else{
            redirect('admin');
        }
	}
	public function nueva_promocion(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('slider_promociones_model');
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/slider_promociones/nueva',$data);
        }else{
            redirect('admin');
        }
	}
	public function crear_promocion(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	$orden = $this->input->post('orden');
            //Subir foto
            $config['upload_path'] = 'templates/slider_promociones/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $data_upload_files = $this->upload->data();
            $foto = $config['upload_path'] . $data_upload_files['file_name'];
        	//Cargar el modelo
            $this->load->model('slider_promociones_model');
            //Insertar en bd
            $this->slider_promociones_model->insertar_foto($foto,$orden);
            redirect('slider_promociones');
        }else{
            redirect('admin');
        }
	}
	public function editar_promocion(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('slider_promociones_model');
            $data['foto'] = $this->slider_promociones_model->mostrar_foto($id);
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/slider_promociones/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_promocion(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $orden = $this->input->post('orden');
            //Cargar el modelo
            $this->load->model('slider_promociones_model');
            if (isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])){
                //Subir foto
                $config['upload_path'] = 'templates/slider_promociones/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->do_upload('foto');
                $data_upload_files = $this->upload->data();
                $foto = $config['upload_path'] . $data_upload_files['file_name'];
                //Actualizar en bd
                $this->slider_promociones_model->guardar_foto($id,$foto,$orden);
                redirect('slider_promociones');
            }else{
                //Actualizar en bd
                $this->slider_promociones_model->guardar_orden($id,$orden);
                redirect('slider_promociones');
            }
        }else{
            redirect('admin');
        }
    }
    public function eliminar_promocion(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('slider_promociones_model');
            $this->slider_promociones_model->eliminar_foto($id);
            redirect('slider_promociones');
        }else{
            redirect('admin');
        }
    }
}