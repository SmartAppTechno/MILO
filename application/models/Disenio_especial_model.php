<?php
class Disenio_especial_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function insertar_disenio($cliente,$foto,$descripcion,$fecha){
		$data = array(
			'cliente' => $cliente,
            'foto' => $foto,
            'descripcion' => $descripcion,
            'fecha' => $fecha
        );
        $this->db->insert('tbl_disenios_especiales',$data);
	}
}