<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Made In Love</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('templates/admin/images/favicon.png'); ?>" />
    <link href="<?php echo base_url('templates/admin/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('templates/admin/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('templates/admin/css/animate.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('templates/admin/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('templates/admin/css/plugins/dataTables/datatables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('templates/admin/css/plugins/c3/c3.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('templates/admin/css/plugins/summernote/summernote.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('templates/admin/css/plugins/summernote/summernote-bs3.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('templates/admin/css/plugins/jasny/jasny-bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('templates/admin/css/plugins/codemirror/codemirror.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('templates/admin/css/plugins/iCheck/custom.css'); ?>" rel="stylesheet">   
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $nombre_usuario; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $rol_usuario; ?></span> </span> </a>
                        </div>
                        <div class="logo-element">
                            MILO
                        </div>
                    </li>
                    <?php
                        //Permisos
                        $permisos = $this->session->userdata('usuario_permisos');
                    ?>
                    <li style="<?php if($permisos[1] == 0) echo 'display:none;'; ?>">
                        <a href="<?php echo base_url('panel'); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Panel</span></a>
                    </li>
                    <li style="<?php if($permisos[2] == 0) echo 'display:none;'; ?>">
                        <a href="javascript:void(0);"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Productos</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url('productos'); ?>">Productos</a></li>
                            <li><a href="<?php echo base_url('categorias_productos'); ?>">Categorías</a></li>
                        </ul>
                    </li>
                    <li style="<?php if($permisos[3] == 0) echo 'display:none;'; ?>">
                        <a href="javascript:void(0);"><i class="fa fa-truck"></i> <span class="nav-label">Distribuidores</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url('distribuidores'); ?>">Distribuidores</a></li>
                        </ul>
                    </li>
                    <li style="<?php if($permisos[4] == 0) echo 'display:none;'; ?>">
                        <a href="javascript:void(0);"><i class="fa fa-picture-o"></i> <span class="nav-label">Diseños</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url('disenios'); ?>">Diseños</a></li>
                            <li><a href="<?php echo base_url('administrar_disenio_especial'); ?>">Diseños Especiales</a></li>
                            <li><a href="<?php echo base_url('categorias_disenios'); ?>">Categorías</a></li>
                            <li><a href="<?php echo base_url('solicitud_disenio_especial'); ?>">Solicitudes de Diseños Especiales</a></li>
                        </ul>
                    </li>
                    <li style="<?php if($permisos[5] == 0) echo 'display:none;'; ?>">
                        <a href="<?php echo base_url('ocasiones'); ?>"><i class="fa fa-calendar"></i> <span class="nav-label">Ocasiones</span></a>
                    </li>
                    <li style="<?php if($permisos[6] == 0) echo 'display:none;'; ?>">
                        <a href="<?php echo base_url('clientes'); ?>"><i class="fa fa-users"></i> <span class="nav-label">Clientes</span></a>
                    </li>
                    <li style="<?php if($permisos[7] == 0) echo 'display:none;'; ?>">
                        <a href="<?php echo base_url('creaciones'); ?>"><i class="fa fa-lightbulb-o"></i> <span class="nav-label">Log de Creaciones</span></a>
                    </li>
                    <li style="<?php if($permisos[8] == 0) echo 'display:none;'; ?>">
                        <a href="<?php echo base_url('ordenes'); ?>"><i class="fa fa-files-o"></i> <span class="nav-label">Órdenes</span></a>
                    </li>
                    <li style="<?php if($permisos[9] == 0) echo 'display:none;'; ?>">
                        <a href="javascript:void(0);"><i class="fa fa-id-card-o"></i> <span class="nav-label">Membresías</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url('administrar_membresias'); ?>">Membresías</a></li>
                            <li><a href="<?php echo base_url('pagos_membresias'); ?>">Historial de Pagos</a></li>
                            <li><a href="<?php echo base_url('solicitudes_membresia'); ?>">Solicitudes</a></li>
                        </ul>
                    </li>
                    <li style="<?php if($permisos[10] == 0) echo 'display:none;'; ?>">
                        <a href="javascript:void(0);"><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Manuales</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url('administrar_manuales'); ?>">Manuales</a></li>
                            <li><a href="<?php echo base_url('categorias_manuales'); ?>">Categorías</a></li>
                        </ul>
                    </li>
                    <li style="<?php if($permisos[11] == 0) echo 'display:none;'; ?>">
                        <a href="<?php echo base_url('preguntas'); ?>"><i class="fa fa-question-circle"></i> <span class="nav-label">Preguntas Frecuentes</span></a>
                    </li>
                    <li style="<?php if($permisos[12] == 0) echo 'display:none;'; ?>"><a href="<?php echo base_url('presencial'); ?>"><i class="fa fa-handshake-o"></i> <span class="nav-label">MILO</span></a></li>
                    <li style="<?php if($permisos[13] == 0) echo 'display:none;'; ?>">
                        <a href="javascript:void(0);"><i class="fa fa-youtube-play"></i> <span class="nav-label">Vídeos</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url('administrar_videos'); ?>">Vídeos</a></li>
                            <li><a href="<?php echo base_url('categorias_videos'); ?>">Categorías</a></li>
                        </ul>
                    </li>
                    <li style="<?php if($permisos[14] == 0) echo 'display:none;'; ?>">
                        <a href="javascript:void(0);"><i class="fa fa-desktop"></i> <span class="nav-label">Sitio Web</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url('slider_principal'); ?>">Slider Principal</a></li>
                            <li><a href="<?php echo base_url('slider_promociones'); ?>">Slider de Promociones</a></li>
                            <li><a href="<?php echo base_url('videos_pagina'); ?>">Vídeos</a></li>
                            <li><a href="<?php echo base_url('administrar_noticias'); ?>">Noticias</a></li>
                            <li><a href="<?php echo base_url('nosotros'); ?>">¿Quiénes Somos?</a></li>
                        </ul>
                    </li>
                    <li style="<?php if($permisos[15] == 0) echo 'display:none;'; ?>">
                        <a href="<?php echo base_url('usuarios'); ?>"><i class="fa fa-users"></i> <span class="nav-label">Usuarios</span></a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="<?php echo base_url('salir'); ?>">
                                <i class="fa fa-sign-out"></i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>