<div class="contenedor_disenio">
	<ul class="nav nav-tabs">
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
			<li class="<?php if(!$a){echo 'active';$a = true;} ?>"><a data-toggle="tab" href="#<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></a></li>
		<?php 
				}
			} 
		?>
		<li><a data-toggle="tab" href="#disenios-comprados">Mis Diseños</a></li>
	</ul>
	<div class="contenedor_accion">
		<img src="<?php echo base_url('templates/usuario/images/cancelar.png'); ?>"/>
		<a class="accion" href="<?php echo base_url('cancelar_disenio'); ?>">Cancelar</a>
	</div>
</div>
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
						<?php if($disenio['membresia'] ==  $membresia || $disenio['membresia'] == 5){ ?>
							<label class="etiqueta">
						  		<input type="radio" name="disenio" value="<?php echo $disenio['id']; ?>" onclick="this.form.submit();" />
						  		<div>
						  			<img src="<?php echo base_url($disenio['url']); ?>" width="200" height="200" />
						  			<h4><?php echo $disenio['nombre']; ?></h4>
						  		</div>
							</label>
                        <?php }else{ ?>
                        	<img class="elemento-bloqueado" src="<?php echo base_url($disenio['url']); ?>" width="200" height="200" />
							<h4><?php echo $disenio['nombre']; ?></h4>
							<h5>Membresía <?php echo $disenio['nombre_membresia']; ?></h5>
							<p>Bloqueado</p>
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
	<div id="disenios-comprados" class="tab-pane fade">
		<div class="contenedor">
			<?php foreach ($disenios_comprados as $disenio) { ?>
				<div class="columna productos">
					<label class="etiqueta">
				  		<input type="radio" name="disenio" value="<?php echo $disenio['id']; ?>" onclick="this.form.submit();" />
				  		<div>
				  			<img src="<?php echo base_url($disenio['url']); ?>" width="200" height="200" />
				  			<h4><?php echo $disenio['nombre']; ?></h4>
				  		</div>
					</label>
				</div>
			<?php } ?>
			<?php foreach ($disenios_especiales as $disenio) { ?>
				<div class="columna productos">
					<label class="etiqueta">
				  		<input type="radio" name="disenio" value="<?php echo $disenio['id']; ?>" onclick="this.form.submit();" />
				  		<div>
				  			<img src="<?php echo base_url($disenio['url']); ?>" width="200" height="200" />
				  			<h4><?php echo $disenio['nombre']; ?></h4>
				  		</div>
					</label>
				</div>
			<?php } ?>
		</div>
	</div>
</div>