<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capacitacion_controller extends CI_Controller {
	public function videos(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('capacitacion_model');
			$id_usuario = $this->session->userdata('usuario_id');
			$data['membresia'] = $this->capacitacion_model->obtener_membresia($id_usuario)[0]['membresia'];
			$data['videos'] = $this->capacitacion_model->mostrar_videos();
			$data['categorias'] = $this->capacitacion_model->mostrar_videos_categorias();
			$this->load->view('cliente/capacitacion/videos',$data);
		}else{
            redirect();
        }
	}
	public function manuales(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('capacitacion_model');
			$id_usuario = $this->session->userdata('usuario_id');
			$data['membresia'] = $this->capacitacion_model->obtener_membresia($id_usuario)[0]['membresia'];
			$data['manuales'] = $this->capacitacion_model->mostrar_manuales();
			$data['categorias'] = $this->capacitacion_model->mostrar_manuales_categorias();
			$this->load->view('cliente/capacitacion/manuales',$data);
		}else{
            redirect();
        }
	}
	public function preguntas(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('capacitacion_model');
			$data['preguntas'] = $this->capacitacion_model->mostrar_preguntas();
			$this->load->view('cliente/capacitacion/preguntas_frecuentes',$data);
		}else{
            redirect();
        }
	}
    public function presencial(){
    	$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
	        $this->load->model('capacitacion_model');
	        $data['presencial'] = $this->capacitacion_model->ver_presencial();
	        $this->load->view('cliente/capacitacion/presencial',$data);
       	}else{
            redirect();
        }
    }
}