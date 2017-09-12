<?php $this->load->view('cliente/header'); ?>
<div class="titulo_cliente">
    <h1>Comprar productos<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
</div>

<div class="buscador">
	<form role="form" action="<?php echo base_url('buscar_productos') ?>" method="post">
		<div class="fila">
			<input type="text" name="buscar_productos" placeholder="Buscar..."/>
			<button type="submit"><img src="<?php echo base_url('templates/usuario/images/buscar.png'); ?>"/></button>
		</div>
	</form>
</div>

<?php if(isset($mensaje)){ ?>
<div class="tabla_vacia mensaje">
	<h4 class="centrar"><?php echo $mensaje; ?></h4>
</div>
<?php } ?>

<?php if(count($productos)>0){ ?>
<ul class="comprar_categorias nav nav-tabs">
	<?php 
		$a = false;
		foreach ($categorias as $categoria) {
			$contador = 0;
			foreach ($productos as $producto){
				if($categoria['id'] == $producto['categoria'] )
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
			foreach ($productos as $producto){
				if($categoria['id'] == $producto['categoria'] )
					$contador++;
			}
			if($contador>0){
	?>
		<div id="<?php echo $categoria['id']; ?>" class="tab-pane fade <?php if(!$a){echo 'in active';$a = true;} ?>">
			<div class="contenedor">
				<?php foreach ($productos as $producto) { ?>
					<?php if($categoria['id'] == $producto['categoria'] ){ ?>
					<div class="columna productos">
						<img src="<?php echo base_url($producto['url']); ?>" width="200" height="200" />
						<h4><?php echo $producto['nombre']; ?></h4>
						<h3>$ <?php echo number_format((float)$producto['precio'], 2, '.', ','); ?></h3>
						<?php if($producto['membresia'] ==  $membresia){ ?>
							<div class="formulario">
								<form role="form" action="<?php echo base_url('agregar_producto') ?>" method="post">
									<input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
									<input type="hidden" name="foto" value="<?php echo $producto['url']; ?>">
									<input type="hidden" name="nombre" value="<?php echo $producto['nombre']; ?>">
									<input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
									<input type="hidden" name="tipo" value="productos">
									<button type="submit" name="agregar_carro"><img src="<?php echo base_url('templates/usuario/images/compras.png'); ?>"/> <span>Agregar al carrito</span></button>
							 	</form>
							</div>
                        <?php }else{ ?>
                        	<p class="membresia">Membresía <?php echo $producto['nombre_membresia']; ?></p>	
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