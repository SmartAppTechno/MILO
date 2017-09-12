<?php
class Ordenes_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_ordenes(){
		$this->db->select('t1.id,t1.fecha,t2.nombre as cliente,t1.total,t1.status,t2.id as cliente_id');
		$this->db->from('tbl_ordenes as t1,tbl_clientes as t2');
		$this->db->where('t1.cliente = t2.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_orden($id){
		$this->db->select('t2.url as foto,t2.nombre as producto,t1.tipo,t1.cantidad,t2.descripcion,t1.total');
		$this->db->from('tbl_ordenes_productos as t1,tbl_productos as t2');
		$this->db->where('t1.producto = t2.id');
		$this->db->where('t1.orden',$id);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_direccion($cliente){
		$this->db->select('t1.id,t1.nombre,concat(t2.calle," ",t2.numero," ",t2.colonia," ",t2.codigo_postal," ",t2.estado," ",t3.nombre) as direccion');
		$this->db->from('tbl_clientes as t1,tbl_direccion as t2,tbl_paises as t3');
		$this->db->where('t1.id',$cliente);
		$this->db->where('t2.cliente',$cliente);
		$this->db->where('t2.pais = t3.id');
       	$query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function total_pagado(){
		$this->db->select('sum(total) as ordenes');
		$this->db->from('tbl_ordenes');
		$this->db->where('status NOT LIKE 1');
       	$query = $this->db->get();
        $numero = $query->result_array()[0]['ordenes'];
        return number_format((float)$numero, 2, '.', ',');
	}
	public function total_pendiente(){
		$this->db->select('sum(total) as ordenes');
		$this->db->from('tbl_ordenes');
		$this->db->where('status',1); 
       	$query = $this->db->get();
        $numero = $query->result_array()[0]['ordenes'];
        return number_format((float)$numero, 2, '.', ',');
	}
	public function cambiar_estado_orden($status,$orden){
		$data = array(
            'status' => $status
        );
        $this->db->where('id',$orden);
        $this->db->update('tbl_ordenes',$data);
	}
	public function eliminar_orden($id){
        $this->db->where('id',$id);
        $this->db->delete('tbl_ordenes');
        $this->db->where('orden',$id);
        $this->db->delete('tbl_ordenes_productos');
	}
	public function get_estados(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_ordenes_estados');
       	$query = $this->db->get();  
        return $query->result_array();
	}
}