<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Distribuidores_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('distribuidores_model');
            $data['distribuidores'] = $this->distribuidores_model->get_distribuidores();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/distribuidores/index',$data);
		}else{
            redirect('admin');
        }
	}
    public function cargar_mapa($latitud,$longitud){
        $this->load->library('googlemaps');
        $config['center'] = $latitud.','.$longitud;
        $config['zoom'] = '16';
        $this->googlemaps->initialize($config);
        $marker = array();
        $marker['position'] = $latitud.','.$longitud;
        $marker['draggable'] = true;
        $marker['ondragend'] = 'updatemapa(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
        return $this->googlemaps->create_map();
    }
	public function nuevo_distribuidor(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            $data['map'] = $this->cargar_mapa(22.775760, -102.572484);
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/distribuidores/nuevo',$data);
        }else{
            redirect('admin');
        }
	}
	public function crear_distribuidor(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	$nombre = $this->input->post('nombre');
        	$contacto = $this->input->post('contacto');
            $latitud = $this->input->post('latitud');
            $longitud = $this->input->post('longitud');
        	//Cargar el modelo
            $this->load->model('distribuidores_model');
            //Insertar en bd
            $this->distribuidores_model->insertar_distribuidor($nombre,$contacto,$latitud,$longitud);
            redirect('distribuidores');
        }else{
            redirect('admin');
        }
	}
	public function editar_distribuidor(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('distribuidores_model');
            $distribuidor = $this->distribuidores_model->mostrar_distribuidor($id);
            $data['distribuidor'] = $distribuidor;
            $data['map'] = $this->cargar_mapa($distribuidor['latitud'], $distribuidor['longitud']);
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/distribuidores/editar',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_distribuidor(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            $contacto = $this->input->post('contacto');
            $latitud = $this->input->post('latitud');
            $longitud = $this->input->post('longitud');
            //Cargar el modelo
            $this->load->model('distribuidores_model');
            //Actualizar en bd
            $this->distribuidores_model->guardar_distribuidor($id,$nombre,$contacto,$latitud,$longitud);
            redirect('distribuidores');
        }else{
            redirect('admin');
        }
    }
    public function eliminar_distribuidor(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('distribuidores_model');
            $this->distribuidores_model->eliminar_distribuidor($id);
            redirect('distribuidores');
        }else{
            redirect('admin');
        }
    }
}