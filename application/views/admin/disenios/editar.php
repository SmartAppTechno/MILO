<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Editar Diseño</h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<form enctype="multipart/form-data" role="form" action="<?php echo base_url('guardar_disenio') ?>" method="post" class="form-horizontal">
			<input type="hidden" name="id" value="<?php echo $disenio['id']; ?>">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10"><input type="text" name="nombre" class="form-control" required value="<?php echo $disenio['nombre']; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Precio</label>
				<div class="col-sm-10"><input type="number" name="precio" class="form-control" required value="<?php echo $disenio['precio']; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Descripción</label>
				<div class="col-sm-10"><input type="text" name="descripcion" class="form-control" required value="<?php echo $disenio['descripcion']; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group foto">
				<img src="<?php echo base_url($disenio['foto']); ?>" width="90%" height="auto" />
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Foto con Marca de Agua</label>
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
			<div class="form-group foto">
				<img src="<?php echo base_url($disenio['foto_impresion']); ?>" width="90%" height="auto" />
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Foto para Impresión</label>
				<div class="col-sm-10">
					<div class="fileinput fileinput-new input-group" data-provides="fileinput">
					    <div class="form-control" data-trigger="fileinput">
					        <i class="glyphicon glyphicon-file fileinput-exists"></i>
					    <span class="fileinput-filename"></span>
					    </div>
					    <span class="input-group-addon btn btn-default btn-file">
					        <span class="fileinput-new">Seleccionar foto</span>
					        <span class="fileinput-exists">Cambiar</span>
					        <input type="file" accept=".jpg,.jpeg,.png" name="foto_impresion"/>
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
						if($disenio['categoria'] == $categoria['id']) 
							echo 'selected="selected"';
						echo ' value="'. $categoria['id'] . '">'. $categoria['nombre'] .'</option>';
					} ?>
                </select>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Producto</label>
                <div class="col-sm-10">
                	<select class="form-control m-b" name="producto" required>
                    <option value="">Selecciona el producto</option>
                    <?php foreach ($productos as $producto) {
						echo '<option ';
						if($disenio['producto'] == $producto['id']) 
							echo 'selected="selected"';
						echo ' value="'. $producto['id'] . '">'. $producto['nombre'] .'</option>';
					} ?>
                </select>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Ocasión</label>
                <div class="col-sm-10">
                	<select class="form-control m-b" name="ocasion" required>
                    <option value="">Selecciona la ocasión</option>
                    <?php foreach ($ocasiones as $ocasion) {
						echo '<option ';
						if($disenio['ocasion'] == $ocasion['id']) 
							echo 'selected="selected"';
						echo ' value="'. $ocasion['id'] . '">'. $ocasion['nombre'] .'</option>';
					} ?>
                </select>
                </div>
            </div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Membresía</label>
                <div class="col-sm-10">
                	<select class="form-control m-b" name="membresia" required>
                    <option value="">Selecciona la membresía</option>
                    <?php foreach ($membresias as $membresia) {
						echo '<option ';
						if($disenio['membresia'] == $membresia['id']) 
							echo 'selected="selected"';
						echo ' value="'. $membresia['id'] . '">'. $membresia['nombre'] .'</option>';
					} ?>
                </select>
                </div>
            </div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Cliente</label>
                <div class="col-sm-10">
                	<select class="form-control m-b" name="cliente" required>
                    <option value="">Selecciona el cliente</option>
                    <option value="0">Todos</option>
                    <?php foreach ($clientes as $cliente) {
						echo '<option ';
						if($disenio['cliente'] == $cliente['id']) 
							echo 'selected="selected"';
						echo ' value="'. $cliente['id'] . '">'. $cliente['nombre'] .'</option>';
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