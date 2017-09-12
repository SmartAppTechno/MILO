<?php
class Video_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_videos(){
		$this->db->select('t1.id,t1.video_id,t2.nombre as categoria');
		$this->db->from('tbl_cap_videos as t1,tbl_cap_videos_categorias as t2');
		$this->db->where('t1.categoria = t2.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function insertar_video($video_id,$categoria){
		$data = array(
            'video_id' => $video_id,
            'categoria' => $categoria
        );
        $this->db->insert('tbl_cap_videos',$data);
	}
	public function mostrar_video($id){
		$this->db->select('id,video_id,categoria');
        $this->db->from('tbl_cap_videos');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_video($id,$video_id,$categoria){
		$data = array(
            'video_id' => $video_id,
            'categoria' => $categoria
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_cap_videos',$data);
	}
	public function eliminar_video($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_cap_videos');
	}
	public function get_categorias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_cap_videos_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
}