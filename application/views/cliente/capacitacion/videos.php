<?php $this->load->view('cliente/header'); ?>
<div class="titulo_cliente">
    <h1>Videotutoriales<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
</div>
<ul class="capacitacion_categorias nav nav-tabs">
	<?php 
		$a = false;
		foreach ($categorias as $categoria) { ?>
		<li class="<?php if(!$a){echo 'active';$a = true;} ?>"><a data-toggle="tab" href="#<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></a></li>
	<?php } ?>
</ul>
<div class="tab-content">
	<?php 
		foreach ($categorias as $categoria) { ?>
		<?php if($categoria['membresia'] == $membresia ){ ?>
			<div id="<?php echo $categoria['id']; ?>" class="tab-pane fade">
				<div class="contenedor">
					<?php foreach ($videos as $video) { ?>
						<?php if($categoria['id'] == $video['categoria'] ){ ?>
						<div class="columna">
							<iframe class="iframe-video" width="356" height="200" src="https://www.youtube.com/embed/<?php echo $video['video_id']; ?>" frameborder="0" allowfullscreen></iframe>
						</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		<?php }else{ ?>
			<div id="<?php echo $categoria['id']; ?>" class="tab-pane fade <?php if($categoria['id'] == 1) echo 'in active'; ?>">
				<div class="tabla_vacia">
					<h4 class="centrar">Lo sentimos, es necesario que actualices tu membresía para ver este contenido.</h4>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
</div>
<?php $this->load->view('cliente/footer'); ?>