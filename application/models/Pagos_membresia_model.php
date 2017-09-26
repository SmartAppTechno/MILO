<?php
class Pagos_membresia_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function mostrar_membresias($id_cliente){
		$this->db->select('t2.nombre,t1.inicio,t1.fin,t1.total,t1.status');
		$this->db->from('tbl_pagos_membresias as t1,tbl_tipo_membresia as t2');
		$this->db->where('t1.tipo = t2.id');
        $this->db->where('cliente',$id_cliente);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function transaccion_unica($transaction){
		$this->db->select('id');
		$this->db->from('tbl_pagos_membresias');
        $this->db->where('txn_id',$transaction);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_membresia_id($nombre_membresia){
		$this->db->select('id');
		$this->db->from('tbl_pagos_membresias');
        $this->db->where('nombre',$nombre_membresia);
       	$query = $this->db->get();  
        return $query->result_array()[0]['id'];
	}
	public function get_cliente_id($cliente_correo){
		$this->db->select('id');
		$this->db->from('tbl_clientes');
        $this->db->where('email',$cliente_correo);
       	$query = $this->db->get();  
        return $query->result_array()[0]['id'];
	}
	public function crear_pago($tipo,$cliente,$inicio,$fin,$total,$status,$txn_id,$sub_id){
		$data = array(
			'tipo' => $tipo,
      		'cliente' => $cliente,
      		'inicio' => $inicio,
      		'fin' => $fin,
      		'total' => $total,
      		'status' => $status,
      		'txn_id' => $txn_id,
      		'sub_id' => $sub_id
      	);
      	$this->db->insert('tbl_pagos_membresias',$data);
	}
	public function cliente_inactivo($cliente){
		$data = array(
			'membresia' => 4
        );
        $this->db->where('id',$cliente);
        $this->db->update('tbl_clientes',$data);
	}
	public function cliente_gratuito($cliente_id){
		$data = array(
			'membresia' => 5
        );
        $this->db->where('id',$cliente_id);
        $this->db->update('tbl_clientes',$data);
	}
	public function get_suscripcion_id($id_usuario){
		$this->db->select('sub_id');
		$this->db->from('tbl_pagos_membresias');
        $this->db->where('cliente',$id_usuario);
        $this->db->order_by('id','desc');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_ultima_membresia($usuario_id){
		$this->db->select('fin');
		$this->db->from('tbl_pagos_membresias');
        $this->db->where('cliente',$usuario_id);
        $this->db->order_by('id','desc');
       	$query = $this->db->get();  
        return $query->result_array()[0]['fin'];
	}
}