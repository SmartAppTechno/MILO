<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos_membresia_controller extends CI_Controller {
	public function index()
	{
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('pagos_membresia_model');
			$id_usuario = $this->session->userdata('usuario_id');
			$data['membresias'] = $this->pagos_membresia_model->mostrar_membresias($id_usuario);
			$this->load->view('cliente/membresias/index',$data);
		}else{
            redirect();
        }
	}
}