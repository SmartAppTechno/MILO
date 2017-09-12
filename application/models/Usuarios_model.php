<?php
class Usuarios_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
    public function get_usuarios(){
        $this->db->select('t1.id,t1.nombre,t1.correo,t1.usuario,t2.nombre as rol');
        $this->db->from('tbl_usuarios as t1,tbl_rol as t2');
        $this->db->where('t1.rol = t2.id');
        $query = $this->db->get();  
        return $query->result_array();
    }
    public function get_roles(){
        $this->db->select('id,nombre');
        $this->db->from('tbl_rol');
        $query = $this->db->get();  
        return $query->result_array();
    }
    public function get_menus(){
        $this->db->select('id,nombre');
        $this->db->from('tbl_permisos_menu');
        $query = $this->db->get();  
        return $query->result_array();
    }
    public function validar_correo($correo){
        $this->db->select('id');
        $this->db->from('tbl_usuarios');
        $this->db->where('correo',$correo);
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
    public function insertar_usuario($nombre,$correo,$rol,$usuario,$contrasenia,$hash){
        $data = array(
            'nombre' => $nombre,
            'correo' => $correo,
            'rol' => $rol,
            'usuario' => $usuario,
            'contrasenia' => $contrasenia,
            'hash' => $hash
        );
        $this->db->insert('tbl_usuarios',$data);
        return $this->db->insert_id();
    }
    public function insertar_permiso($usuario,$menu,$estado){
        $data = array(
            'usuario' => $usuario,
            'menu' => $menu,
            'estado' => $estado
        );
        $this->db->insert('tbl_permisos',$data);
    }
    public function mostrar_usuario($id){
        $this->db->select('id,nombre,correo,usuario,rol');
        $this->db->from('tbl_usuarios');
        $this->db->where('id',$id);
        $query = $this->db->get();  
        return $query->result_array()[0];
    }
    public function mostrar_permisos_usuario($id){
        $this->db->select('menu,estado');
        $this->db->from('tbl_permisos');
        $this->db->where('usuario',$id);
        $query = $this->db->get();  
        return $query->result_array();
    }
    public function validar_correo_existente($correo,$id){
        $this->db->select('id');
        $this->db->from('tbl_usuarios');
        $this->db->where('correo',$correo);
        $this->db->where('id NOT LIKE ' . $id);
        $query = $this->db->get();  
        return $query->result_array();
    }
    public function guardar_usuario($id,$nombre,$correo,$rol){
        $data = array(
            'nombre' => $nombre,
            'correo' => $correo,
            'rol' => $rol
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_usuarios',$data);
    }
    public function guardar_usuario_password($id,$nombre,$correo,$rol,$contrasenia,$hash){
        $data = array(
            'nombre' => $nombre,
            'correo' => $correo,
            'rol' => $rol,
            'contrasenia' => $contrasenia,
            'hash' => $hash
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_usuarios',$data);
    }
    public function actualizar_permiso($id,$menu,$estado){
        $data = array(
            'estado' => $estado
        );
        $this->db->where('usuario',$id);
        $this->db->where('menu',$menu);
        $this->db->update('tbl_permisos',$data);
    }
    public function eliminar_usuario($id){
        //Permisos
        $this->db->where('usuario',$id);
        $this->db->delete('tbl_permisos');
        //Usuario
        $this->db->where('id',$id);
        $this->db->delete('tbl_usuarios');
    }
}