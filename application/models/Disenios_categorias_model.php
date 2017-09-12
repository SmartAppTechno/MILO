<?php
class Disenios_categorias_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_categorias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_disenios_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function insertar_categoria($nombre){
		$data = array(
            'nombre' => $nombre
        );
        $this->db->insert('tbl_disenios_categorias',$data);
	}
	public function mostrar_categoria($id){
		$this->db->select('id,nombre');
        $this->db->from('tbl_disenios_categorias');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_categoria($id,$nombre){
		$data = array(
            'nombre' => $nombre
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_disenios_categorias',$data);
	}
	public function eliminar_categoria($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_disenios_categorias');
	}
}