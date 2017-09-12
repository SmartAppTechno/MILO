<?php
class Manual_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_manuales(){
		$this->db->select('t1.id,t1.titulo,t1.url,t2.nombre as categoria');
		$this->db->from('tbl_cap_manuales as t1,tbl_cap_manuales_categorias as t2');
		$this->db->where('t1.categoria = t2.id');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function insertar_manual($titulo,$url,$categoria){
		$data = array(
			'titulo' => $titulo,
            'url' => $url,
            'categoria' => $categoria
        );
        $this->db->insert('tbl_cap_manuales',$data);
	}
	public function mostrar_manual($id){
		$this->db->select('id,titulo,url,categoria');
        $this->db->from('tbl_cap_manuales');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
	}
	public function guardar_manual($id,$titulo,$categoria){
		$data = array(
			'titulo' => $titulo,
            'categoria' => $categoria
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_cap_manuales',$data);
	}
	public function guardar_manual_documento($id,$titulo,$url,$categoria){
		$data = array(
			'titulo' => $titulo,
            'url' => $url,
            'categoria' => $categoria
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_cap_manuales',$data);
	}
	public function eliminar_manual($id){
		$this->db->where('id',$id);
        $this->db->delete('tbl_cap_manuales');
	}
	public function get_categorias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_cap_manuales_categorias');
       	$query = $this->db->get();  
        return $query->result_array();
	}
}