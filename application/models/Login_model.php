<?php
class Login_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function obtener_hash($usuario){
		$this->db->select('hash');
		$this->db->from('tbl_usuarios');
		$this->db->where('usuario',$usuario);
       	$query = $this->db->get();  
        return $query->result_array()[0]['hash'];
	}
	public function validar_credenciales($usuario,$contrasenia){
		$this->db->select('id,nombre,rol');
		$this->db->from('tbl_usuarios');
		$this->db->where('usuario',$usuario);
		$this->db->where('contrasenia',$contrasenia);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function validar_usuario($usuario){
		$this->db->select('id');
		$this->db->from('tbl_usuarios');
		$this->db->where('usuario',$usuario);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function get_rol($id){
		$this->db->select('nombre');
		$this->db->from('tbl_rol');
		$this->db->where('id',$id);
       	$query = $this->db->get();  
        return $query->result_array()[0]['nombre'];
	}
	public function mostrar_permisos_usuario($id){
        $this->db->select('menu,estado');
        $this->db->from('tbl_permisos');
        $this->db->where('usuario',$id);
        $query = $this->db->get();  
        return $query->result_array();
    }
}