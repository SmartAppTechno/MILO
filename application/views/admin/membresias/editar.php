<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Editar Membresía</h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<form enctype="multipart/form-data" role="form" action="<?php echo base_url('guardar_membresia') ?>" method="post" class="form-horizontal">
			<input type="hidden" name="id" value="<?php echo $membresia['id']; ?>">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10"><input type="text" name="nombre" class="form-control" required value="<?php echo $membresia['nombre']; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Precio</label>
				<div class="col-sm-10"><input type="number" name="precio" class="form-control" required value="<?php echo $membresia['precio']; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Número de Impresiones</label>
				<div class="col-sm-10"><input type="number" name="impresiones" class="form-control" required value="<?php echo $membresia['impresiones']; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group foto">
				<img src="<?php echo base_url($membresia['foto']); ?>" width="90%" height="auto" />
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Foto</label>
				<div class="col-sm-10">
					<div class="fileinput fileinput-new input-group" data-provides="fileinput">
					    <div class="form-control" data-trigger="fileinput">
					        <i class="glyphicon glyphicon-file fileinput-exists"></i>
					    <span class="fileinput-filename"></span>
					    </div>
					    <span class="input-group-addon btn btn-default btn-file">
					        <span class="fileinput-new">Seleccionar foto</span>
					        <span class="fileinput-exists">Cambiar</span>
					        <input type="file" accept=".jpg,.jpeg,.png" name="foto"/>
					    </span>
					    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
					</div>
				</div> 
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Descrición General</label>
				<div class="col-sm-10"><textarea id="descripcion" name="descripcion" required><?php echo $membresia['descripcion']; ?></textarea></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Lista de Características</label>
				<div class="col-sm-10"><textarea id="lista" name="lista" required><?php echo $membresia['lista']; ?></textarea></div>
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
$(document).ready(function(){
    $('#descripcion').summernote({
    	height: 500
	});
	$('#lista').summernote({
    	height: 500
	});
});
</script>