<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Nuevo Diseño</h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<form enctype="multipart/form-data" role="form" action="<?php echo base_url('crear_disenio') ?>" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10"><input type="text" name="nombre" class="form-control" required></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Precio</label>
				<div class="col-sm-10"><input type="number" name="precio" class="form-control" required></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Descripción</label>
				<div class="col-sm-10"><input type="text" name="descripcion" class="form-control" required></div>
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
					        <input type="file" accept=".jpg,.jpeg,.png" name="foto" required/>
					    </span>
					    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
					</div>
				</div> 
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
					        <input type="file" accept=".jpg,.jpeg,.png" name="foto_impresion" required/>
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
						echo '<option value="'. $categoria['id'] . '">'. $categoria['nombre'] .'</option>';
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
						echo '<option value="'. $producto['id'] . '">'. $producto['nombre'] .'</option>';
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
						echo '<option value="'. $ocasion['id'] . '">'. $ocasion['nombre'] .'</option>';
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
						echo '<option value="'. $membresia['id'] . '">'. $membresia['nombre'] .'</option>';
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
						echo '<option value="'. $cliente['id'] . '">'. $cliente['nombre'] .'</option>';
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