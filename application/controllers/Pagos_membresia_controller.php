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
			$data['subscription_id'] = $this->pagos_membresia_model->get_suscripcion_id($id_usuario);
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
		$listener->use_sandbox = false;
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
		    			$sub_id = $_POST['subscr_id'];
		    			$this->pagos_membresia_model->crear_pago($tipo,$cliente,$inicio,$fin,$total,$status,$txn_id,$sub_id);
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
	public function cancelar_membresia(){
		$this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_id') ){
			$accion = $this->input->post('accion');
			$sub_id = $this->input->post('sub_id');
			//Cancelar membresía en paypal
			$api_request = 'USER=' . urlencode( 'mil.ventas_api1.hotmail.com' )
	        .  '&PWD=' . urlencode( 'YX3THP7JKAGPWLRP' )
	        .  '&SIGNATURE=' . urlencode( 'AQU0e5vuZCvSg-XJploSa.sGUDlpAcg9PszoaJ4SoDh1fPhp9hQ8dRKZ' )
	        .  '&VERSION=76.0'
	        .  '&METHOD=ManageRecurringPaymentsProfileStatus'
	        .  '&PROFILEID=' . urlencode( $sub_id )
	        .  '&ACTION=' . urlencode( $accion )
	        .  '&NOTE=' . urlencode( 'Profile cancelled at store' );
	 
		    $ch = curl_init();
		    curl_setopt( $ch, CURLOPT_URL, 'https://api-3t.paypal.com/nvp' );
		    curl_setopt( $ch, CURLOPT_VERBOSE, 1 );
		 
		    // Uncomment these to turn off server and peer verification
		    // curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
		    // curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
		    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		    curl_setopt( $ch, CURLOPT_POST, 1 );
		 
		    // Set the API parameters for this transaction
		    curl_setopt( $ch, CURLOPT_POSTFIELDS, $api_request );
		 
		    // Request response from PayPal
		    $response = curl_exec( $ch );
		 
		    if( $response ){
		     	//cambiar a membresía gratuita
		     	$cliente_id = $this->session->userdata('usuario_id');
		     	$this->pagos_membresia_model->cliente_gratuito($cliente_id);  
		    }
		    curl_close( $ch );
	   	}else{
            redirect();
        }
	}
}