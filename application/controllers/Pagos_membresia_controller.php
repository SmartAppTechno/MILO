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
	public function actualizar_pago()
	{
		$this->load->model('pagos_membresia_model');
		$this->load->library('ipnListener');
		$listener = new IpnListener();
		$listener->use_sandbox = true;
		try {
		    $listener->requirePostMethod();
		    $verified = $listener->processIpn();
		} catch (Exception $e) {
		    exit(0);
		}
		if ($verified) {
		    //Check the $_POST['payment_status'] is "Completed"
		    if(strcmp($_POST['payment_status'], "Completed") == 0){	
		    	//Check that $_POST['txn_id'] has not been previously processed 
		    	$transaction = $_POST['txn_id'];
		    	$txn_unico = $this->pagos_membresia_model->transaccion_unica($transaction);
		    	if(empty($txn_unico)){
		    		//Check that $_POST['receiver_email'] is your Primary PayPal email
		    		if(strcmp($_POST['receiver_email'], "mil.ventas@hotmail.com") ==0){
		    			$nombre_membresia = $_POST['product_name'];
		    			$cliente_correo = $_POST['payer_email'];
		    			date_default_timezone_set('America/Mexico_City');
		    			$fecha_fin = $_POST['next_payment_date'];
		    			//Datos a insertar
		    			$tipo = $this->pagos_membresia_model->get_membresia_id($nombre_membresia);
		    			$cliente = $this->pagos_membresia_model->get_cliente_id($cliente_correo);
		    			$inicio = date("Y-m-d");
		    			$fin = date("Y-m-d", strtotime($fecha_fin));
		    			$total = $_POST['amount'];
		    			$status = 1;
		    			$txn_id = $transaction;
		    			$this->pagos_membresia_model->crear_pago($tipo,$cliente,$inicio,$fin,$total,$status,$txn_id);
		    		}
		    	}
		    }
		} else {
		    //Poner inactivo al cliente
		    $cliente_correo = $_POST['payer_email'];
		    $cliente = $this->pagos_membresia_model->get_cliente_id($cliente_correo);
			$this->pagos_membresia_model->cliente_inactivo($cliente);
		}
	}
	//paypal_id/parent_txn_id cancela
}