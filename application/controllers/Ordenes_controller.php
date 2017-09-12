<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ordenes_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('ordenes_model');
            $data['ordenes'] = $this->ordenes_model->get_ordenes();
            $data['estados'] = $this->ordenes_model->get_estados();
            $data['total_pagado'] = $this->ordenes_model->total_pagado();
            $data['total_pendiente'] = $this->ordenes_model->total_pendiente();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/ordenes/index',$data);
		}else{
            redirect('admin');
        }
	}
	public function ver_orden(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Datos del formulario
            $id = $this->input->post('id');
            $cliente = $this->input->post('cliente');
        	//Cargar el modelo
        	$this->load->model('ordenes_model');
            $data['orden'] = $this->ordenes_model->get_orden($id);
            $data['cliente'] = $this->ordenes_model->get_direccion($cliente);
            $data['orden_id'] = $id;
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/ordenes/orden',$data);
		}else{
            redirect('admin');
        }
	}
    public function cambiar_estado_orden(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $estado = $this->input->post('estado');
            $orden = $this->input->post('orden');
            //Cargar el modelo
            $this->load->model('ordenes_model');
            $this->ordenes_model->cambiar_estado_orden($estado,$orden);
            redirect('ordenes');
        }else{
            redirect('admin');
        }
    }
	public function eliminar_orden(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Datos del formulario
            $id = $this->input->post('id');
        	//Cargar el modelo
        	$this->load->model('ordenes_model');
            $this->ordenes_model->eliminar_orden($id);
			redirect('ordenes');
		}else{
            redirect('admin');
        }
	}
}