<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_controller extends CI_Controller {
	public function index()
	{
        $this->load->model('principal_model');
        $this->load->library('session');
        $data['slide_principal'] = $this->principal_model->get_slider_principal();
        $data['productos'] = $this->principal_model->get_productos();
        $data['productos_categorias'] = $this->principal_model->get_productos_categorias();
        $data['promociones'] = $this->principal_model->get_promociones();
        //Mapa de distribuidores
        $distribuidores = $this->principal_model->get_distribuidores();
        $data['map'] = $this->cargar_mapa($distribuidores);
        $data['videos'] = $this->principal_model->get_videos();
        $data['noticias'] = $this->principal_model->get_noticias_inicio();
        $data['membresias'] = $this->principal_model->get_membresias_descripcion();
        $id = $this->session->userdata('usuario_id');
        $data['usuario'] = $id;
		$this->load->view('cliente/sitio_web/index',$data);
	}
    public function cargar_mapa($ubicaciones){
        $this->load->library('googlemaps');
        $config['center'] = '22.775760, -102.572484';
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);
        foreach ($ubicaciones as $ubicacion) {
            $marker = array();
            $marker['animation'] = 'DROP';
            $marker['icon'] = base_url('templates/usuario/images/mapa.png');
            $marker['position'] = $ubicacion['latitud'] .','. $ubicacion['longitud'];
            $marker['infowindow_content'] = $ubicacion['nombre'] . ' - ' . $ubicacion['contacto'];
            $this->googlemaps->add_marker($marker);
        }
        return $this->googlemaps->create_map();
    }
    public function membresias(){
        $this->load->model('principal_model');
        $this->load->library('session');
        if( $this->session->userdata('usuario_id') ){
            $id = $this->session->userdata('usuario_id');
            $membresia = $this->principal_model->obtener_membresia($id);
            $data['membresias'] = $this->principal_model->get_membresias_usuario($membresia);
        }
        else{
            $data['membresias'] = $this->principal_model->get_membresias();
        }
        $this->load->view('cliente/sitio_web/membresias',$data);
    }
    public function solicitud_equipo(){
        $this->load->view('cliente/sitio_web/solicitud_equipo');
    }
    public function enviar_solicitud(){
        //Datos del formulario
        $nombre = $this->input->post('nombre');
        $telefono = $this->input->post('telefono');
        $correo = $this->input->post('correo');
        $codigo_postal = $this->input->post('codigo_postal');
        $medio_contacto = $this->input->post('medio_contacto');
        $establecimiento = $this->input->post('establecimiento');
        $giro = $this->input->post('giro');
        $empleados = $this->input->post('empleados');
        $sucursales = $this->input->post('sucursales');
        $temporada = $this->input->post('temporada');
        $interes = $this->input->post('interes');
        $como_enteraste = $this->input->post('como_enteraste');
        $this->load->model('principal_model');
        $this->principal_model->solicitar_equipo($nombre,$telefono,$correo,$codigo_postal,$medio_contacto,$establecimiento,$giro,$empleados,$sucursales,$temporada,$interes,$como_enteraste);
        //Mostrar página y mensaje de éxito
        $data['mensaje'] = '¡Muchas gracias por tu interés!<br>En breve un especialista te contactará.<br>Bonito día.';
        $this->load->view('cliente/sitio_web/solicitud_equipo');
    }
    public function ver_noticia(){
        $id = $this->input->post('id');
        $this->load->model('principal_model');
        $data['noticia'] = $this->principal_model->ver_noticia($id);
        $this->load->view('cliente/sitio_web/ver_noticia',$data);
    }
    public function noticias(){
        $this->load->model('principal_model');
        $data['noticias'] = $this->principal_model->get_noticias();
        $this->load->view('cliente/sitio_web/noticias',$data);
    }
    public function nosotros(){
        $this->load->model('principal_model');
        $data['nosotros'] = $this->principal_model->ver_nosotros();
        $this->load->view('cliente/sitio_web/quienes-somos',$data);
    }
    public function google_login(){
        $client_id = '150385403600-qse315l8b8pldj2e8ndcr55hhd0t1tpd.apps.googleusercontent.com';
        $client_secret = 'qVU1C9UodcH-BfazLZtBOL61';
        $redirect_uri = base_url('google_callback');;
        $client = new Google_Client();
        $client->setApplicationName("Made In Love");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");
        $objOAuthService = new Google_Service_Oauth2($client);
        $authUrl = $client->createAuthUrl();
        header('Location: '.$authUrl);
    }
    public function google_callback(){
        $client_id = '150385403600-qse315l8b8pldj2e8ndcr55hhd0t1tpd.apps.googleusercontent.com';
        $client_secret = 'qVU1C9UodcH-BfazLZtBOL61';
        $redirect_uri = base_url('google_callback');;
        $client = new Google_Client();
        $client->setApplicationName("Made In Love");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");
        $service = new Google_Service_Oauth2($client);
        $client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();
        $user = $service->userinfo->get();

        $this->load->model('principal_model');
        $this->load->library('session');
        $nombre = $user->name;
        $email = $user->email;
        $foto = $user->picture.'?sz=200';
        $membresia = $this->principal_model->usuario_membresia($email);
        if(count($membresia) > 0) {
            $membresia = $membresia[0]['membresia'];
            if($membresia == 4){
                redirect();
            }
            if($membresia == 5){
                redirect('membresias');
            }else{
                $usuario_id = $this->principal_model->nuevo_usuario($nombre,$email,$foto,'Google');
                $carrito_data = array();
                $this->session->set_userdata(array(
                  'usuario_id' => $usuario_id,
                  'carrito_data' => $carrito_data,
                  'carrito_cantidad' => 0,
                  'crear_paso' => 1,
                  'crear_producto' => 0,
                  'crear_cat_producto' => 0,
                  'crear_ocasion' => 0,
                  'crear_disenio' => 0,
                  'crear_previa' => ''
                ));
                redirect('perfil');
            }
        }else{
            $usuario_id = $this->principal_model->nuevo_usuario($nombre,$email,$foto,'Google');
            redirect('membresias');
        }
    }
	public function fblogin(){
        $this->load->library('session');
        if(!session_id()) {
            session_start();
        }
		$fb = new Facebook\Facebook([
		'app_id' => '1931535743782274',
		'app_secret' => 'cf8448c18341e0e54aa5d8519d46866f',
		'default_graph_version' => 'v2.5',
		]);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email']; 
		$loginUrl = $helper->getLoginUrl(base_url() . '/fbcallback', $permissions);
		redirect($loginUrl);
	}
	public function fbcallback(){
        $this->load->library('session');
        if(!session_id()) {
            session_start();
        }
        $fb = new Facebook\Facebook([
        'app_id' => '1931535743782274',
        'app_secret' => 'cf8448c18341e0e54aa5d8519d46866f',
        'default_graph_version' => 'v2.5',
        ]);
        $helper = $fb->getRedirectLoginHelper();  
        try{
        $accessToken = $helper->getAccessToken();  
        }catch(Facebook\Exceptions\FacebookResponseException $e) {  
        echo 'Graph returned an error: ' . $e->getMessage();  
        exit;  
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();  
        exit;  
        }  
        try {
        $response = $fb->get('/me?fields=name,email', $accessToken);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'ERROR: Graph ' . $e->getMessage();
        exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'ERROR: validation fails ' . $e->getMessage();
        exit;
        }
        $this->load->model('principal_model');
        // Guardar el usuario
        $me = $response->getGraphUser();
        $nombre = $me->getProperty('name');
        $email = $me->getProperty('email');
        $profileid = $me->getProperty('id');
        $foto = '//graph.facebook.com/'.$profileid.'/picture?type=large';
        $membresia = $this->principal_model->usuario_membresia($email);
        if(count($membresia) > 0) {
            $membresia = $membresia[0]['membresia'];
            if($membresia == 4){
                redirect();
            }
            if($membresia == 5){
                redirect('membresias');
            }else{
                $usuario_id = $this->principal_model->nuevo_usuario($nombre,$email,$foto,'Facebook');
                $carrito_data = array();
                $this->session->set_userdata(array(
                  'usuario_id' => $usuario_id,
                  'carrito_data' => $carrito_data,
                  'carrito_cantidad' => 0,
                  'crear_paso' => 1,
                  'crear_producto' => 0,
                  'crear_cat_producto' => 0,
                  'crear_ocasion' => 0,
                  'crear_disenio' => 0,
                  'crear_previa' => ''
                ));
                redirect('perfil');
            }
        }else{
            $usuario_id = $this->principal_model->nuevo_usuario($nombre,$email,$foto,'Facebook');
            redirect('membresias');
        }
    }
    public function cerrar_sesion(){
        $this->load->library('session');
        $this->session->sess_destroy();
        redirect();
    }
}