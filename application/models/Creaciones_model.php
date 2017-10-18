<?php
class Creaciones_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_creaciones(){
		$this->db->select('t1.id,t1.impresiones,t1.fecha,t2.nombre as cliente');
		$this->db->from('tbl_crear_productos as t1,tbl_clientes as t2');
		$this->db->where('t1.cliente = t2.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function ver_creacion($id){
		$this->db->select('t1.id,t1.impresiones,t1.fecha,t2.nombre as cliente,t3.nombre as producto,t4.nombre as ocasion,t5.nombre as disenio,t1.foto');
		$this->db->from('tbl_crear_productos as t1,tbl_clientes as t2,tbl_productos as t3,tbl_ocasiones as t4,tbl_disenios as t5');
		$this->db->where('t1.id',$id);
		$this->db->where('t1.cliente = t2.id');
		$this->db->where('t1.producto = t3.id');
		$this->db->where('t1.ocasion = t4.id');
		$this->db->where('t1.disenio = t5.id');
       	$query = $this->db->get();  
        return $query->result_array()[0];
	}
}