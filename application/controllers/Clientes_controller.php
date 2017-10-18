<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clientes_controller extends CI_Controller {
    public function clientes(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            $this->mostrar_clientes();
        }else{
            redirect('admin');
        }
	}
    public function mostrar_clientes(){
        //Cargar el modelo
        $this->load->model('clientes_model');
        $data['clientes'] = $this->clientes_model->get_clientes();
        //Obtener datos del usuario logueado
        $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
        $data['rol_usuario'] = $this->session->userdata('usuario_rol');
        //Mostrar el formulario
        $this->load->view('admin/clientes/index',$data);
    }
    public function desactivar_cliente(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('clientes_model');
            $this->clientes_model->desactivar_cliente($id);
            redirect('clientes');
        }else{
            redirect('admin');
        }
    }
    public function activar_cliente(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('clientes_model');
            $this->clientes_model->activar_cliente($id);
            redirect('clientes');
        }else{
            redirect('admin');
        }
    }
    public function ordenes_cliente(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('clientes_model');
            $data['cliente'] = $this->clientes_model->get_cliente($id);
            $data['ordenes'] = $this->clientes_model->ordenes_cliente($id);
            $data['estados'] = $this->clientes_model->get_estados();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/clientes/ordenes',$data);
        }else{
            redirect('admin');
        }
    }
    public function detalles_orden_cliente(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('clientes_model');
            $data['orden'] = $id;
            $data['productos'] = $this->clientes_model->productos_orden($id);
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/clientes/detalles_orden',$data);
        }else{
            redirect('admin');
        }
    }
    public function disenios_cliente(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('clientes_model');
            $data['cliente'] = $this->clientes_model->get_cliente($id);
            $data['disenios'] = $this->clientes_model->disenios_cliente($id);
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/clientes/disenios',$data);
        }else{
            redirect('admin');
        }
    }
    public function membresias_cliente(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('clientes_model');
            $data['cliente'] = $this->clientes_model->get_cliente($id);
            $data['membresias'] = $this->clientes_model->membresias_cliente($id);
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/clientes/membresias',$data);
        }else{
            redirect('admin');
        }
    }
}