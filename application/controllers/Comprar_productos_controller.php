<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comprar_productos_controller extends CI_Controller {
	public function comprar_productos(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('comprar_productos_model');
			$id_usuario = $this->session->userdata('usuario_id');
			$data['membresia'] = $this->comprar_productos_model->obtener_membresia($id_usuario)[0]['membresia'];
			$data['productos'] = $this->comprar_productos_model->mostrar_productos();
			$data['categorias'] = $this->comprar_productos_model->mostrar_productos_categorias();
			$this->load->view('cliente/comprar_productos/index',$data);
		}else{
            redirect();
        }
	}
	public function buscar_productos(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('comprar_productos_model');
			$id_usuario = $this->session->userdata('usuario_id');
			//Datos del formulario
	        $buscar = $this->input->post('buscar_productos');
			$r1 = $this->comprar_productos_model->mostrar_productos_busqueda_nombre($buscar);
			$r2 = $this->comprar_productos_model->mostrar_productos_busqueda_descripcion($buscar);
			if(count($r1)>0 || count($r2>0)){
				$data['membresia'] = $this->comprar_productos_model->obtener_membresia($id_usuario)[0]['membresia'];
				$resultado = array_unique(array_merge($r1,$r2), SORT_REGULAR);
				$data['productos'] = $resultado;
				$data['categorias'] = $this->comprar_productos_model->mostrar_productos_categorias();
			}
			if(count($resultado) == 0){
				$data['mensaje'] = 'No hay resultados para su búsqueda';
			}
			$this->load->view('cliente/comprar_productos/index',$data);
		}else{
            redirect();
        }
	}
	public function agregar_producto(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$elemento_data = array(
				'id' => $this->input->post('id'),
				'foto' => $this->input->post('foto'),
				'nombre' => $this->input->post('nombre'),
				'precio' => $this->input->post('precio'),
				'tipo' => $this->input->post('tipo'),
				'cantidad' => 1
			);
			$carrito = $this->session->userdata('carrito_data');
			$repetido = true;
			foreach($carrito as $key => $elemento){
				if($elemento['nombre'] == $elemento_data['nombre'])
					$repetido = false;
			}
			$suma = $this->session->userdata('carrito_cantidad');
			if($repetido){
				array_push($carrito, $elemento_data);
				$suma = $suma + $elemento_data['cantidad'];
			}
			$this->session->set_userdata('carrito_data', $carrito);
			$this->session->set_userdata('carrito_cantidad', $suma);
			//Cargar Carrito
			$this->load->model('comprar_productos_model');
			$id_usuario = $this->session->userdata('usuario_id');
			$data['membresia'] = $this->comprar_productos_model->obtener_membresia($id_usuario)[0]['membresia'];
			$data['productos'] = $this->comprar_productos_model->mostrar_productos();
			$data['categorias'] = $this->comprar_productos_model->mostrar_productos_categorias();
			$data['mensaje'] = 'El producto se ha agregado correctamente al carrito';
			$this->load->view('cliente/comprar_productos/index',$data);
		}else{
            redirect();
        }
	}
}