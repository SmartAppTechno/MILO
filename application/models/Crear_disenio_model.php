<?php
class Crear_disenio_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_impresiones($id_usuario){
		$this->db->select('impresiones');
		$this->db->from('tbl_clientes');
		$this->db->where('id',$id_usuario);
       	$query = $this->db->get();  
        return $query->result_array()[0]['impresiones'];
	}
	public function obtener_membresia($id_usuario){
		$this->db->select('membresia');
		$this->db->from('tbl_clientes');
		$this->db->where('id',$id_usuario);
       	$query = $this->db->get();  
        return $query->result_array()[0]['membresia'];
	}
	public function mostrar_productos(){
		$this->db->select('t1.id,t1.nombre,t1.url,t1.categoria,t1.membresia, t2.nombre as nombre_membresia');
		$this->db->from('tbl_productos as t1, tbl_tipo_membresia as t2');
		$this->db->where('t1.membresia = t2.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_productos_categorias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_productos_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_ocasiones(){
		$this->db->select('t1.id,t1.nombre,t1.url,t1.membresia, t2.nombre as nombre_membresia');
		$this->db->from('tbl_ocasiones as t1, tbl_tipo_membresia as t2');
		$this->db->where('t1.membresia = t2.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_producto_categoria($producto){
		$this->db->select('categoria');
		$this->db->from('tbl_productos');
		$this->db->where('id',$producto);
       	$query = $this->db->get();  
        return $query->result_array()[0]['categoria'];
	}
	public function get_video_categoria($categoria){
		$this->db->select('video_id');
		$this->db->from('tbl_productos_categorias');
		$this->db->where('id',$categoria);
       	$query = $this->db->get();  
        return $query->result_array()[0]['video_id'];
	}
	public function mostrar_disenios($producto,$ocasion){
		$this->db->select('t1.id,t1.nombre,t1.url,t3.nombre as producto,t1.categoria,t1.membresia, t2.nombre as nombre_membresia');
		$this->db->from('tbl_disenios as t1, tbl_tipo_membresia as t2, tbl_productos_categorias as t3');
		$this->db->where('t1.membresia = t2.id');
		$this->db->where('t1.categoria_producto = t3.id');
		$this->db->where('t1.categoria_producto',$producto);
		$this->db->where('t1.ocasion',$ocasion);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_disenios_categorias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_disenios_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_disenios_comprados($cliente,$producto,$ocasion){
		$this->db->select('t1.id,t1.nombre,t1.url');
		$this->db->from('tbl_disenios as t1, tbl_disenios_comprados as t2');
		$this->db->where('t1.id = t2.disenio');
		$this->db->where('t2.cliente',$cliente);
		$this->db->where('t1.categoria_producto',$producto);
		$this->db->where('t1.ocasion',$ocasion);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_disenios_especiales($cliente,$producto,$ocasion){
		$this->db->select('id,nombre,url');
		$this->db->from('tbl_disenios');
		$this->db->where('cliente',$cliente);
		$this->db->where('categoria_producto',$producto);
		$this->db->where('ocasion',$ocasion);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_disenios_creados($cliente){
		$this->db->select('t1.id,t1.impresiones,t3.nombre as producto,t2.nombre as disenio,t4.nombre as ocasion,t1.foto');
		$this->db->from('tbl_crear_productos as t1,tbl_disenios as t2,tbl_productos as t3,tbl_ocasiones as t4');
		$this->db->where('t1.cliente',$cliente);
		$this->db->where('t2.id = t1.disenio');
		$this->db->where('t3.id = t1.producto');
		$this->db->where('t4.id = t1.ocasion');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function obtener_impresiones($membresia){
		$this->db->select('impresiones');
		$this->db->from('tbl_tipo_membresia');
		$this->db->where('id',$membresia);
       	$query = $this->db->get();  
        return $query->result_array()[0]['impresiones'];
	}
	public function obtener_disenio_impresiones($cliente,$creacion){
		$this->db->select('impresiones');
		$this->db->from('tbl_crear_productos');
		$this->db->where('cliente',$cliente);
		$this->db->where('id',$creacion);
       	$query = $this->db->get();  
        return $query->result_array()[0]['impresiones'];
	}
	public function aumentar_impresiones($creacion,$cantidad){
		$this->db->set('impresiones', 'impresiones+' . $cantidad, FALSE);
        $this->db->where('id',$creacion);
        $this->db->update('tbl_crear_productos');
	}
	public function disminuir_saldo($id_usuario,$cantidad){
		$this->db->set('impresiones', 'impresiones-' . $cantidad, FALSE);
        $this->db->where('id',$id_usuario);
        $this->db->update('tbl_clientes');
	}
	public function get_foto_disenio($disenio){
		$this->db->select('foto_impresion');
		$this->db->from('tbl_disenios');
		$this->db->where('id',$disenio);
       	$query = $this->db->get();  
        return $query->result_array()[0]['foto_impresion'];
	}
	public function insertar_creacion($impresiones,$fecha,$cliente,$producto,$ocasion,$disenio,$foto){
		$data = array(
			'impresiones' => $impresiones,
            'fecha' => $fecha,
            'cliente' => $cliente,
            'producto' => $producto,
            'ocasion' => $ocasion,
            'disenio' => $disenio,
            'foto' => $foto
        );
        $this->db->insert('tbl_crear_productos',$data);
        return $this->db->insert_id();
	}
	public function get_creacion($creacion_id){
		$this->db->select('producto,foto');
		$this->db->from('tbl_crear_productos');
		$this->db->where('id',$creacion_id);
       	$query = $this->db->get();  
        return $query->result_array()[0];
	}
}