<?php
class Disenios_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_disenios(){
		$this->db->select('t1.id,t1.nombre,t1.precio,t1.descripcion,t1.foto_impresion,t2.nombre as categoria_producto,t3.nombre as ocasion,t4.nombre as categoria,t5.nombre as membresia');
		$this->db->from('tbl_disenios as t1,tbl_productos_categorias as t2,tbl_ocasiones as t3,tbl_disenios_categorias as t4,tbl_tipo_membresia as t5');
		$this->db->where('t1.categoria_producto = t2.id');
		$this->db->where('t1.ocasion = t3.id');
		$this->db->where('t1.categoria = t4.id');
		$this->db->where('t1.membresia = t5.id');
        $this->db->where('t1.cliente LIKE 0');
       	$query = $this->db->get();  
        return $query->result_array();
	}
    public function get_solicitudes_especiales(){
        $this->db->select('t1.id,t1.foto,t2.nombre as cliente,t1.descripcion,t1.fecha');
        $this->db->from('tbl_disenios_especiales as t1,tbl_clientes as t2');
        $this->db->where('t1.cliente = t2.id');
        $query = $this->db->get();  
        return $query->result_array();
    }
    public function get_disenios_especiales(){
        $this->db->select('t1.id,t1.nombre,t1.precio,t1.descripcion,t1.foto_impresion,t2.nombre as categoria_producto,t3.nombre as ocasion,t4.nombre as categoria,t5.nombre as membresia,t6.nombre as cliente');
        $this->db->from('tbl_disenios as t1,tbl_productos_categorias as t2,tbl_ocasiones as t3,tbl_disenios_categorias as t4,tbl_tipo_membresia as t5,tbl_clientes as t6');
        $this->db->where('t1.categoria_producto = t2.id');
        $this->db->where('t1.ocasion = t3.id');
        $this->db->where('t1.categoria = t4.id');
        $this->db->where('t1.membresia = t5.id');
        $this->db->where('t1.cliente = t6.id');
        $query = $this->db->get();  
        return $query->result_array();
    }
	public function insertar_disenio($nombre,$precio,$descripcion,$url,$foto_impresion,$categoria,$categoria_producto,$ocasion,$membresia,$cliente){
		$data = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'url' => $url,
            'foto_impresion' => $foto_impresion,
            'categoria' => $categoria,
            'categoria_producto' => $categoria_producto,
            'ocasion' => $ocasion,
            'membresia' => $membresia,
            'cliente' => $cliente
        );
        $this->db->insert('tbl_disenios',$data);
	}
	public function mostrar_disenio($id){
		$this->db->select('id,nombre,precio,descripcion,url as foto,foto_impresion,categoria,categoria_producto as producto,ocasion,membresia,cliente');
		$this->db->from('tbl_disenios');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_disenio($id,$nombre,$precio,$descripcion,$categoria,$categoria_producto,$ocasion,$membresia,$cliente){
		$data = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'categoria' => $categoria,
            'categoria_producto' => $categoria_producto,
            'ocasion' => $ocasion,
            'membresia' => $membresia,
            'cliente' => $cliente
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_disenios',$data);
	}
	public function guardar_disenio_foto($id,$nombre,$precio,$descripcion,$url,$categoria,$categoria_producto,$ocasion,$membresia,$cliente){
		$data = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'url' => $url,
            'categoria' => $categoria,
            'categoria_producto' => $categoria_producto,
            'ocasion' => $ocasion,
            'membresia' => $membresia,
            'cliente' => $cliente
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_disenios',$data);
	}
	public function guardar_disenio_foto_impresion($id,$nombre,$precio,$descripcion,$foto_impresion,$categoria,$categoria_producto,$ocasion,$membresia,$cliente){
		$data = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'foto_impresion' => $foto_impresion,
            'categoria' => $categoria,
            'categoria_producto' => $categoria_producto,
            'ocasion' => $ocasion,
            'membresia' => $membresia,
            'cliente' => $cliente
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_disenios',$data);
	}
	public function guardar_disenio_fotos($id,$nombre,$precio,$descripcion,$url,$foto_impresion,$categoria,$categoria_producto,$ocasion,$membresia,$cliente){
		$data = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'url' => $url,
            'foto_impresion' => $foto_impresion,
            'categoria' => $categoria,
            'categoria_producto' => $categoria_producto,
            'ocasion' => $ocasion,
            'membresia' => $membresia,
            'cliente' => $cliente
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_disenios',$data);
	}
	public function eliminar_disenio($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_disenios');
	}
	public function get_categoria_productos(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_productos_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_ocasiones(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_ocasiones');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_categorias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_disenios_categorias');
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
    public function get_clientes(){
        $this->db->select('id,nombre');
        $this->db->from('tbl_clientes');
        $query = $this->db->get();  
        return $query->result_array();
    }
}