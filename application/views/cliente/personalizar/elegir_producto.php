<ul class="nav nav-tabs">
	<?php 
		$a = false;
		foreach ($categorias as $categoria) { ?>
		<li class="<?php if(!$a){echo 'active';$a = true;} ?>"><a data-toggle="tab" href="#<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></a></li>
	<?php } ?>
</ul>
<div class="tab-content">
	<?php 
		$a = false;
		foreach ($categorias as $categoria) { ?>
		<div id="<?php echo $categoria['id']; ?>" class="tab-pane fade <?php if(!$a){echo 'in active';$a = true;} ?>">
			<div class="contenedor">
				<?php foreach ($productos as $producto) { ?>
					<?php if($categoria['id'] == $producto['categoria'] ){ ?>
					<div class="columna productos">
						<?php if($producto['membresia'] ==  $membresia){ ?>
							<label class="etiqueta">
						  		<input type="radio" name="producto" value="<?php echo $producto['id']; ?>" onclick="this.form.submit();" />
						  		<div>
						  			<img src="<?php echo base_url($producto['url']); ?>" width="200" height="200" />
									<h4><?php echo $producto['nombre']; ?></h4>
								</div>
							</label>
                        <?php }else{ ?>
                        	<img class="elemento-bloqueado" src="<?php echo base_url($producto['url']); ?>" width="200" height="200" />
							<h4><?php echo $producto['nombre']; ?></h4>
							<h5>Membresía <?php echo $producto['nombre_membresia']; ?></h5>
							<p>Bloqueado</p>
                        <?php } ?>
					</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
</div>