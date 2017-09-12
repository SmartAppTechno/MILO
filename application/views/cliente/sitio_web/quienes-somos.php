<?php $this->load->view('cliente/sitio_web/header'); ?>

<div class="nosotros">
    <div class="foto" style="background: url(<?php echo base_url($nosotros['portada']); ?>);">
        <h1><?php echo $nosotros['titulo']; ?></h1>
    </div>

    <div class="contenedor_contenido">
		<div class="contenido">
			<img src="<?php echo base_url('templates/usuario/images/nosotros.png'); ?>"/>
			<?php echo $nosotros['contenido']; ?>
		</div>
	</div>
</div>

<?php $this->load->view('cliente/sitio_web/footer'); ?>