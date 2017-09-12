<?php
class Perfil_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function mostrar_perfil($id_usuario){
		$this->db->select('nombre,email,foto');
		$this->db->from('tbl_clientes');
        $this->db->where('id',$id_usuario);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_paises(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_paises');
		$this->db->order_by('nombre', 'asc');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function mostrar_direccion($id_cliente){
		$this->db->select('calle,numero,colonia,codigo_postal,estado,pais');
		$this->db->from('tbl_direccion');
        $this->db->where('cliente',$id_cliente);
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function direcion_db($id_usuario,$calle,$numero,$colonia,$postal,$estado,$pais){
		$data = array(
			'calle' => $calle,
      		'numero' => $numero,
      		'colonia' => $colonia,
      		'codigo_postal' => $postal,
			'estado' => $estado,
			'pais' => $pais
      	);
      	//Actualizar datos
		$this->db->where('cliente',$id_usuario);
		$this->db->update('tbl_direccion',$data);
	}
}