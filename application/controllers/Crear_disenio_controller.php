<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crear_disenio_controller extends CI_Controller {
	public function index(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$paso = $this->session->userdata('crear_paso');
			if($paso == 1)
				$this->elegir_producto();
			if($paso == 2)
				$this->elegir_ocasion();
			if($paso == 3)
				$this->elegir_disenio();
			if($paso == 4)
				$this->personalizar_disenio();
			if($paso == 5)
				$this->imprimir();
		}else{
            redirect();
        }
	}
	public function disenios_creados(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('crear_disenio_model');
			$id_usuario = $this->session->userdata('usuario_id');
			$membresia = $this->crear_disenio_model->obtener_membresia($id_usuario);
			$data['impresiones'] = $this->crear_disenio_model->obtener_impresiones($membresia);
			$data['disenios_creados'] = $this->crear_disenio_model->mostrar_disenios_creados($id_usuario);
			$this->load->view('cliente/personalizar/disenios_creados',$data);
		}else{
            redirect();
        }
	}
	public function imprimir_disenio(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
        	$creacion_id = $this->input->post('creacion');
			$this->load->model('crear_disenio_model');
			$id_usuario = $this->session->userdata('usuario_id');
			$membresia = $this->crear_disenio_model->obtener_membresia($id_usuario);
			$limite = $this->crear_disenio_model->obtener_impresiones($membresia);
			$impresiones = $this->crear_disenio_model->obtener_disenio_impresiones($id_usuario,$creacion_id);
			if($impresiones > $limite){
				date_default_timezone_set('America/Mexico_City');
				$fecha = date("Y-m-d");
				//cobrar $3 pesos
				$this->crear_disenio_model->insertar_impresion_extra($id_usuario,$creacion_id,3,$fecha);
				//Aumentar contador de impresiones
				$this->crear_disenio_model->aumentar_impresiones($creacion_id,1);
			}else{
				//Aumentar contador de impresiones
				$this->crear_disenio_model->aumentar_impresiones($creacion_id,1);
			}
			$creacion = $this->crear_disenio_model->get_creacion($creacion_id);
			$data['foto_impresion'] = $creacion['foto'];
			$cat_producto = $this->crear_disenio_model->get_producto_categoria($creacion['producto']);
			$data['video_id'] = $this->crear_disenio_model->get_video_categoria($cat_producto);
			$this->load->view('cliente/personalizar/imprimir',$data);
		}else{
            redirect();
        }
	}
	public function elegir_producto()
	{
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('crear_disenio_model');
			$id_usuario = $this->session->userdata('usuario_id');
			$data['membresia'] = $this->crear_disenio_model->obtener_membresia($id_usuario);
			$data['productos'] = $this->crear_disenio_model->mostrar_productos();
			$data['categorias'] = $this->crear_disenio_model->mostrar_productos_categorias();
			$data['paso'] = $this->session->userdata('crear_paso');
			$this->load->view('cliente/personalizar/index',$data);
		}else{
            redirect();
        }
	}
	public function elegir_ocasion(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('crear_disenio_model');
			if($this->input->post('producto'))
				$this->session->set_userdata('crear_producto', $this->input->post('producto'));
			$cat_producto = $this->crear_disenio_model->get_producto_categoria($this->session->userdata('crear_producto'));
			$this->session->set_userdata('crear_cat_producto', $cat_producto);
			$id_usuario = $this->session->userdata('usuario_id');
			$data['membresia'] = $this->crear_disenio_model->obtener_membresia($id_usuario);
			$data['ocasiones'] = $this->crear_disenio_model->mostrar_ocasiones();
			$this->session->set_userdata('crear_paso', 2);
			$data['paso'] = $this->session->userdata('crear_paso');
			$this->load->view('cliente/personalizar/index',$data);
		}else{
            redirect();
        }
	}
	public function elegir_disenio(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('crear_disenio_model');
			if($this->input->post('ocasion'))
				$this->session->set_userdata('crear_ocasion', $this->input->post('ocasion'));
			$id_usuario = $this->session->userdata('usuario_id');
			$data['membresia'] = $this->crear_disenio_model->obtener_membresia($id_usuario);
			$cat_producto = $this->session->userdata('crear_cat_producto');
			$ocasion = $this->session->userdata('crear_ocasion');
			$data['disenios'] = $this->crear_disenio_model->mostrar_disenios($cat_producto,$ocasion);
			$data['categorias'] = $this->crear_disenio_model->mostrar_disenios_categorias();
			$data['disenios_comprados'] = $this->crear_disenio_model->mostrar_disenios_comprados($id_usuario,$cat_producto,$ocasion);
			$data['disenios_especiales'] = $this->crear_disenio_model->mostrar_disenios_especiales($id_usuario,$cat_producto,$ocasion);
			//Diseños
			$this->session->set_userdata('crear_paso', 3);
			$data['paso'] = $this->session->userdata('crear_paso');
			$this->load->view('cliente/personalizar/index',$data);
		}else{
            redirect();
        }
	}
	public function personalizar_disenio(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('crear_disenio_model');
			if($this->input->post('disenio'))
				$this->session->set_userdata('crear_disenio', $this->input->post('disenio'));
			$disenio = $this->session->userdata('crear_disenio');
			$data['foto'] = $this->crear_disenio_model->get_foto_disenio($disenio);
			$this->session->set_userdata('crear_paso', 4);
			$data['paso'] = $this->session->userdata('crear_paso');
			$this->load->view('cliente/personalizar/index',$data);
		}else{
            redirect();
        }
	}
	public function guardar_impresion(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$imagen = $_FILES["foto_impresion"]["tmp_name"];
			$tipo = $_FILES["foto_impresion"]["type"];
			$data = file_get_contents($imagen);
			//Insertar la creación
			$this->load->model('crear_disenio_model');
			$impresiones = 1;
			date_default_timezone_set('America/Mexico_City');
			$fecha = date("Y-m-d");
			$cliente = $this->session->userdata('usuario_id');
			$producto = $this->session->userdata('crear_producto');
			$ocasion = $this->session->userdata('crear_ocasion');
			$disenio = $this->session->userdata('crear_disenio');
			$base64 = 'data:' . $tipo . ';base64,' . base64_encode($data);
			$creacion_id = $this->crear_disenio_model->insertar_creacion($impresiones,$fecha,$cliente,$producto,$ocasion,$disenio,$base64);
            $this->session->set_userdata('crear_previa', $creacion_id);
            $this->session->set_userdata('crear_paso', 5);
		}else{
            redirect();
        }
	}
	public function imprimir(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$data['paso'] = $this->session->userdata('crear_paso');
			$creacion_id = $this->session->userdata('crear_previa');
			$this->load->model('crear_disenio_model');
			$creacion = $this->crear_disenio_model->get_creacion($creacion_id);
			$data['foto_impresion'] = $creacion['foto'];
			$cat_producto = $this->crear_disenio_model->get_producto_categoria($creacion['producto']);
			$data['video_id'] = $this->crear_disenio_model->get_video_categoria($cat_producto);
			$this->load->view('cliente/personalizar/index',$data);
		}else{
            redirect();
        }
	}
	public function cancelar_disenio(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			//Reiniciar las variables
			$this->session->set_userdata(array(
            'crear_paso' => 1,
            'crear_producto' => 0,
            'crear_cat_producto' => 0,
            'crear_ocasion' => 0,
            'crear_disenio' => 0,
            'crear_previa' => ''       
            ));
            redirect('personaliza');
		}else{
            redirect();
        }
	}
}