<?php $this->load->view('cliente/header'); ?>
<div class="titulo_cliente">
    <h1>Manuales<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
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
					<?php foreach ($manuales as $manual) { ?>
						<?php if($categoria['id'] == $manual['categoria'] ){ ?>
						<div class="manuales">
							<img src="<?php echo base_url('templates/usuario/images/pdf.png'); ?>" width="50" />
							<h4>Manual</h4>
							<p class="titulo"><?php echo $manual['titulo']; ?></p>
							<a href="<?php echo base_url($manual['url']); ?>" target="_blank">Leer</a>
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