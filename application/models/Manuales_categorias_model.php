<?php
class Manuales_categorias_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_categorias(){
		$this->db->select('t1.id,t1.nombre,t2.nombre as membresia');
		$this->db->from('tbl_cap_manuales_categorias as t1,tbl_tipo_membresia as t2');
		$this->db->where('t1.membresia = t2.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function insertar_categoria($nombre,$membresia){
		$data = array(
            'nombre' => $nombre,
            'membresia' => $membresia
        );
        $this->db->insert('tbl_cap_manuales_categorias',$data);
	}
	public function mostrar_categoria($id){
		$this->db->select('id,nombre,membresia');
        $this->db->from('tbl_cap_manuales_categorias');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_categoria($id,$nombre,$membresia){
		$data = array(
            'nombre' => $nombre,
            'membresia' => $membresia
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_cap_manuales_categorias',$data);
	}
	public function eliminar_categoria($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_cap_manuales_categorias');
	}
	public function get_membresias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_tipo_membresia');
		$this->db->where('id NOT LIKE 4');
       	$query = $this->db->get();  
        return $query->result_array();
	}
}