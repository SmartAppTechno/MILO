<?php
class Noticias_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_noticias(){
		$this->db->select('id,titulo,portada,contenido');
		$this->db->from('tbl_noticias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function insertar_noticia($titulo,$portada,$contenido){
		$data = array(
            'titulo' => $titulo,
            'portada' => $portada,
            'contenido' => $contenido
        );
        $this->db->insert('tbl_noticias',$data);
	}
	public function mostrar_noticia($id){
		$this->db->select('id,titulo,portada,contenido');
        $this->db->from('tbl_noticias');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_noticia($id,$titulo,$contenido){
		$data = array(
            'titulo' => $titulo,
            'contenido' => $contenido
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_noticias',$data);
	}
	public function guardar_noticia_foto($id,$titulo,$portada,$contenido){
		$data = array(
            'titulo' => $titulo,
            'portada' => $portada,
            'contenido' => $contenido
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_noticias',$data);
	}
	public function eliminar_noticia($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_noticias');
	}
}