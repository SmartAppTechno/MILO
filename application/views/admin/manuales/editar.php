<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Editar Manual</h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<form enctype="multipart/form-data" role="form" action="<?php echo base_url('guardar_manual') ?>" method="post" class="form-horizontal">
			<input type="hidden" name="id" value="<?php echo $manual['id']; ?>">
			<div class="form-group">
				<label class="col-sm-2 control-label">Título</label>
				<div class="col-sm-10"><input type="text" name="titulo" class="form-control" required value="<?php echo $manual['titulo']; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group documento">
				<iframe src="http://docs.google.com/viewer?url=<?php echo base_url($manual['url']); ?>&embedded=true" width="400" height="300"></iframe>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">PDF</label>
				<div class="col-sm-10">
					<div class="fileinput fileinput-new input-group" data-provides="fileinput">
					    <div class="form-control" data-trigger="fileinput">
					        <i class="glyphicon glyphicon-file fileinput-exists"></i>
					    <span class="fileinput-filename"></span>
					    </div>
					    <span class="input-group-addon btn btn-default btn-file">
					        <span class="fileinput-new">Seleccionar documento</span>
					        <span class="fileinput-exists">Cambiar</span>
					        <input type="file" accept=".pdf" name="documento"/>
					    </span>
					    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
					</div>
				</div> 
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Categoría</label>
                <div class="col-sm-10">
                	<select class="form-control m-b" name="categoria" required>
                    <option value="">Selecciona la categoría</option>
                    <?php foreach ($categorias as $categoria) {
						echo '<option ';
						if($manual['categoria'] == $categoria['id']) 
							echo 'selected="selected"';
						echo ' value="'. $categoria['id'] . '">'. $categoria['nombre'] .'</option>';
					} ?>
                </select>
                </div>
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