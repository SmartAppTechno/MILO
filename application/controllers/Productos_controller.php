<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productos_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('productos_model');
            $data['productos'] = $this->productos_model->get_productos();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/productos/index',$data);
		}else{
            redirect('admin');
        }
	}
	public function nuevo_producto(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('productos_model');
            $data['categorias'] = $this->productos_model->get_categorias();
            $data['membresias'] = $this->productos_model->get_membresias();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/productos/nuevo',$data);
        }else{
            redirect('admin');
        }
	}
	public function crear_producto(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	$nombre = $this->input->post('nombre');
            $precio = $this->input->post('precio');
            $descripcion = $this->input->post('descripcion');
            $ancho = $this->input->post('ancho');
            $alto = $this->input->post('alto');
            $categoria = $this->input->post('categoria');
        	$membresia = $this->input->post('membresia');
            //Subir foto
            $config['upload_path'] = 'templates/productos/';
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
            $this->load->model('productos_model');
            //Insertar en bd
            $this->productos_model->insertar_producto($nombre,$precio,$descripcion,$foto,$ancho,$alto,$categoria,$membresia);
            redirect('productos');
        }else{
            redirect('admin');
        }
	}
	public function editar_producto(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('productos_model');
            $data['producto'] = $this->productos_model->mostrar_producto($id);
            $data['categorias'] = $this->productos_model->get_categorias();
            $data['membresias'] = $this->productos_model->get_membresias();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/productos/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_producto(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            $precio = $this->input->post('precio');
            $descripcion = $this->input->post('descripcion');
            $ancho = $this->input->post('ancho');
            $alto = $this->input->post('alto');
            $categoria = $this->input->post('categoria');
            $membresia = $this->input->post('membresia');
            //Cargar el modelo
            $this->load->model('productos_model');
            if (isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])){
                //Subir foto
                $config['upload_path'] = 'templates/productos/';
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
                $this->productos_model->guardar_producto_foto($id,$nombre,$precio,$descripcion,$foto,$ancho,$alto,$categoria,$membresia);
                redirect('productos');
            }else{
                //Actualizar en bd
                $this->productos_model->guardar_producto($id,$nombre,$precio,$descripcion,$ancho,$alto,$categoria,$membresia);
                redirect('productos');
            }
        }else{
            redirect('admin');
        }
    }
    public function eliminar_producto(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('productos_model');
            $this->productos_model->eliminar_producto($id);
            redirect('productos');
        }else{
            redirect('admin');
        }
    }
}