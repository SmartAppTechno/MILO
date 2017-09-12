<?php
class Video_pagina_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_videos(){
		$this->db->select('id,video_id,orden');
		$this->db->from('tbl_pagina_videos');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function insertar_video($video_id,$orden){
		$data = array(
            'video_id' => $video_id,
            'orden' => $orden
        );
        $this->db->insert('tbl_pagina_videos',$data);
	}
	public function mostrar_video($id){
		$this->db->select('id,video_id,orden');
        $this->db->from('tbl_pagina_videos');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_video($id,$video_id,$orden){
		$data = array(
            'video_id' => $video_id,
            'orden' => $orden
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_pagina_videos',$data);
	}
	public function eliminar_video($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_pagina_videos');
	}
}