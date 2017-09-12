<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Made In Love</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('templates/admin/images/favicon.png'); ?>" />
    <link href="<?php echo base_url('templates/admin/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('templates/admin/css/animate.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('templates/admin/css/style.css'); ?>" rel="stylesheet">
</head>
<body class="login">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <img src="<?php echo base_url('templates/usuario/images/logo.png'); ?>" alt=" " class="img-responsive" />
            </div>
            <?php if(isset($mensaje)) echo '<div id="notificacion"><span id="error">' . $mensaje . '</span></div>'; ?>
            <form role="form" class="m-t" action="<?php echo base_url('iniciar_sesion'); ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="contrasenia" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Entrar</button>
            </form>
        </div>
    </div>
    <script src="<?php echo base_url('templates/admin/js/jquery-3.1.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('templates/admin/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('templates/usuario/js/inspect_page.js'); ?>"></script>
</body>
</html>