<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
<head>
<title>Made in Love</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link rel="icon" type="image/png" href="<?php echo base_url('templates/admin/images/favicon.png'); ?>" />
<link href="<?php echo base_url('templates/usuario/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url('templates/usuario/css/style.css'); ?>" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'> 
</head>
<body>
    <!-- Área del Cliente -->
    <div class="modal fade" id="area-cliente" tabindex="-1" role="dialog" aria-labelledby="area-cliente"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row text-center sign-with">
                                <div class="col-md-12 titulo-inicio-sesion">
                                    <h3>Mi Cuenta</h3>
                                    <p>Regístrate o ingresa<br><img src="<?php echo base_url('templates/usuario/images/cuenta.png'); ?>"/></p>
                                </div>
                                <div class="col-md-12">
                                    <form role="form" action="<?php echo base_url('fblogin'); ?>" method="post">
                                        <button type="submit" class="btn facebook btn-primary">Iniciar Sesión con Facebook</button>
                                    </form>
                                    <form role="form" action="<?php echo base_url('google_login'); ?>" method="post">
                                        <button type="submit" class="btn google btn-primary">Iniciar Sesión con Google</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Área del Cliente -->
    <!-- Teléfono -->
    <div class="telefono">
        <p>PARA DUDAS O INFORMACIÓN CONTACTANOS AL <span>(492) 127 40 24</span> Y AL <span>(492) 893 19 29</span></p>
    </div>
    <!-- Teléfono -->
    <!-- Logo -->
    <div class="header">
        <div class="container">
            <div class="w3l_logo">
                <img src="<?php echo base_url('templates/usuario/images/logo.png'); ?>" class="img-responsive" />
            </div>  
        </div>
    </div>
    <!-- Logo -->
    <!-- Menú -->
    <?php
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $menu = 0;
        if (strpos($url,'quienes-somos') !== false) {
            $menu = 1;
        }
        if (strpos($url,'membresias') !== false) {
            $menu = 2;
        }
        if (strpos($url,'noticias') !== false) {
            $menu = 3;
        }
        if (strpos($url,'noticia') !== false) {
            $menu = 3;
        }
    ?>
    <div class="navigation">
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
                        <li><a <?php if($menu == 0) echo 'class="activo"'; ?> href="<?php echo base_url(); ?>">Inicio</a></li>  
                        <li><a <?php if($menu == 1) echo 'class="activo"'; ?> href="<?php echo base_url('quienes-somos'); ?>">¿Quiénes Somos?</a></li>
                        <li><a <?php if($menu == 2) echo 'class="activo"'; ?> href="<?php echo base_url('membresias'); ?>">Membresías</a></li>
                        <li><a <?php if($menu == 3) echo 'class="activo"'; ?> href="<?php echo base_url('noticias'); ?>">Noticias</a></li>
                        <?php if( !isset($usuario) ){ ?>
                            <li>
                                <div class="cuenta_triangulo"></div>
                                <a class="mi_cuenta" href="javascript:void(0)" data-toggle="modal" data-target="#area-cliente">Mi Cuenta <br><img src="<?php echo base_url('templates/usuario/images/cuenta.png'); ?>"/></a>
                            </li>
                        <?php }else{ ?>
                            <li>
                                <div class="cuenta_triangulo"></div>
                                <a class="mi_cuenta" href="<?php echo base_url('perfil'); ?>">Mi Cuenta <br><img src="<?php echo base_url('templates/usuario/images/cuenta.png'); ?>"/></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- Menú -->