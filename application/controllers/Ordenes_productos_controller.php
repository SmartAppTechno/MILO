<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes_productos_controller extends CI_Controller {
	public function index()
	{
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('ordenes_productos_model');
			$id_usuario = $this->session->userdata('usuario_id');
			$data['ordenes'] = $this->ordenes_productos_model->mostrar_ordenes($id_usuario);
			$data['estados'] = $this->ordenes_productos_model->get_estados();
			$this->load->view('cliente/ordenes/index',$data);
		}else{
            redirect();
        }
	}
	public function ver_orden()
	{
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('ordenes_productos_model');
			$id_orden = $this->uri->segment(2);
			$data['orden_id'] = $id_orden;
			$data['productos'] = $this->ordenes_productos_model->mostrar_orden_productos($id_orden);
			$data['disenios'] = $this->ordenes_productos_model->mostrar_orden_disenios($id_orden);
			$this->load->view('cliente/ordenes/ver_orden',$data);
		}else{
            redirect();
        }
	}
}