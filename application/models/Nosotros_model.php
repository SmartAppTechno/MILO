<?php
class Nosotros_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_nosotros(){
		$this->db->select('titulo,portada,contenido');
		$this->db->from('tbl_nosotros');
       	$query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_nosotros($titulo,$contenido){
		$data = array(
            'titulo' => $titulo,
            'contenido' => $contenido
        );
        $this->db->update('tbl_nosotros',$data);
	}
	public function guardar_nosotros_foto($titulo,$portada,$contenido){
		$data = array(
            'titulo' => $titulo,
            'portada' => $portada,
            'contenido' => $contenido
        );
        $this->db->update('tbl_nosotros',$data);
	}
}