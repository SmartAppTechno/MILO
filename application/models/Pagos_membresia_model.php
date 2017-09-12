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
}