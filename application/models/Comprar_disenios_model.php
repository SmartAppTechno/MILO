<?php
class Comprar_disenios_model extends CI_Model
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
	public function mostrar_disenios(){
		$this->db->select('t1.id,t1.nombre,t1.precio,t1.url,t3.nombre as producto,t1.categoria,t1.membresia, t2.nombre as nombre_membresia');
		$this->db->from('tbl_disenios as t1, tbl_tipo_membresia as t2, tbl_productos_categorias as t3');
		$this->db->where('t1.membresia = t2.id');
		$this->db->where('t1.categoria_producto = t3.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_disenios_comprados($cliente){
		$this->db->select('t1.id,t1.nombre,t1.precio,t1.url,t3.nombre as producto,t1.categoria,t1.membresia, t2.nombre as nombre_membresia');
		$this->db->from('tbl_disenios as t1, tbl_tipo_membresia as t2, tbl_productos_categorias as t3,tbl_disenios_comprados as t4');
		$this->db->where('t1.membresia = t2.id');
		$this->db->where('t1.categoria_producto = t3.id');
		$this->db->where('t1.id = t4.disenio');
		$this->db->where('t4.cliente',$cliente);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_disenios_busqueda_nombre($buscar){
		$this->db->select('t1.id,t1.nombre,t1.precio,t1.url,t3.nombre as producto,t1.categoria,t1.membresia, t2.nombre as nombre_membresia');
		$this->db->from('tbl_disenios as t1, tbl_tipo_membresia as t2, tbl_productos_categorias as t3');
		$this->db->where('t1.membresia = t2.id');
		$this->db->where('t1.categoria_producto = t3.id');
		$this->db->like('LOWER(t1.nombre)', strtolower($buscar));
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_disenios_busqueda_descripcion($buscar){
		$this->db->select('t1.id,t1.nombre,t1.precio,t1.url,t3.nombre as producto,t1.categoria,t1.membresia, t2.nombre as nombre_membresia');
		$this->db->from('tbl_disenios as t1, tbl_tipo_membresia as t2, tbl_productos_categorias as t3');
		$this->db->where('t1.membresia = t2.id');
		$this->db->where('t1.categoria_producto = t3.id');
		$this->db->like('LOWER(t1.descripcion)', strtolower($buscar));
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_disenios_categorias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_disenios_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
}