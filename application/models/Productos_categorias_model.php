<?php
class Productos_categorias_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_categorias(){
		$this->db->select('id,nombre,video_id');
		$this->db->from('tbl_productos_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function insertar_categoria($nombre,$video_id){
		$data = array(
            'nombre' => $nombre,
            'video_id' => $video_id
        );
        $this->db->insert('tbl_productos_categorias',$data);
	}
	public function mostrar_categoria($id){
		$this->db->select('id,nombre,video_id');
        $this->db->from('tbl_productos_categorias');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_categoria($id,$nombre,$video_id){
		$data = array(
            'nombre' => $nombre,
            'video_id' => $video_id
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_productos_categorias',$data);
	}
	public function eliminar_categoria($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_productos_categorias');
	}
}