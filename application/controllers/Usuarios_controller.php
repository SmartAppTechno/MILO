<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios_controller extends CI_Controller {
    public function index(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Cargar el modelo
        $this->load->model('usuarios_model');
        $data['usuarios'] = $this->usuarios_model->get_usuarios();
        //Obtener datos del usuario logueado
        $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
        $data['rol_usuario'] = $this->session->userdata('usuario_rol');
        //Mostrar el formulario
        $this->load->view('admin/usuarios/index',$data);
        }else{
            redirect('admin');
        }
    }
    public function nuevo_usuario(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            $this->load->model('usuarios_model');
            $data['roles'] = $this->usuarios_model->get_roles();
            $data['menus'] = $this->usuarios_model->get_menus();
            //Permisos
            $data['uno'] = '';$data['dos'] = '';$data['tres'] = '';$data['cuatro'] = '';$data['cinco'] = '';$data['seis'] = '';
            $data['siete'] = '';$data['ocho'] = '';$data['nueve'] = '';$data['diez'] = '';$data['once'] = '';$data['doce'] = '';
            $data['trece'] = '';$data['catorce'] = '';$data['quince'] = '';
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/usuarios/nuevo_usuario',$data);
        }else{
            redirect('admin');
        }
    }
    public function crear_usuario(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $rol = $this->input->post('rol');
            $nombre = $this->input->post('nombre');
            $correo = $this->input->post('correo');
            $usuario = $this->input->post('usuario');
            $contrasenia = $this->input->post('contrasenia');
            //Permisos
            $permisos = $this->input->post('permisos');
            $permisos_db = array();
            for ($i = 1; $i <= 15; $i++){
                if (in_array($i, $permisos)){
                    $permisos_db[$i] = 1;
                }else{
                    $permisos_db[$i] = 0;
                }
            }
            //Cargar el modelo
            $this->load->model('usuarios_model');
            //Validar datos
            $data['mensaje'] = '';
            $correo_unico = $this->usuarios_model->validar_correo($correo);
            $usuario_unico = $this->usuarios_model->validar_usuario($usuario);
            //Permisos
            $data['uno'] = '';$data['dos'] = '';$data['tres'] = '';$data['cuatro'] = '';$data['cinco'] = '';$data['seis'] = '';
            $data['siete'] = '';$data['ocho'] = '';$data['nueve'] = '';$data['diez'] = '';$data['once'] = '';$data['doce'] = '';
            $data['trece'] = '';$data['catorce'] = '';$data['quince'] = '';
            if( count($correo_unico) > 0 && count($usuario_unico) == 0){
                $data['mensaje'] = 'El correo ya fue registrado';
                $data['rol_select'] = $rol;
                $data['nombre'] = $nombre;
                $data['usuario'] = $usuario;
                $data['contrasenia'] = $contrasenia;
                $data['roles'] = $this->usuarios_model->get_roles();
                $data['menus'] = $this->usuarios_model->get_menus();
                $data['permisos'] = $permisos;
            }
            if( count($usuario_unico) > 0 && count($correo_unico) == 0){
                $data['mensaje'] .= 'El usuario ya fue registrado'; 
                $data['rol_select'] = $rol;
                $data['nombre'] = $nombre;
                $data['correo'] = $correo;
                $data['contrasenia'] = $contrasenia;
                $data['roles'] = $this->usuarios_model->get_roles();
                $data['menus'] = $this->usuarios_model->get_menus();
                $data['permisos'] = $permisos;
            }
            if( count($usuario_unico) > 0 && count($correo_unico) > 0){
                $data['mensaje'] .= 'El correo y el usuario ya fueron registrados'; 
                $data['rol_select'] = $rol;
                $data['nombre'] = $nombre;
                $data['contrasenia'] = $contrasenia;
                $data['roles'] = $this->usuarios_model->get_roles();
                $data['menus'] = $this->usuarios_model->get_menus();
                $data['permisos'] = $permisos;
            }
            if( $data['mensaje'] != '' ){
                //Obtener datos del usuario logueado
                $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
                $data['rol_usuario'] = $this->session->userdata('usuario_rol');
                $this->load->view('admin/usuarios/nuevo_usuario',$data);
            } else{
                //Encriptar contraseña
                $hash =  bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
                $aux = $contrasenia . $hash;
                $final = hash('sha256', $aux);
                //Insertar en bd
                $usuario_id = $this->usuarios_model->insertar_usuario($nombre,$correo,$rol,$usuario,$final,$hash);
                //Insertar permisos
                foreach ($permisos_db as $key =>$permiso) {
                    $menu = $key;
                    $estado = $permiso;
                    $this->usuarios_model->insertar_permiso($usuario_id,$menu,$estado);
                }
                redirect('usuarios');
            }
        }else{
            redirect('admin');
        }
    }
    public function editar_usuario(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('usuarios_model');
            $data['usuario'] = $this->usuarios_model->mostrar_usuario($id);
            $permisos_db = $this->usuarios_model->mostrar_permisos_usuario($id);
            $permisos = array();
            foreach ($permisos_db as $key => $permiso) {
                $permisos[$permiso['menu']] = $permiso['estado'];
            }
            $data['permisos'] = $permisos;
            $data['roles'] = $this->usuarios_model->get_roles();
            $data['menus'] = $this->usuarios_model->get_menus();
            //Obtener datos del usuario logueado
            $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
            $data['rol_usuario'] = $this->session->userdata('usuario_rol');
            //Mostrar el formulario
            $this->load->view('admin/usuarios/editar_usuario',$data);
        }else{
            redirect('admin');
        }
    }
    public function guardar_usuario(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            $correo = $this->input->post('correo');
            $rol = $this->input->post('rol');
            //Permisos
            $permisos = $this->input->post('permisos');
            $permisos_db = array();
            for ($i = 1; $i <= 15; $i++){
                if (in_array($i, $permisos)){
                    $permisos_db[$i] = 1;
                }else{
                    $permisos_db[$i] = 0;
                }
            }
            //Cargar el modelo
            $this->load->model('usuarios_model');
            $correo_unico = $this->usuarios_model->validar_correo_existente($correo,$id);
            if( count($correo_unico) > 0 ){
                $data['usuario'] = $this->usuarios_model->mostrar_usuario($id);
                $permisos_db = $this->usuarios_model->mostrar_permisos_usuario($id);
                $permisos = array();
                foreach ($permisos_db as $key => $permiso) {
                    $permisos[$permiso['menu']] = $permiso['estado'];
                }
                $data['permisos'] = $permisos;
                $data['roles'] = $this->usuarios_model->get_roles();
                $data['menus'] = $this->usuarios_model->get_menus();
                $data['mensaje'] = 'El correo está siendo usado por otro usuario';
                //Obtener datos del usuario logueado
                $data['nombre_usuario'] = $this->session->userdata('usuario_nombre');
                $data['rol_usuario'] = $this->session->userdata('usuario_rol');
                //Mostrar el formulario
                $this->load->view('admin/usuarios/editar_usuario',$data);
            } else{
                if( $this->input->post('contrasenia') ){
                    $contrasenia = $this->input->post('contrasenia');
                    //Encriptar contraseña
                    $hash =  bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
                    $aux = $contrasenia . $hash;
                    $final = hash('sha256', $aux);
                    //Actualizar en bd
                    $this->usuarios_model->guardar_usuario_password($id,$nombre,$correo,$rol,$final,$hash);
                    //Actualizar permisos
                    foreach ($permisos_db as $key =>$permiso) {
                        $menu = $key;
                        $estado = $permiso;
                        $this->usuarios_model->actualizar_permiso($id,$menu,$estado);
                    }
                    redirect('usuarios');
                }else{
                    //Actualizar en bd
                    $this->usuarios_model->guardar_usuario($id,$nombre,$correo,$rol);
                    //Actualizar permisos
                    foreach ($permisos_db as $key =>$permiso) {
                        $menu = $key;
                        $estado = $permiso;
                        $this->usuarios_model->actualizar_permiso($id,$menu,$estado);
                    }
                    redirect('usuarios');
                }
            }
            
        }else{
            redirect('admin');
        }
    }
    public function eliminar_usuario(){
        $this->load->library('session');
        //Revisar si hay una sesión iniciada
        if( $this->session->userdata('usuario_nombre') && $this->session->userdata('usuario_rol') ){
            //Datos del formulario
            $id = $this->input->post('id');
            //Cargar el modelo
            $this->load->model('usuarios_model');
            $this->usuarios_model->eliminar_usuario($id);
            redirect('usuarios');
        }else{
            redirect('admin');
        }
    }
}