<?php $this->load->view('admin/header'); ?>
<?php echo $map['js']; ?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Editar Distribuidor</h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<form enctype="multipart/form-data" role="form" action="<?php echo base_url('guardar_distribuidor') ?>" method="post" class="form-horizontal">
			<input type="hidden" name="id" value="<?php echo $distribuidor['id']; ?>">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10"><input type="text" name="nombre" class="form-control" required value="<?php echo $distribuidor['nombre']; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Contacto</label>
				<div class="col-sm-10"><input type="text" name="contacto" class="form-control" required value="<?php echo $distribuidor['contacto']; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<?php echo $map['html']; ?>
				<input type="hidden" class="latitud" name="latitud" value="">
				<input type="hidden" class="longitud" name="longitud" value="">
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </div>
            
		</form>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>
<script>
function updatemapa(newLat, newLng){
	$('.latitud').val(newLat);
	$('.longitud').val(newLng);
}
</script>