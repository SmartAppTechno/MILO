<?php
class Distribuidores_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_distribuidores(){
		$this->db->select('id,nombre,contacto,latitud,longitud');
		$this->db->from('tbl_distribuidores');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function insertar_distribuidor($nombre,$contacto,$latitud,$longitud){
		$data = array(
            'nombre' => $nombre,
            'contacto' => $contacto,
            'latitud' => $latitud,
            'longitud' => $longitud
        );
        $this->db->insert('tbl_distribuidores',$data);
	}
	public function mostrar_distribuidor($id){
		$this->db->select('id,nombre,contacto,latitud,longitud');
        $this->db->from('tbl_distribuidores');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_distribuidor($id,$nombre,$contacto,$latitud,$longitud){
		$data = array(
            'nombre' => $nombre,
            'contacto' => $contacto,
            'latitud' => $latitud,
            'longitud' => $longitud
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_distribuidores',$data);
	}
	public function eliminar_distribuidor($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_distribuidores');
	}
}