<?php
class Ordenes_productos_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function mostrar_ordenes($id_usuario){
		$this->db->select('id,fecha,total,status');
		$this->db->from('tbl_ordenes');
        $this->db->where('cliente',$id_usuario);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_estados(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_ordenes_estados');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_orden_productos($orden_id){
		$this->db->select('t2.nombre,t2.precio,t1.cantidad,t1.total');
		$this->db->from('tbl_ordenes_productos as t1,tbl_productos as t2');
		$this->db->where('t1.producto = t2.id');
		$this->db->where('t1.tipo = "productos"');
        $this->db->where('t1.orden',$orden_id);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_orden_disenios($orden_id){
		$this->db->select('t2.nombre,t2.precio,t1.cantidad,t1.total');
		$this->db->from('tbl_ordenes_productos as t1,tbl_disenios as t2');
		$this->db->where('t1.producto = t2.id');
		$this->db->where('t1.tipo = "disenios"');
        $this->db->where('t1.orden',$orden_id);
       	$query = $this->db->get();  
        return $query->result_array();
	}
}