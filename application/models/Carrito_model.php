<?php
class Carrito_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function obtener_total($carro){
		$total = 0;
		foreach($carro as $key=>$elemento)
			$total = $total + ($elemento['precio']*$elemento['cantidad']);
		return $total;
	}
	public function crear_orden($usuario,$fecha,$total){
		$data = array('cliente' => $usuario,
      		'fecha' => $fecha,
      		'total' => $total,
      		'status' => 1
      	);
      	$this->db->insert('tbl_ordenes',$data);
      	$orden_id = $this->db->insert_id();
      	return $orden_id;
	}
	public function get_ultima_compra($cliente){
		$this->db->select('id');
        $this->db->from('tbl_ordenes');
        $this->db->where('cliente',$cliente);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();  
        return $query->result_array()[0]['id'];
	}
	public function pagar_orden($orden){
		$data = array(
			'status' => 2
        );
        $this->db->where('id',$orden);
        $this->db->update('tbl_ordenes',$data);
	}
	public function get_productos_orden($orden){
		$this->db->select('producto,tipo');
        $this->db->from('tbl_ordenes_productos');
        $this->db->where('orden',$orden);
        $query = $this->db->get();  
        return $query->result_array();
	}
	public function get_cantidad_impresiones($producto){
		$this->db->select('impresiones');
        $this->db->from('tbl_disenios');
        $this->db->where('id',$producto);
        $query = $this->db->get();  
        return $query->result_array()[0]['impresiones'];
	}
	public function aumentar_impresiones($id_usuario,$cantidad){
		$this->db->set('impresiones', 'impresiones+' . $cantidad, FALSE);
        $this->db->where('id',$id_usuario);
        $this->db->update('tbl_clientes');
	}
	public function crear_orden_producto($orden,$producto,$tipo,$cantidad,$total){
		$data = array(
			'orden' => $orden,
      		'producto' => $producto,
      		'tipo' => $tipo,
      		'cantidad' => $cantidad,
      		'total' => $total
      	);
      	$this->db->insert('tbl_ordenes_productos',$data);
	}
	public function disenio_comprado($disenio,$cliente,$fecha){
		$data = array(
      		'disenio' => $disenio,
      		'cliente' => $cliente,
      		'fecha' => $fecha
      	);
      	$this->db->insert('tbl_disenios_comprados',$data);
	}
	public function get_producto_nombre($producto){
		$this->db->select('nombre');
        $this->db->from('tbl_productos');
        $this->db->where('id',$producto);
        $query = $this->db->get();  
        return $query->result_array()[0]['nombre'];
	}
}