<?php
class Comprar_productos_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function obtener_membresia($id_usuario){
		$this->db->select('membresia');
		$this->db->from('tbl_clientes');
		$this->db->where('id',$id_usuario);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_productos(){
		$this->db->select('t1.id,t1.nombre,t1.precio,t1.url,t1.categoria,t1.membresia, t2.nombre as nombre_membresia');
		$this->db->from('tbl_productos as t1, tbl_tipo_membresia as t2');
		$this->db->where('t1.membresia = t2.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_productos_busqueda_nombre($buscar){
		$this->db->select('t1.id,t1.nombre,t1.precio,t1.url,t1.categoria,t1.membresia, t2.nombre as nombre_membresia');
		$this->db->from('tbl_productos as t1, tbl_tipo_membresia as t2');
		$this->db->where('t1.membresia = t2.id');
		$this->db->like('LOWER(t1.nombre)', strtolower($buscar));
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_productos_busqueda_descripcion($buscar){
		$this->db->select('t1.id,t1.nombre,t1.precio,t1.url,t1.categoria,t1.membresia, t2.nombre as nombre_membresia');
		$this->db->from('tbl_productos as t1, tbl_tipo_membresia as t2');
		$this->db->where('t1.membresia = t2.id');
		$this->db->like('LOWER(t1.descripcion)', strtolower($buscar));
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_productos_categorias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_productos_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
}