<?php
class Clientes_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_clientes(){
		$this->db->select('t1.id,t1.nombre,t1.email,t1.red_social,t2.nombre as membresia,t1.membresia as status');
		$this->db->from('tbl_clientes as t1,tbl_tipo_membresia as t2');
		$this->db->where('t1.membresia = t2.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
    public function get_cliente($id){
        $this->db->select('id,nombre');
        $this->db->from('tbl_clientes');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
    }
    public function desactivar_cliente($id){
        $data = array(
            'membresia' => 4
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_clientes',$data);
    }
    public function activar_cliente($id){
        $data = array(
            'membresia' => 5
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_clientes',$data);
    }
    public function ordenes_cliente($id){
        $this->db->select('id,fecha,total,status');
        $this->db->from('tbl_ordenes');
        $this->db->where('cliente',$id);
        $query = $this->db->get();  
        return $query->result_array();
    }
    public function get_estados(){
        $this->db->select('id,nombre');
        $this->db->from('tbl_ordenes_estados');
        $query = $this->db->get();  
        return $query->result_array();
    }
    public function productos_orden($id){
        $this->db->select('t2.url as foto,t2.nombre as producto,t1.tipo,t1.cantidad,t2.descripcion,t1.total');
        $this->db->from('tbl_ordenes_productos as t1,tbl_productos as t2');
        $this->db->where('t1.producto = t2.id');
        $this->db->where('t1.orden',$id);
        $query = $this->db->get();  
        return $query->result_array();
    }
    public function disenios_cliente($id){
        $this->db->select('t1.fecha,t2.nombre as disenio');
        $this->db->from('tbl_disenios_comprados as t1,tbl_disenios as t2');
        $this->db->where('t1.disenio = t2.id');
        $this->db->where('t1.cliente',$id);
        $query = $this->db->get();  
        return $query->result_array();
    }
    public function membresias_cliente($id){
        $this->db->select('t2.nombre as membresia,t1.inicio,t1.fin,t1.total,t1.status');
        $this->db->from('tbl_pagos_membresias as t1,tbl_tipo_membresia as t2');
        $this->db->where('t1.tipo = t2.id');
        $this->db->where('t1.cliente',$id);
        $query = $this->db->get();  
        return $query->result_array();
    }
}