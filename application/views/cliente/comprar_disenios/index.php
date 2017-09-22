<?php $this->load->view('cliente/header'); ?>
<div class="titulo_cliente">
    <h1>Comprar diseños<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
</div>

<div class="buscador">
	<form role="form" action="<?php echo base_url('buscar_disenios') ?>" method="post">
		<div class="fila">
			<input type="text" name="buscar_disenio" placeholder="Buscar..."/>
			<button type="submit"><img src="<?php echo base_url('templates/usuario/images/buscar.png'); ?>"/></button>
		</div>
	</form>
</div>

<div class="contenedor-boton disenio_especial_boton">
  <a class="boton" href="<?php echo base_url('disenio_especial'); ?>"><img src="<?php echo base_url('templates/usuario/images/disenio_especial.png'); ?>"/> <span>Solicitar Diseño Especial</span></a>
</div>

<?php if(isset($mensaje)){ ?>
<div class="tabla_vacia mensaje">
	<h4 class="centrar"><?php echo $mensaje; ?></h4>
</div>
<?php } ?>

<?php if(count($disenios)>0){ ?>
<ul class="comprar_categorias nav nav-tabs">
	<?php
		foreach ($disenios as $key=>$disenio){
			foreach ($disenios_comprados as $llave=>$aux){
				if($disenio['id'] == $aux['id'])
					unset($disenios[$key]);
			}
		}
		$a = false;
		foreach ($categorias as $categoria) {
			$contador = 0;
			foreach ($disenios as $disenio){
				if($categoria['id'] == $disenio['categoria'] )
					$contador++;
			}
			if($contador>0){
	?>
		<li class="<?php if(!$a){echo 'active';$a = true;} ?>"><a data-toggle="tab" href="#<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></a></li>
	<?php 
			}
		} 
	?>
</ul>
<div class="tab-content">
	<?php 
		$a = false;
		foreach ($categorias as $categoria) {
			$contador = 0;
			foreach ($disenios as $disenio){
				if($categoria['id'] == $disenio['categoria'] )
					$contador++;
			}
			if($contador>0){
	?>
		<div id="<?php echo $categoria['id']; ?>" class="tab-pane fade <?php if(!$a){echo 'in active';$a = true;} ?>">
			<div class="contenedor">
				<?php foreach ($disenios as $disenio) { ?>
					<?php if($categoria['id'] == $disenio['categoria'] ){ ?>
					<div class="columna productos">
						<img src="<?php echo base_url($disenio['url']); ?>" width="200" height="200" />
						<h4><?php echo $disenio['nombre']; ?></h4>
						<?php if($disenio['id'] != 11 && $disenio['id'] != 12 && $disenio['id'] != 13){ ?>
							<p class="uso">Diseñado para <?php echo $disenio['producto']; ?></p>
						<?php } ?>
						<h3>$ <?php echo number_format((float)$disenio['precio'], 2, '.', ','); ?></h3>
						<?php if($disenio['membresia'] ==  $membresia){ ?>
							<div class="formulario">
								<form role="form" action="<?php echo base_url('agregar_disenio') ?>" method="post">
									<input type="hidden" name="id" value="<?php echo $disenio['id']; ?>">
									<input type="hidden" name="foto" value="<?php echo $disenio['url']; ?>">
									<input type="hidden" name="nombre" value="<?php echo $disenio['nombre']; ?>">
									<input type="hidden" name="precio" value="<?php echo $disenio['precio']; ?>">
									<?php if($disenio['id'] != 11 && $disenio['id'] != 12 && $disenio['id'] != 13){ ?>
										<input type="hidden" name="tipo" value="disenios">
									<?php } ?>
									<?php if($disenio['id'] == 11 || $disenio['id'] ==12 || $disenio['id'] == 13){ ?>
										<input type="hidden" name="tipo" value="impresiones">
									<?php } ?>
									<button type="submit" name="agregar_carro"><img src="<?php echo base_url('templates/usuario/images/compras.png'); ?>"/> <span>Agregar al carrito</span></button>
							 	</form>
							</div>
                        <?php }else{ ?>
	                        <p class="membresia">Membresía <?php echo $disenio['nombre_membresia']; ?></p>	
                        <?php } ?>
					</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	<?php 
			}
		} 
	?>
</div>
<?php } ?>
<?php $this->load->view('cliente/footer'); ?>