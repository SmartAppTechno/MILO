<?php
class Slider_promociones_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_fotos(){
		$this->db->select('id,foto,orden');
		$this->db->from('tbl_slider_promociones');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function insertar_foto($foto,$orden){
		$data = array(
            'foto' => $foto,
            'orden' => $orden
        );
        $this->db->insert('tbl_slider_promociones',$data);
	}
	public function mostrar_foto($id){
		$this->db->select('id,foto,orden');
		$this->db->from('tbl_slider_promociones');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_orden($id,$orden){
		$data = array(
            'orden' => $orden
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_slider_promociones',$data);
	}
	public function guardar_foto($id,$foto,$orden){
		$data = array(
            'foto' => $foto,
            'orden' => $orden
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_slider_promociones',$data);
	}
	public function eliminar_foto($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_slider_promociones');
	}
}