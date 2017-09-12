<?php
class Dashboard_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function count_clientes(){
		$numero = $this->db->count_all('tbl_clientes');
		return number_format($numero, 0, '.', ',');
	}
	public function get_membresias(){
		$this->db->select('id,nombre');
		$this->db->from('tbl_tipo_membresia');
       	$query = $this->db->get();  
        return $query->result_array();
	}
	public function count_membresia($id){
		$this->db->select('id');
		$this->db->from('tbl_clientes');
		$this->db->where('membresia',$id);
       	$query = $this->db->get();  
        return $query->num_rows();
	}
	public function count_productos(){
		$numero = $this->db->count_all('tbl_productos');
		return number_format($numero, 0, '.', ',');
	}
	public function count_disenios(){
		$numero = $this->db->count_all('tbl_disenios');
		return number_format($numero, 0, '.', ',');
	}
	public function count_ocasiones(){
		$numero = $this->db->count_all('tbl_ocasiones');
		return number_format($numero, 0, '.', ',');
	}
	public function cantidad_creaciones_diarias(){
		date_default_timezone_set('America/Mexico_City');
		$hoy = date('d');
		$mes = date('m');
		$this->db->select('id');
		$this->db->from('tbl_crear_productos');
		$this->db->where('day(fecha)',$hoy);
		$this->db->where('month(fecha)',$mes);
       	$query = $this->db->get();
        $numero = $query->num_rows();
		return number_format($numero, 0, '.', ',');
	}
	public function cantidad_creaciones_semanales(){
		date_default_timezone_set('America/Mexico_City');
		$semana = date('W');
		$this->db->select('id');
		$this->db->from('tbl_crear_productos');
		$this->db->where('week(fecha)',$semana); 
       	$query = $this->db->get();
        $numero = $query->num_rows();
		return number_format($numero, 0, '.', ',');
	}
	public function cantidad_creaciones_mensuales(){
		date_default_timezone_set('America/Mexico_City');
		$mes = date('m');
		$this->db->select('id');
		$this->db->from('tbl_crear_productos');
		$this->db->where('month(fecha)',$mes); 
       	$query = $this->db->get();
        $numero = $query->num_rows();
		return number_format($numero, 0, '.', ',');
	}
	public function cantidad_creaciones_anuales(){
		date_default_timezone_set('America/Mexico_City');
		$anio = date('Y');
		$this->db->select('id');
		$this->db->from('tbl_crear_productos');
		$this->db->where('year(fecha)',$anio); 
       	$query = $this->db->get();
        $numero = $query->num_rows();
		return number_format($numero, 0, '.', ',');
	}
	public function ordenes_diarias(){
		date_default_timezone_set('America/Mexico_City');
		$hoy = date('d');
		$mes = date('m');
		$this->db->select('sum(total) as ordenes');
		$this->db->from('tbl_ordenes');
		$this->db->where('day(fecha)',$hoy);
		$this->db->where('month(fecha)',$mes);
       	$query = $this->db->get();
        $numero = $query->result_array()[0]['ordenes'];
        return number_format((float)$numero, 2, '.', ',');
	}
	public function cantidad_ordenes_diarias(){
		date_default_timezone_set('America/Mexico_City');
		$hoy = date('d');
		$mes = date('m');
		$this->db->select('id');
		$this->db->from('tbl_ordenes');
		$this->db->where('day(fecha)',$hoy);
		$this->db->where('month(fecha)',$mes);
       	$query = $this->db->get();
        $numero = $query->num_rows();
		return number_format($numero, 0, '.', ',');
	}
	public function ordenes_semanales(){
		date_default_timezone_set('America/Mexico_City');
		$semana = date('W');
		$this->db->select('sum(total) as ordenes');
		$this->db->from('tbl_ordenes');
		$this->db->where('week(fecha)',$semana); 
       	$query = $this->db->get();
        $numero = $query->result_array()[0]['ordenes'];
        return number_format((float)$numero, 2, '.', ',');
	}
	public function cantidad_ordenes_semanales(){
		date_default_timezone_set('America/Mexico_City');
		$semana = date('W');
		$this->db->select('id');
		$this->db->from('tbl_ordenes');
		$this->db->where('week(fecha)',$semana); 
       	$query = $this->db->get();
        $numero = $query->num_rows();
		return number_format($numero, 0, '.', ',');
	}
	public function ordenes_mensuales(){
		date_default_timezone_set('America/Mexico_City');
		$mes = date('m');
		$this->db->select('sum(total) as ordenes');
		$this->db->from('tbl_ordenes');
		$this->db->where('month(fecha)',$mes); 
       	$query = $this->db->get();
        $numero = $query->result_array()[0]['ordenes'];
        return number_format((float)$numero, 2, '.', ',');
	}
	public function cantidad_ordenes_mensuales(){
		date_default_timezone_set('America/Mexico_City');
		$mes = date('m');
		$this->db->select('id');
		$this->db->from('tbl_ordenes');
		$this->db->where('month(fecha)',$mes); 
       	$query = $this->db->get();
        $numero = $query->num_rows();
		return number_format($numero, 0, '.', ',');
	}
	public function ordenes_anuales(){
		date_default_timezone_set('America/Mexico_City');
		$anio = date('Y');
		$this->db->select('sum(total) as ordenes');
		$this->db->from('tbl_ordenes');
		$this->db->where('year(fecha)',$anio); 
       	$query = $this->db->get();
        $numero = $query->result_array()[0]['ordenes'];
        return number_format((float)$numero, 2, '.', ',');
	}
	public function cantidad_ordenes_anuales(){
		date_default_timezone_set('America/Mexico_City');
		$anio = date('Y');
		$this->db->select('id');
		$this->db->from('tbl_ordenes');
		$this->db->where('year(fecha)',$anio); 
       	$query = $this->db->get();
        $numero = $query->num_rows();
		return number_format($numero, 0, '.', ',');
	}
	public function grafica_ordenes(){
		date_default_timezone_set('America/Mexico_City');
		$anio = date('Y');
		$this->db->select('count(id) as ordenes,month(fecha) as mes');
		$this->db->from('tbl_ordenes');
		$this->db->where('year(fecha)',$anio); 
		$this->db->group_by('month(fecha)'); 
       	$query = $this->db->get();
        return $query->result_array();
	}
	public function grafica_creaciones(){
		date_default_timezone_set('America/Mexico_City');
		$anio = date('Y');
		$this->db->select('count(id) as creaciones,month(fecha) as mes');
		$this->db->from('tbl_crear_productos');
		$this->db->where('year(fecha)',$anio); 
		$this->db->group_by('month(fecha)'); 
       	$query = $this->db->get();
        return $query->result_array();
	}
}