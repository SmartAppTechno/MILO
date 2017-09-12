<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Disenios_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('disenios_model');
            $data['disenios'] = $this->disenios_model->get_disenios();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/disenios/index',$data);
		}else{
            redirect('admin');
        }
	}
    public function solicitudes(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('disenios_model');
            $data['disenios'] = $this->disenios_model->get_solicitudes_especiales();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el dashboard
            $this->load->view('admin/disenios/solicitudes',$data);
        }else{
            redirect();
        }
    }
    public function disenios_especiales(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('disenios_model');
            $data['disenios'] = $this->disenios_model->get_disenios_especiales();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el dashboard
            $this->load->view('admin/disenios/especiales',$data);
        }else{
            redirect();
        }
    }
	public function nuevo_disenio(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('disenios_model');
            $data['productos'] = $this->disenios_model->get_categoria_productos();
            $data['ocasiones'] = $this->disenios_model->get_ocasiones();
            $data['categorias'] = $this->disenios_model->get_categorias();
            $data['membresias'] = $this->disenios_model->get_membresias();
            $data['clientes'] = $this->disenios_model->get_clientes();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/disenios/nuevo',$data);
        }else{
            redirect('admin');
        }
	}
	public function crear_disenio(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	$nombre = $this->input->post('nombre');
            $precio = $this->input->post('precio');
            $descripcion = $this->input->post('descripcion');
            $categoria = $this->input->post('categoria');
            $producto = $this->input->post('producto');
            $ocasion = $this->input->post('ocasion');
        	$membresia = $this->input->post('membresia');
            $cliente = $this->input->post('cliente');
            //Subir foto
            $config['upload_path'] = 'templates/disenios/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            if($this->upload->do_upload('foto')){
                $data_upload_files = $this->upload->data();
                $foto = $config['upload_path'] . $data_upload_files['file_name'];
                //Poner marca de agua
                $config_agua['image_library'] = 'gd2';
                $config_agua['source_image'] = $data_upload_files['full_path'];
                $config_agua['wm_type'] = 'overlay';
                $config_agua['wm_overlay_path'] = 'templates/admin/images/marca_agua.png';
                $config_agua['wm_vrt_alignment'] = 'middle';
                $config_agua['wm_hor_alignment'] = 'center';
                $this->load->library('image_lib', $config_agua);
                $this->image_lib->watermark();
                if($this->upload->do_upload('foto_impresion')){
                    $data_foto = $this->upload->data();
                    $foto_impresion = $config['upload_path'] . $data_foto['file_name'];
                    //Cargar el modelo
                    $this->load->model('disenios_model');
                    //Insertar en bd
                    $this->disenios_model->insertar_disenio($nombre,$precio,$descripcion,$foto,$foto_impresion,$categoria,$producto,$ocasion,$membresia,$cliente);
                    if($cliente == 0)
                        redirect('disenios');
                    else
                        redirect('administrar_disenio_especial');
                } 
            }
        }else{
            redirect('admin');
        }
	}
	public function editar_disenio(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('disenios_model');
            $data['disenio'] = $this->disenios_model->mostrar_disenio($id);
            $data['productos'] = $this->disenios_model->get_categoria_productos();
            $data['ocasiones'] = $this->disenios_model->get_ocasiones();
            $data['categorias'] = $this->disenios_model->get_categorias();
            $data['membresias'] = $this->disenios_model->get_membresias();
            $data['clientes'] = $this->disenios_model->get_clientes();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/disenios/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_disenio(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            $precio = $this->input->post('precio');
            $descripcion = $this->input->post('descripcion');
            $categoria = $this->input->post('categoria');
            $producto = $this->input->post('producto');
            $ocasion = $this->input->post('ocasion');
            $membresia = $this->input->post('membresia');
            $cliente = $this->input->post('cliente');
            //Cargar el modelo
            $this->load->model('disenios_model');
            if (isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name']) && isset($_FILES['foto_impresion']['name']) && !empty($_FILES['foto_impresion']['name'])){
                //Subir foto
                $config['upload_path'] = 'templates/disenios/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('foto')){
                    $data_upload_files = $this->upload->data();
                    $foto = $config['upload_path'] . $data_upload_files['file_name'];
                    //Poner marca de agua
                    $config_agua['image_library'] = 'gd2';
                    $config_agua['source_image'] = $data_upload_files['full_path'];
                    $config_agua['wm_type'] = 'overlay';
                    $config_agua['wm_overlay_path'] = 'templates/admin/images/marca_agua.png';
                    $config_agua['wm_vrt_alignment'] = 'middle';
                    $config_agua['wm_hor_alignment'] = 'center';
                    $this->load->library('image_lib', $config_agua);
                    $this->image_lib->watermark();
                    if($this->upload->do_upload('foto_impresion')){
                        $data_foto = $this->upload->data();
                        $foto_impresion = $config['upload_path'] . $data_foto['file_name'];
                        //Actualizar en bd
                        $this->disenios_model->guardar_disenio_fotos($id,$nombre,$precio,$descripcion,$foto,$foto_impresion,$categoria,$producto,$ocasion,$membresia,$cliente);
                        if($cliente == 0)
                            redirect('disenios');
                        else
                            redirect('administrar_disenio_especial');
                    } 
                }
            }elseif (isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])){
                //Subir foto
                $config['upload_path'] = 'templates/disenios/';
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
                $this->disenios_model->guardar_disenio_foto($id,$nombre,$precio,$descripcion,$foto,$categoria,$producto,$ocasion,$membresia,$cliente);
                if($cliente == 0)
                    redirect('disenios');
                else
                    redirect('administrar_disenio_especial');
            }elseif (isset($_FILES['foto_impresion']['name']) && !empty($_FILES['foto_impresion']['name'])){
                //Subir foto
                $config['upload_path'] = 'templates/disenios/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->do_upload('foto_impresion');
                $data_upload_files = $this->upload->data();
                $foto_impresion = $config['upload_path'] . $data_upload_files['file_name'];
                //Actualizar en bd
                $this->disenios_model->guardar_disenio_foto_impresion($id,$nombre,$precio,$descripcion,$foto_impresion,$categoria,$producto,$ocasion,$membresia,$cliente);
                if($cliente == 0)
                    redirect('disenios');
                else
                    redirect('administrar_disenio_especial');
            }else{
                //Actualizar en bd
                $this->disenios_model->guardar_disenio($id,$nombre,$precio,$descripcion,$categoria,$producto,$ocasion,$membresia,$cliente);
                if($cliente == 0)
                    redirect('disenios');
                else
                    redirect('administrar_disenio_especial');
            }
        }else{
            redirect('admin');
        }
    }
    public function eliminar_disenio(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('disenios_model');
            $this->disenios_model->eliminar_disenio($id);
            redirect('disenios');
        }else{
            redirect('admin');
        }
    }
}