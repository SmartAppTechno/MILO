<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito_controller extends CI_Controller {
	public function index()
	{
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('carrito_model');
			$carrito = $this->session->userdata('carrito_data');
			$data['total'] = $this->carrito_model->obtener_total($carrito);
			$data['carro'] = $carrito;
			$this->load->view('cliente/carrito/index',$data);
		}else{
            redirect();
        }
	}
	public function actualizar(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('carrito_model');
			//Decidir si se actualiza o se compra
			if($this->input->post('carrito') == "Actualizar") {
				$cantidades = $this->input->post();
				$carro = $this->session->userdata('carrito_data');
				//Actualizar las cantidades del carrito
				$suma = 0;
				foreach($carro as $key=>$elemento){
					$carro[$key]['cantidad'] = $cantidades[$key];
					$suma = $suma + $cantidades[$key];
				}
				$this->session->set_userdata('carrito_cantidad', $suma);
				$this->session->set_userdata('carrito_data', $carro);
				$data['total'] = $this->carrito_model->obtener_total($carro);
				$data['carro'] = $this->session->userdata('carrito_data');
				$this->load->view('cliente/carrito/index',$data);
			}
			if($this->input->post('carrito') == "Comprar") {
				$cantidades = $this->input->post();
				$carro = $this->session->userdata('carrito_data');
				//Actualizar las cantidades del carrito
				foreach($carro as $key=>$elemento){
					$carro[$key]['cantidad'] = $cantidades[$key];
				}
				$this->session->set_userdata('carrito_data', $carro);
				$carro = $this->session->userdata('carrito_data');
				//Generar la orden
				$usuario = $this->session->userdata('usuario_id');
				date_default_timezone_set('America/Mexico_City');
				$fecha = date("Y-m-d");
				$total_orden = $this->carrito_model->obtener_total($carro);
				$orden = $this->carrito_model->crear_orden($usuario,$fecha,$total_orden);
				//Mensaje del correo
				$mensaje = '<table style="width: 100%;border-spacing: 0;">
								<tr style="text-align: center;background: #3E1F58;color: #fff;height: 45px;"><td colspan="2">Orden #'.$orden.' | '.$fecha.'</td></tr>
								<tr style="text-align: center;background: #ab1a69;color: #fff;height: 35px;">
									<td>ID del Cliente: '.$usuario.'</td>
									<td>Total del pedido: $ '.number_format((float)$total_orden, 2, '.', ',').'</td>
								</tr>
							</table>';
				$mensaje .= '<table style="width: 100%;border-spacing: 0;margin-top: 40px;border: 1px solid black;border-collapse: collapse;">
								<tr style="text-align: center;background: #000;color: #fff;height: 30px;">
									<td>Producto</td>
									<td>Tipo</td>
									<td>Cantidad</td>
									<td>Total</td>
								</tr>';
				//Agregar los productos de la orden
				foreach($carro as $elemento){
					$producto = $elemento['id'];
					$cantidad = $elemento['cantidad'];
					$total = $elemento['cantidad'] * $elemento['precio'];
					$tipo = $elemento['tipo'];
					//Registrar producto en la orden
					$this->carrito_model->crear_orden_producto($orden,$producto,$tipo,$cantidad,$total);
					//Mensaje del correo
					$producto_nombre = $this->carrito_model->get_producto_nombre($producto);
					if (strcmp($tipo,'productos') == 0)
						$tipo_nombre = 'Producto';
					if (strcmp($tipo,'disenios') == 0)
						$tipo_nombre = 'Diseño';
					if (strcmp($tipo,'impresiones') == 0)
						$tipo_nombre = 'Impresiones';
					$mensaje .= '<tr style="text-align: center;height: 30px;">
									<td style="border: 1px solid black;">'.$producto_nombre.'</td>
									<td style="border: 1px solid black;">'.$tipo_nombre.'</td>
									<td style="border: 1px solid black;">'.$cantidad.'</td>
									<td style="border: 1px solid black;">$ ' . number_format((float)$total, 2, '.', ',') . '</td>
								</tr>';
				}
				$mensaje .= '</table>';
				//Vaciar el carrito
				$carrito_data = array();
				$this->session->set_userdata('carrito_data', $carrito_data);
				$this->session->set_userdata('carrito_cantidad', 0);
				//Enviar correo
				$this->load->library('email');
			    $this->email->set_mailtype('html');
			    $this->email->from('contacto@lovefit.me','Made In Love');
			    $this->email->to('contacto@lovefit.me');
			    $this->email->subject('Nuevo Pedido #'.$orden);
			    $this->email->message($mensaje);
			    $this->email->send();
				//Mostrar las órdenes
				//redirect('ordenes_productos');
				//Paypal
				$this->load->library('paypal_lib');
		        $returnURL = base_url('compra_exitosa');
		        $cancelURL = base_url('compra_cancelada'); 
		        $this->paypal_lib->add_field('return', $returnURL);
        		$this->paypal_lib->add_field('cancel_return', $cancelURL);
				$this->paypal_lib->add_field('item_name', 'Made In Love');
		        $this->paypal_lib->add_field('custom', $usuario);
		        $this->paypal_lib->add_field('amount',  $total_orden);        
				$this->paypal_lib->paypal_auto_form();
			}
		}else{
            redirect();
        }
	}
	public function eliminar(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$this->load->model('carrito_model');
			$carro = $this->session->userdata('carrito_data');
			//Borrar elemento
			$id_elemento = $this->uri->segment(2);
			$cantidad = $carro[$id_elemento]['cantidad'];
			$suma = $this->session->userdata('carrito_cantidad');
			$suma = $suma - $cantidad;
			unset($carro[$id_elemento]);
			$this->session->set_userdata('carrito_cantidad', $suma);
			$this->session->set_userdata('carrito_data', $carro);
			$data['total'] = $this->carrito_model->obtener_total($carro);
			$data['carro'] = $this->session->userdata('carrito_data');
			$this->load->view('cliente/carrito/index',$data);
		}else{
            redirect();
        }
	}
}