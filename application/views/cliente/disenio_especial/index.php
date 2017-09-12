<?php $this->load->view('cliente/header'); ?>
<link href="<?php echo base_url('templates/admin/css/plugins/jasny/jasny-bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('templates/admin/css/plugins/codemirror/codemirror.css'); ?>" rel="stylesheet">
<div class="titulo_cliente">
    <h1>Solicitar diseño especial<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
</div>

<?php if(isset($mensaje)){ ?>
<div class="tabla_vacia mensaje">
  <h4 class="centrar"><?php echo $mensaje; ?></h4>
</div>
<?php } ?>

<div class="enviar_mensaje">
	<div class="formulario">
		<form enctype="multipart/form-data" role="form" action="<?php echo base_url('disenio_especial_mensaje'); ?>" method="post">
			<div class="fileinput fileinput-new input-group" data-provides="fileinput">
			    <div class="form-control" data-trigger="fileinput">
			        <i class="glyphicon glyphicon-file fileinput-exists"></i>
			    <span class="fileinput-filename"></span>
			    </div>
			    <span class="input-group-addon btn btn-default btn-file">
			        <span class="fileinput-new">Seleccionar foto</span>
			        <span class="fileinput-exists">Cambiar</span>
			        <input type="file" accept=".jpg,.jpeg,.png" name="foto" required/>
			    </span>
			    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
			</div>
			<textarea name="descripcion" placeholder="Describe tu diseño..."></textarea>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</div>
</div>
<?php $this->load->view('cliente/footer'); ?>
<!-- Subir archivos -->
<script src="<?php echo base_url('templates/admin/js/plugins/jasny/jasny-bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('templates/admin/js/plugins/codemirror/codemirror.js'); ?>"></script>
<script src="<?php echo base_url('templates/admin/js/plugins/codemirror/mode/xml/xml.js'); ?>"></script>