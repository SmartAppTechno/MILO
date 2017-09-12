<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal_controller extends CI_Controller {
	public function exito()
	{
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
	        $data['mensaje'] = 'Tu compra se ha pagado exitosamente';
	        $this->load->model('ordenes_productos_model');
			$id_usuario = $this->session->userdata('usuario_id');
			$data['ordenes'] = $this->ordenes_productos_model->mostrar_ordenes($id_usuario);
			$data['estados'] = $this->ordenes_productos_model->get_estados();
			//Pagar orden
			$paypalInfo = $this->input->post();
			$this->load->model('carrito_model');
        	$cliente = $paypalInfo['custom'];
        	$orden = $this->carrito_model->get_ultima_compra($cliente);
        	$this->carrito_model->pagar_orden($orden);
	        $this->load->view('user/pages/ordenes_productos', $data);
		}else{
            redirect();
        }
	}
	public function cancelar()
	{
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$data['mensaje'] = 'Tu compra se ha cancelado';
			$this->load->model('ordenes_productos_model');
			$id_usuario = $this->session->userdata('usuario_id');
			$data['ordenes'] = $this->ordenes_productos_model->mostrar_ordenes($id_usuario);
			$data['estados'] = $this->ordenes_productos_model->get_estados();
	        $this->load->view('user/pages/ordenes_productos', $data);
		}else{
            redirect();
        }
	}
}