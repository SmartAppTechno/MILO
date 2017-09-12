<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manual_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('manual_model');
            $data['manuales'] = $this->manual_model->get_manuales();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/manuales/index',$data);
		}else{
            redirect('admin');
        }
	}
	public function nuevo_manual(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
            $this->load->model('manual_model');
            $data['categorias'] = $this->manual_model->get_categorias();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/manuales/nuevo',$data);
        }else{
            redirect('admin');
        }
	}
	public function crear_manual(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	$titulo = $this->input->post('titulo');
        	$categoria = $this->input->post('categoria');
            //Subir documento
            $config['upload_path'] = 'templates/documentos/';
            $config['allowed_types'] = 'pdf';
            $this->load->library('upload', $config);
            $this->upload->do_upload('documento');
            $data_upload_files = $this->upload->data();
            $documento = $config['upload_path'] . $data_upload_files['file_name'];
        	//Cargar el modelo
            $this->load->model('manual_model');
            //Insertar en bd
            $this->manual_model->insertar_manual($titulo,$documento,$categoria);
            redirect('administrar_manuales');
        }else{
            redirect('admin');
        }
	}
	public function editar_manual(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('manual_model');
            $data['manual'] = $this->manual_model->mostrar_manual($id);
            $data['categorias'] = $this->manual_model->get_categorias();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/manuales/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_manual(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $titulo = $this->input->post('titulo');
            $categoria = $this->input->post('categoria');
            //Cargar el modelo
            $this->load->model('manual_model');
            if (isset($_FILES['documento']['name']) && !empty($_FILES['documento']['name'])){
                //Subir documento
                $config['upload_path'] = 'templates/documentos/';
                $config['allowed_types'] = 'pdf';
                $this->load->library('upload', $config);
                $this->upload->do_upload('documento');
                $data_upload_files = $this->upload->data();
                $documento = $config['upload_path'] . $data_upload_files['file_name'];
                //Actualizar en bd
                $this->manual_model->guardar_manual_documento($id,$titulo,$documento,$categoria);
                redirect('administrar_manuales');
            }else{
                //Actualizar en bd
                $this->manual_model->guardar_manual($id,$titulo,$categoria);
                redirect('administrar_manuales');
            }
            
        }else{
            redirect('admin');
        }
    }
    public function eliminar_manual(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('manual_model');
            $this->manual_model->eliminar_manual($id);
            redirect('administrar_manuales');
        }else{
            redirect('admin');
        }
    }
}