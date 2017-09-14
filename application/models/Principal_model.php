<?php
class Principal_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function nuevo_usuario($nombre,$email,$foto,$red_social){
      	//Ver si el usuario ya existe
      	$this->db->where('email',$email);
		$existe = $this->db->get('tbl_clientes');
		if( $existe->num_rows() > 0 ) {
			//Obtener el id del usuario
			$this->db->select('id');
    		$this->db->from('tbl_clientes');
    		$this->db->where('email', $email);
    		$query = $this->db->get();    
   	 		$aux = $query->result_array();
   	 		$usuario_id = $aux[0]['id'];
		} else {
			$data = array(
				'nombre' => $nombre,
	      		'email' => $email,
	      		'foto' => $foto,
				'red_social' => $red_social,
	      		'membresia' => 5
	      	);
			//Insertar nuevo usuario
			$this->db->insert('tbl_clientes',$data);
			//Obtener el id del usuario
			$usuario_id = $this->db->insert_id();
			//Insertar la dirección vacía
		 	$data = array('cliente' => $usuario_id);
		 	$this->db->insert('tbl_direccion',$data);
		}
        return $usuario_id;
	}
	public function usuario_membresia($email){
		$this->db->select('membresia');
		$this->db->from('tbl_clientes');
		$this->db->where('email',$email);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_slider_principal(){
		$this->db->select('foto');
		$this->db->from('tbl_slider_principal');
		$this->db->order_by('orden', 'asc');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_productos(){
		$this->db->select('t1.nombre,t1.precio,t1.url,t1.categoria,t2.nombre as membresia');
		$this->db->from('tbl_productos as t1, tbl_tipo_membresia as t2');
		$this->db->where('t1.membresia = t2.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_productos_categorias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_productos_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_promociones(){
		$this->db->select('foto');
		$this->db->from('tbl_slider_promociones');
		$this->db->order_by('orden', 'asc');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function obtener_membresia($id_usuario){
		$this->db->select('membresia');
		$this->db->from('tbl_clientes');
		$this->db->where('id',$id_usuario);
       	$query = $this->db->get();  
        return $query->result_array()[0]['membresia'];
	}
	public function get_membresias_usuario($membresia){
		$this->db->select('id,nombre,precio,lista,foto,paypal');
		$this->db->from('tbl_tipo_membresia');
		$this->db->where('id NOT LIKE',$membresia);
		$this->db->where('id NOT LIKE 4');
		$this->db->where('id NOT LIKE 5');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_membresias_descripcion(){
		$this->db->select('nombre,foto,descripcion');
		$this->db->from('tbl_tipo_membresia');
		$this->db->where('id NOT LIKE 4');
		$this->db->where('id NOT LIKE 5');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_membresias(){
		$this->db->select('id,nombre,precio,lista,foto,paypal');
		$this->db->from('tbl_tipo_membresia');
		$this->db->where('id NOT LIKE 4');
		$this->db->where('id NOT LIKE 5');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function solicitar_equipo($nombre,$telefono,$correo,$codigo_postal,$medio_contacto,$establecimiento,$giro,$empleados,$sucursales,$temporada,$interes,$como_enteraste){
		$data = array(
      		'nombre' => $nombre,
      		'telefono' => $telefono,
			'correo' => $correo,
      		'codigo_postal' => $codigo_postal,
      		'medio_contacto' => $medio_contacto,
      		'establecimiento' => $establecimiento,
      		'giro' => $giro,
      		'empleados' => $empleados,
      		'sucursales' => $sucursales,
      		'temporada' => $temporada,
      		'interes' => $interes,
      		'como_enteraste' => $como_enteraste
      	);
		$this->db->insert('tbl_solicitud_equipo',$data);
	}
	public function get_videos(){
		$this->db->select('video_id');
		$this->db->from('tbl_pagina_videos');
		$this->db->order_by('orden', 'asc');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_noticias_inicio(){
		$this->db->select('id,titulo,portada,contenido');
		$this->db->from('tbl_noticias');
		$this->db->order_by('id', 'desc');
		$this->db->limit(3);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_noticias(){
		$this->db->select('id,titulo,portada,contenido');
		$this->db->from('tbl_noticias');
		$this->db->order_by('id', 'desc');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function ver_noticia($id){
		$this->db->select('titulo,portada,contenido');
		$this->db->from('tbl_noticias');
		$this->db->where('id',$id);
       	$query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function ver_nosotros(){
		$this->db->select('titulo,portada,contenido');
		$this->db->from('tbl_nosotros');
       	$query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function get_distribuidores(){
		$this->db->select('nombre,contacto,latitud,longitud');
		$this->db->from('tbl_distribuidores');
       	$query = $this->db->get();  
        return $query->result_array();
	}
}