<?php
class Membresias_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_membresias(){
		$this->db->select('id,nombre,precio,impresiones');
		$this->db->from('tbl_tipo_membresia');
		$this->db->where('id NOT LIKE 4');
        $this->db->where('id NOT LIKE 5');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_membresia($id){
		$this->db->select('id,nombre,precio,impresiones,foto,descripcion,lista');
		$this->db->from('tbl_tipo_membresia');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_membresia($id,$nombre,$precio,$impresiones,$descripcion,$lista){
		$data = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'impresiones' => $impresiones,
            'descripcion' => $descripcion,
            'lista' => $lista
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_tipo_membresia',$data);
	}
	public function guardar_membresia_foto($id,$nombre,$precio,$impresiones,$descripcion,$lista,$foto){
		$data = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'impresiones' => $impresiones,
            'descripcion' => $descripcion,
            'lista' => $lista,
            'foto' => $foto
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_tipo_membresia',$data);
	}
	public function pagos_membresias(){
        $this->db->select('t1.id,t2.nombre as membresia,t3.nombre as cliente,t1.inicio,t1.fin,t1.total,t1.status');
        $this->db->from('tbl_pagos_membresias as t1,tbl_tipo_membresia as t2,tbl_clientes as t3');
        $this->db->where('t1.tipo = t2.id');
        $this->db->where('t1.cliente = t3.id');
        $query = $this->db->get();  
        return $query->result_array();
    }
    public function get_solicitudes(){
        $this->db->select('id,nombre,telefono,correo,medio_contacto,establecimiento');
        $this->db->from('tbl_solicitud_equipo');
        $query = $this->db->get();  
        return $query->result_array();
    }
    public function get_solicitud($id){
        $this->db->select('id, nombre, telefono, correo, codigo_postal, medio_contacto, establecimiento, giro, empleados, sucursales, temporada, interes, como_enteraste');
        $this->db->from('tbl_solicitud_equipo');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
    }
}