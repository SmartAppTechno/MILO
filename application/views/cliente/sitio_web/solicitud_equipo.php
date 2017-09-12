<?php $this->load->view('cliente/sitio_web/header'); ?>

<div class="enviar_mensaje">
	<div class="formulario">
		<form role="form" action="<?php echo base_url('enviar_solicitud'); ?>" method="post">
			<div class="titulo_cliente">
			    <h1>Encuentra tu equipo ideal<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
			</div>
			<?php if(isset($mensaje)){ ?>
				<div class="tabla_vacia mensaje">
					<h4 class="centrar"><?php echo $mensaje; ?></h4>
				</div>
			<?php } ?>
			<div class="descripcion">
				<h5>Milo es tu fábrica de regalos personalizados, es un negocio problado, completo, rentable y a tu alcance.</h5>
				<h5>Queremos conocer un poco más de ti para ofrecerte un paquete de acuerdo a tus necesidades.</h5>
			</div>
			<input type="text" name="nombre" placeholder="Nombre" required="">
			<input type="text" name="telefono" placeholder="Teléfono" required="">
			<input type="text" name="correo" placeholder="Correo" required="">
			<input type="number" min="0" name="codigo_postal" placeholder="Código Postal" required="">
			<h5>¿Por que medio te gustaría que te contactemos?</h5>
			<fieldset>
				<div class="radio_grupo">
					<input type="radio" name="medio_contacto" value="Teléfono" id="1" required=""/>
					<label for="1">Teléfono</label>
					<input type="radio" name="medio_contacto" value="Correo" id="2" />
					<label for="2">Correo</label>
					<input type="radio" name="medio_contacto" value="Videollamada" id="3" />
					<label for="3">Videollamada</label>
					<input type="radio" name="medio_contacto" value="Presencial" id="4" />
					<label for="4">Presencial</label>
				</div>
			</fieldset>
			<div class="titulo_cliente">
			    <h1>Detalles del cliente<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
			</div>
			<h5>¿Actualmente cuentas con un establecimiento comercial?</h5>
			<fieldset>
				<div class="radio_grupo">
					<input type="radio" class="radio_si" name="establecimiento" value="1" id="1" required=""/>
					<label for="1">Sí</label>
					<input type="radio" class="radio_no" name="establecimiento" value="0" id="2" />
					<label for="2">No</label>
				</div>
			</fieldset>
			<div class="establecimiento">
				<input type="text" name="giro" placeholder="Giro">
				<input type="number" min="0" name="empleados" placeholder="Número de empleados">
				<input type="number" min="0" name="sucursales" placeholder="Cantidad de sucursales">
				<input type="text" name="temporada" placeholder="¿En que temporada tus ventas se incrementan?">
			</div>
			<textarea name="interes" placeholder="¿Porqué te interesa adquirir a Milo?" required=""></textarea>
			<textarea name="como_enteraste" placeholder="¿Cómo te enteraste de Milo?" required=""></textarea>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</div>
</div>

<?php $this->load->view('cliente/sitio_web/footer'); ?>
<script>
$(".radio_si").click(function () {
    $('.establecimiento').show();
});
$(".radio_no").click(function () {
    $('.establecimiento').hide();
});
</script>