<?php $this->load->view('cliente/sitio_web/header'); ?>

<div class="contenedor_membresias">    
    <div class="foto" style="background: url(<?php echo base_url('templates/usuario/images/membresias.jpg'); ?>);">
        <h1>Membresías</h1>
    </div>
    <form id="solicitud_equipo" role="form" action="<?php echo base_url('solicitud_equipo'); ?>" method="post">
        <button type="submit" class="btn btn-primary">Encuentra tu equipo ideal</button>
    </form>
    <div class="row noticias">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
            <?php foreach($membresias as $membresia){ ?>
                <div class="col-md-4 contenedor-columna">
                    <div class="contenedor-foto-columna">
                        <img src="<?php echo base_url($membresia['foto']); ?>" width="100%" height="auto" />
                    </div>
                    <div class="contenedor_membresia">
                        <h3 class="titulo_membresia"><?php echo $membresia['nombre']; ?><br><img src="<?php echo base_url('templates/usuario/images/noticia.png'); ?>"/></h3>
                        <?php echo $membresia['lista']; ?>
                        <div class="precio">
                            <p>$<?php echo number_format($membresia['precio'], 2, '.', ',');; ?></p>
                            <?php echo $membresia['paypal']; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('cliente/sitio_web/footer'); ?>