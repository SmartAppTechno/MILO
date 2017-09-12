<?php $this->load->view('cliente/header'); ?>

<div class="contenedor_presencial">
    <div class="foto" style="background: url(<?php echo base_url('templates/usuario/images/presencial.jpg'); ?>);">
    	<h1><?php echo $presencial['titulo']; ?></h1>
    </div>

    <div class="contenedor_contenido">
		<div class="contenido">
			<?php echo $presencial['contenido']; ?>
		</div>
	</div>
</div>

<?php $this->load->view('cliente/footer'); ?>