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
        return $query->result_array();
	}
}