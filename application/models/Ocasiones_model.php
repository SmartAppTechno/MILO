<?php
class Ocasiones_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_ocasiones(){
		$this->db->select('t1.id,t1.nombre,t1.url as foto,t2.nombre as membresia');
		$this->db->from('tbl_ocasiones as t1,tbl_tipo_membresia as t2');
		$this->db->where('t1.membresia = t2.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function insertar_ocasion($nombre,$url,$membresia){
		$data = array(
            'nombre' => $nombre,
            'url' => $url,
            'membresia' => $membresia
        );
        $this->db->insert('tbl_ocasiones',$data);
	}
	public function mostrar_ocasion($id){
		$this->db->select('id,nombre,url as foto,membresia');
		$this->db->from('tbl_ocasiones');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_ocasion($id,$nombre,$membresia){
		$data = array(
            'nombre' => $nombre,
            'membresia' => $membresia
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_ocasiones',$data);
	}
	public function guardar_ocasion_foto($id,$nombre,$url,$membresia){
		$data = array(
            'nombre' => $nombre,
            'url' => $url,
            'membresia' => $membresia
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_ocasiones',$data);
	}
	public function eliminar_ocasion($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_ocasiones');
	}
	public function get_membresias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_tipo_membresia');
		$this->db->where('id NOT LIKE 4');
       	$query = $this->db->get();  
        return $query->result_array();
	}
}