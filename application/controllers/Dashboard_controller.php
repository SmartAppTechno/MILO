<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
        	//Cargar el modelo
        	$this->load->model('dashboard_model');
        	//Cargar Estadísticas
        	$data['clientes'] = $this->dashboard_model->count_clientes();
        	$data['productos'] = $this->dashboard_model->count_productos();
        	$data['disenios'] = $this->dashboard_model->count_disenios();
        	$data['ocasiones'] = $this->dashboard_model->count_ocasiones();
        	//Membresías
            $membresias_db = $this->dashboard_model->get_membresias();
            $membresias = array();
            foreach ($membresias_db as $key => $membresia) {
                $membresias[$membresia['id']] = $membresia['nombre'];
            }
            $membresias_usuarios = array();
            foreach ($membresias as $key => $membresia){
                $id = $key;
                $membresias_usuarios[$key] = $this->dashboard_model->count_membresia($id);
            }
            $data['membresias'] = $membresias;
            $data['membresias_usuarios'] = $membresias_usuarios;
            //Creaciones
        	$data['cd'] = $this->dashboard_model->cantidad_creaciones_diarias();
        	$data['cs'] = $this->dashboard_model->cantidad_creaciones_semanales();
        	$data['cm'] = $this->dashboard_model->cantidad_creaciones_mensuales();
        	$data['ca'] = $this->dashboard_model->cantidad_creaciones_anuales();
            //Órdenes
        	$data['od'] = $this->dashboard_model->ordenes_diarias();
        	$data['cod'] = $this->dashboard_model->cantidad_ordenes_diarias();
        	$data['os'] = $this->dashboard_model->ordenes_semanales();
        	$data['cos'] = $this->dashboard_model->cantidad_ordenes_semanales();
        	$data['om'] = $this->dashboard_model->ordenes_mensuales();
        	$data['com'] = $this->dashboard_model->cantidad_ordenes_mensuales();
        	$data['oa'] = $this->dashboard_model->ordenes_anuales();
        	$data['coa'] = $this->dashboard_model->cantidad_ordenes_anuales();
        	$data['grafica_ordenes'] = $this->dashboard_model->grafica_ordenes();
        	$data['grafica_creaciones'] = $this->dashboard_model->grafica_creaciones();
			//Obtener datos del usuario logueado
			$data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
			$data['rol_usuario'] = $this->session->userdata('usuario_rol');
			//Mostrar el dashboard
			$this->load->view('admin/dashboard/index',$data);
		}else{
            redirect('admin');
        }
	}
}