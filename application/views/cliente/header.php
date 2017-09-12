<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
<title>Made in Love</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link rel="icon" type="image/png" href="<?php echo base_url('templates/admin/images/favicon.png'); ?>" />
<!-- Custom Theme files -->
<link href="<?php echo base_url('templates/usuario/css/bootstrap.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('templates/usuario/css/style.css'); ?>" rel="stylesheet" media="screen"/>
<link href="<?php echo base_url('templates/usuario/css/imprimir.css'); ?>" rel="stylesheet" media="print" />
<link href="<?php echo base_url('templates/usuario/css/font-awesome.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('templates/admin/css/plugins/dataTables/datatables.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('templates/usuario/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('templates/usuario/js/fabric.js'); ?>"></script>
<!-- web fonts --> 
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'> 
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript">
    if (window.location.hash && window.location.hash == '#_=_') {
        if (window.history && history.pushState) {
            window.history.pushState("", document.title, window.location.pathname);
        } else {
            var scroll = {
                top: document.body.scrollTop,
                left: document.body.scrollLeft
            };
            window.location.hash = '';
            document.body.scrollTop = scroll.top;
            document.body.scrollLeft = scroll.left;
        }
    }
</script>
</head> 
<body>
<!-- Teléfono -->
  <div class="telefono">
      <p>PARA DUDAS O INFORMACIÓN CONTACTANOS AL <span>(492) 127 40 24</span> Y AL <span>(492) 893 19 29</span></p>
  </div>
  <!-- Teléfono -->
<div class="header-backend">
  <div class="container">
    <div class="logo-cliente">
      <a href="<?php echo base_url('') ?>"><img src="<?php echo base_url('templates/usuario/images/logo.png'); ?>" alt=" " class="img-responsive" /></a>
    </div>
  </div>
</div> 
<div class="navigation menu_cliente">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Menú</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                  <li class="w3pages"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Personaliza <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url('personaliza') ?>">Nuevo Diseño</a></li>
                      <li><a href="<?php echo base_url('disenios_creados') ?>">Diseños Creados</a></li>    
                    </ul>
                  </li>
                  <li class="w3pages"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Comprar <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url('comprar_productos') ?>">Productos</a></li>
                      <li><a href="<?php echo base_url('comprar_disenios') ?>">Diseños</a></li>   
                    </ul>
                  </li>
                  <li class="w3pages"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Capacitación <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url('videos') ?>">Videotutoriales</a></li>
                      <li><a href="<?php echo base_url('manuales') ?>">Manuales</a></li>
                      <li><a href="<?php echo base_url('preguntas_frecuentes') ?>">Preguntas Frecuentes</a></li>
                      <li><a href="<?php echo base_url('capacitacion_presencial'); ?>">MILO</a></li>   
                    </ul>
                  </li>
                  <li class="w3pages"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cuenta <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url('perfil') ?>">Perfil</a></li>
                      <li><a href="<?php echo base_url('pagos_membresia') ?>">Membresía</a></li>
                      <li><a href="<?php echo base_url('ordenes_productos') ?>">Órdenes de Productos</a></li>
                      <li><a href="<?php echo base_url('disenio_especial') ?>">Diseño Especial</a></li> 
                      <li><a href="<?php echo base_url('cerrar_sesion') ?>" onclick="signOut();">Cerrar Sesión</a></li>    
                    </ul>
                  </li>
                  <li>
                      <div class="cuenta_triangulo"></div>
                      <a class="boton_compras" href="<?php echo base_url('carrito') ?>">Mi Carrito (<?php echo $this->session->userdata('carrito_cantidad'); ?>)<br><img src="<?php echo base_url('templates/usuario/images/cuenta.png'); ?>"/></a>
                  </li>
                </ul>
            </div>
        </nav>
    </div>
</div>