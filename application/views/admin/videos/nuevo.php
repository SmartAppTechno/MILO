<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Nuevo Vídeo</h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<form role="form" action="<?php echo base_url('crear_video') ?>" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">ID del Vídeo</label>
				<div class="col-sm-10"><input type="text" name="video_id" class="form-control" required></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Categoría</label>
                <div class="col-sm-10">
                	<select class="form-control m-b" name="categoria" required>
                    <option value="">Selecciona la categoría</option>
                    <?php foreach ($categorias as $categoria) {
						echo '<option value="'. $categoria['id'] . '">'. $categoria['nombre'] .'</option>';
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