<div class="contenedor_accion right">
	<img src="<?php echo base_url('templates/usuario/images/cancelar.png'); ?>"/>
	<a class="accion" href="<?php echo base_url('cancelar_disenio'); ?>">Cancelar</a>
</div>
<div class="contenedor ocasiones">
	<?php foreach ($ocasiones as $ocasion) { ?>
		<div class="columna productos">
			<?php if($ocasion['membresia'] ==  $membresia){ ?>
				<label class="etiqueta">
			  		<input type="radio" name="ocasion" value="<?php echo $ocasion['id']; ?>" onclick="this.form.submit();" />
			  		<div>
			  			<img src="<?php echo base_url($ocasion['url']); ?>" width="200" height="200" />
			  			<h4><?php echo $ocasion['nombre']; ?></h4>
			  		</div>
				</label>
				
            <?php }else{ ?>
            	<img class="elemento-bloqueado" src="<?php echo base_url($ocasion['url']); ?>" width="200" height="200" />
				<h4><?php echo $ocasion['nombre']; ?></h4>
				<h5>Membresía <?php echo $ocasion['nombre_membresia']; ?></h5>
				<p>Bloqueado</p>
            <?php } ?>
		</div>
	<?php } ?>
</div>