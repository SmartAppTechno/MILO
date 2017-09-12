<?php
class Capacitacion_presencial_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_presencial(){
		$this->db->select('titulo,portada,contenido');
		$this->db->from('tbl_cap_presencial');
       	$query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_presencial($titulo,$contenido){
		$data = array(
            'titulo' => $titulo,
            'contenido' => $contenido
        );
        $this->db->update('tbl_cap_presencial',$data);
	}
	public function guardar_presencial_foto($titulo,$portada,$contenido){
		$data = array(
            'titulo' => $titulo,
            'portada' => $portada,
            'contenido' => $contenido
        );
        $this->db->update('tbl_cap_presencial',$data);
	}
}