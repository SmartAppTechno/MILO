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
		    /*
		    Once you have a verified IPN you need to do a few more checks on the POST
		    fields--typically against data you stored in your database during when the
		    end user made a purchase (such as in the "success" page on a web payments
		    standard button). The fields PayPal recommends checking are:
		    
		        1. Check the $_POST['payment_status'] is "Completed"
			    2. Check that $_POST['txn_id'] has not been previously processed 
			    3. Check that $_POST['receiver_email'] is your Primary PayPal email 
			    4. Check that $_POST['payment_amount'] and $_POST['payment_currency'] 
			       are correct
		    
		    Since implementations on this varies, I will leave these checks out of this
		    example and just send an email using the getTextReport() method to get all
		    of the details about the IPN.  
		    */
		    //Check the $_POST['payment_status'] is "Completed"
		    if(strcmp($_POST['payment_status'], "Completed") == 0){	
		    	//Check that $_POST['txn_id'] has not been previously processed 
		    	$transaction = $_POST['txn_id'];
		    	$txn_unico = $this->pagos_membresia_model->transaccion_unica($transaction);
		    	if(empty($txn_unico)){
		    		//Check that $_POST['receiver_email'] is your Primary PayPal email
		    		if(strcmp($_POST['receiver_email'], "mil.ventas@hotmail.com") ==0){
		    			$nombre_membresia = $_POST['product_name'];
		    			//tipo, cliente, inicio,fin,total,status,txn_id,paypal_id
		    			$tipo = $this->pagos_membresia_model->get_membresia_id($nombre_membresia);
		    			$fin = $_POST['next_payment_date'];
		    		}
		    	}
		    }
		} else {
		    /*
		    An Invalid IPN *may* be caused by a fraudulent transaction attempt. It's
		    a good idea to have a developer or sys admin manually investigate any 
		    invalid IPN.
		    */
		    mail('YOUR EMAIL ADDRESS', 'Invalid IPN', $listener->getTextReport());
		}
	}
}