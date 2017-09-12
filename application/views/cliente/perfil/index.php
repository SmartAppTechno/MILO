<?php $this->load->view('cliente/header'); ?>
<div class="perfil">
	<div class="info">
		<div class="contenedor_contenido">
			<div class="contenido">
				<div class="foto">
					<img src="<?php echo $foto; ?>" />
				</div>
				<div class="usuario">
					<h4 class="nombre"><?php echo $nombre; ?></h4>
					<p class="nombre">Nombre<br><img src="<?php echo base_url('templates/usuario/images/noticia.png'); ?>"/></p>
					<h4 class="correo"><?php echo $email; ?></h4>
					<p class="correo">Correo</p>
				</div>
			</div>
		</div>
		<div class="nota">
			<p><strong>Nota:</strong> El correo con el que te has registrado debe ser el mismo que uses en tu cuenta de PayPal.</p>
		</div>
	</div>
	<div class="direccion">
		<h3>Mis Datos<br><img src="<?php echo base_url('templates/usuario/images/noticia.png'); ?>"/></h3>
		<div class="formulario">
			<form role="form" action="<?php echo base_url('guardar_direccion') ?>" method="post">
				<div class="fila">
					<input type="text" name="calle" placeholder="Calle" value="<?php echo $direccion[0]['calle']; ?>"/>
					<input type="text" name="numero" placeholder="Número" value="<?php echo $direccion[0]['numero']; ?>"/>
				</div>
				<div class="fila">
					<input type="text" name="colonia" placeholder="Colonia" value="<?php echo $direccion[0]['colonia']; ?>"/>
					<input type="text" name="postal" placeholder="Código Postal" value="<?php echo $direccion[0]['codigo_postal']; ?>"/>
				</div>
				<div class="fila">
					<input type="text" name="estado" placeholder="Estado" value="<?php echo $direccion[0]['estado']; ?>"/>
					<select name="pais">
						<option value="">Selecciona el país</option>
						<?php
							foreach ($paises as $pais) {
								echo '<option ';
								if($direccion[0]['pais'] == $pais['id']) 
									echo 'selected="selected"';
								echo ' value="'. $pais['id'] . '">'. $pais['nombre'] .'</option>';
							}
						?>
					</select>
				</div>
				<input type="submit" name="direccion" value="Actualizar">
			</form>
	    </div>
	</div>
</div>
<?php $this->load->view('cliente/footer'); ?>