<?php
class Preguntas_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_preguntas(){
		$this->db->select('id,pregunta,respuesta');
		$this->db->from('tbl_cap_preguntas');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function insertar_pregunta($pregunta,$respuesta){
		$data = array(
            'pregunta' => $pregunta,
            'respuesta' => $respuesta
        );
        $this->db->insert('tbl_cap_preguntas',$data);
	}
	public function mostrar_pregunta($id){
		$this->db->select('id,pregunta,respuesta');
        $this->db->from('tbl_cap_preguntas');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_pregunta($id,$pregunta,$respuesta){
		$data = array(
            'pregunta' => $pregunta,
            'respuesta' => $respuesta
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_cap_preguntas',$data);
	}
	public function eliminar_pregunta($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_cap_preguntas');
	}
}