<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Nueva Categoría de Vídeos</h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<form role="form" action="<?php echo base_url('crear_categoria_videos') ?>" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10"><input type="text" name="nombre" class="form-control" required></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Membresía</label>
                <div class="col-sm-10">
                	<select class="form-control m-b" name="membresia" required>
                    <option value="">Selecciona la membresía</option>
                    <?php foreach ($membresias as $membresia) {
						echo '<option value="'. $membresia['id'] . '">'. $membresia['nombre'] .'</option>';
					} ?>
                </select>
                </div>
            </div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">Crear</button>
                </div>
            </div>
		</form>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>