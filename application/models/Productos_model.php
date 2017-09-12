<?php
class Productos_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_productos(){
		$this->db->select('t1.id,t1.nombre,t1.precio,t1.descripcion,t1.ancho,t1.alto,t1.url as foto,t2.nombre as categoria,t3.nombre as membresia');
		$this->db->from('tbl_productos as t1,tbl_productos_categorias as t2,tbl_tipo_membresia as t3');
		$this->db->where('t1.categoria = t2.id');
		$this->db->where('t1.membresia = t3.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function insertar_producto($nombre,$precio,$descripcion,$url,$ancho,$alto,$categoria,$membresia){
		$data = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'url' => $url,
            'ancho' => $ancho,
            'alto' => $alto,
            'categoria' => $categoria,
            'membresia' => $membresia
        );
        $this->db->insert('tbl_productos',$data);
	}
	public function mostrar_producto($id){
		$this->db->select('id,nombre,precio,descripcion,url as foto,ancho,alto,categoria,membresia');
		$this->db->from('tbl_productos');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_producto($id,$nombre,$precio,$descripcion,$ancho,$alto,$categoria,$membresia){
		$data = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'ancho' => $ancho,
            'alto' => $alto,
            'categoria' => $categoria,
            'membresia' => $membresia
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_productos',$data);
	}
	public function guardar_producto_foto($id,$nombre,$precio,$descripcion,$url,$ancho,$alto,$categoria,$membresia){
		$data = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'url' => $url,
            'ancho' => $ancho,
            'alto' => $alto,
            'categoria' => $categoria,
            'membresia' => $membresia
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_productos',$data);
	}
	public function eliminar_producto($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_productos');
	}
	public function get_categorias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_productos_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_membresias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_tipo_membresia');
		$this->db->where('id NOT LIKE 4');
       	$query = $this->db->get();  
        return $query->result_array();
	}
}