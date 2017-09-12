<?php
class Capacitacion_model extends CI_Model
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
	public function mostrar_preguntas(){
		$this->db->select('id,pregunta,respuesta');
		$this->db->from('tbl_cap_preguntas');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_videos(){
		$this->db->select('video_id,categoria');
		$this->db->from('tbl_cap_videos');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_videos_categorias(){
		$this->db->select('id,nombre,membresia');
		$this->db->from('tbl_cap_videos_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_manuales(){
		$this->db->select('titulo,url,categoria');
		$this->db->from('tbl_cap_manuales');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_manuales_categorias(){
		$this->db->select('id,nombre,membresia');
		$this->db->from('tbl_cap_manuales_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function ver_presencial(){
		$this->db->select('titulo,portada,contenido');
		$this->db->from('tbl_cap_presencial');
       	$query = $this->db->get();  
        return $query->result_array()[0];
	}
}