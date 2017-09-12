<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ocasiones_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('ocasiones_model');
            $data['ocasiones'] = $this->ocasiones_model->get_ocasiones();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/ocasiones/index',$data);
		}else{
            redirect('admin');
        }
	}
	public function nueva_ocasion(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('ocasiones_model');
            $data['membresias'] = $this->ocasiones_model->get_membresias();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/ocasiones/nueva',$data);
        }else{
            redirect('admin');
        }
	}
	public function crear_ocasion(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	$nombre = $this->input->post('nombre');
        	$membresia = $this->input->post('membresia');
            //Subir foto
            $config['upload_path'] = 'templates/ocasiones/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $data_upload_files = $this->upload->data();
            $foto = $config['upload_path'] . $data_upload_files['file_name'];
            //Poner marca de agua
            $config['image_library'] = 'gd2';
            $config['source_image'] = $data_upload_files['full_path'];
            $config['wm_type'] = 'overlay';
            $config['wm_overlay_path'] = 'templates/admin/images/marca_agua.png';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $this->load->library('image_lib', $config);
            $this->image_lib->watermark();
        	//Cargar el modelo
            $this->load->model('ocasiones_model');
            //Insertar en bd
            $this->ocasiones_model->insertar_ocasion($nombre,$foto,$membresia);
            redirect('ocasiones');
        }else{
            redirect('admin');
        }
	}
	public function editar_ocasion(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('ocasiones_model');
            $data['ocasion'] = $this->ocasiones_model->mostrar_ocasion($id);
            $data['membresias'] = $this->ocasiones_model->get_membresias();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/ocasiones/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_ocasion(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            $membresia = $this->input->post('membresia');
            //Cargar el modelo
            $this->load->model('ocasiones_model');
            if (isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])){
                //Subir foto
                $config['upload_path'] = 'templates/ocasiones/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->do_upload('foto');
                $data_upload_files = $this->upload->data();
                $foto = $config['upload_path'] . $data_upload_files['file_name'];
                //Poner marca de agua
                $config['image_library'] = 'gd2';
                $config['source_image'] = $data_upload_files['full_path'];
                $config['wm_type'] = 'overlay';
                $config['wm_overlay_path'] = 'templates/admin/images/marca_agua.png';
                $config['wm_vrt_alignment'] = 'middle';
                $config['wm_hor_alignment'] = 'center';
                $this->load->library('image_lib', $config);
                $this->image_lib->watermark();
                //Actualizar en bd
                $this->ocasiones_model->guardar_ocasion_foto($id,$nombre,$foto,$membresia);
                redirect('ocasiones');
            }else{
                //Actualizar en bd
                $this->ocasiones_model->guardar_ocasion($id,$nombre,$membresia);
                redirect('ocasiones');
            }
        }else{
            redirect('admin');
        }
    }
    public function eliminar_ocasion(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('ocasiones_model');
            $this->ocasiones_model->eliminar_ocasion($id);
            redirect('ocasiones');
        }else{
            redirect('admin');
        }
    }
}