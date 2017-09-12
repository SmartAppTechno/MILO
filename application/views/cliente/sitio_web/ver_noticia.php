<?php $this->load->view('cliente/sitio_web/header'); ?>

<div class="noticia">
	<div class="foto" style="background: url(<?php echo base_url($noticia['portada']); ?>);"></div>
	<div class="contenedor_contenido">
		<h2 class="titulo"><?php echo $noticia['titulo']; ?><br><img src="<?php echo base_url('templates/usuario/images/noticia_titulo.png'); ?>"/></h2>
		<div class="contenido">
			<?php echo $noticia['contenido']; ?>
		</div>
	</div>
</div>

<?php $this->load->view('cliente/sitio_web/footer'); ?>