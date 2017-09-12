<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Membresias_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('membresias_model');
            $data['membresias'] = $this->membresias_model->get_membresias();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/membresias/index',$data);
		}else{
            redirect('admin');
        }
	}
    public function editar_membresia(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('membresias_model');
            $data['membresia'] = $this->membresias_model->mostrar_membresia($id);
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/membresias/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_membresia(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            $precio = $this->input->post('precio');
            $impresiones = $this->input->post('impresiones');
            $descripcion = $this->input->post('descripcion');
            $lista = $this->input->post('lista');
            //Cargar el modelo
            $this->load->model('membresias_model');
            if (isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])){
                //Subir foto
                $config['upload_path'] = 'templates/membresias/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->do_upload('foto');
                $data_upload_files = $this->upload->data();
                $foto = $config['upload_path'] . $data_upload_files['file_name'];
                //Actualizar en bd
                $this->membresias_model->guardar_membresia_foto($id,$nombre,$precio,$impresiones,$descripcion,$lista,$foto);
                redirect('administrar_membresias');
            }else{
                //Actualizar en bd
                $this->membresias_model->guardar_membresia($id,$nombre,$precio,$impresiones,$descripcion,$lista);
                redirect('administrar_membresias');
            }
        }else{
            redirect('admin');
        }
    }
    public function pagos_membresias(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('membresias_model');
            $data['pagos'] = $this->membresias_model->pagos_membresias();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el dashboard
            $this->load->view('admin/membresias/pagos',$data);
        }else{
            redirect('admin');
        }
    }
    public function solicitudes_membresia(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('membresias_model');
            $data['solicitudes'] = $this->membresias_model->get_solicitudes();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el dashboard
            $this->load->view('admin/membresias/solicitudes',$data);
        }else{
            redirect('admin');
        }
    }
    public function ver_solicitud(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('membresias_model');
            $id = $this->input->post('id');
            $data['solicitud'] = $this->membresias_model->get_solicitud($id);
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el dashboard
            $this->load->view('admin/membresias/solicitud',$data);
        }else{
            redirect('admin');
        }
    }
}