<?php $this->load->view('cliente/sitio_web/header'); ?>

<!-- Noticias -->
<div class="contenedor_noticias">
    <div class="foto" style="background: url(<?php echo base_url('templates/usuario/images/noticia_fondo.jpg'); ?>);">
        <h1>Noticias</h1>
    </div>
</div>
<div class="row noticias">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <?php foreach ($noticias as $noticia) { ?>
                <div class="col-md-4 contenedor-columna">
                    <div class="contenedor-foto-columna">
                        <img src="<?php echo base_url($noticia['portada']); ?>" width="100%" height="auto" />
                    </div> 
                    <div class="contenedor_noticia">
                        <h3 class="noticia-titulo"><?php echo $noticia['titulo']; ?><br><img src="<?php echo base_url('templates/usuario/images/noticia.png'); ?>"/></h3>
                        <div class="columna-texto"><?php 
                            $content = preg_replace("/<img[^>]+\>/i", "", $noticia['contenido']);
                            $des = substr($content, 0, 300);
                            echo html_entity_decode($des) . '...'; 
                        ?></div>
                        <form role="form" action="<?php echo base_url('noticia'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $noticia['id']; ; ?>">
                            <button type="submit" class="btn btn-primary">Leer Más</button>
                        </form>
                    </div>
                </div>
            <?php  } ?>
        </div>
    </div>
</div>
<!-- Noticias -->

<?php $this->load->view('cliente/sitio_web/footer'); ?>