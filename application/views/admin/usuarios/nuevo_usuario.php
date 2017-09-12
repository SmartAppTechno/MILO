<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Nuevo Usuario</h2>
	</div>
</div>

<div class="wrapper-content">
	<?php if(isset($mensaje)) echo '<div id="notificacion"><span id="error">' . $mensaje . '</span></div>'; ?>
	<div class="ibox-content">
		<form role="form" action="<?php echo base_url('crear_usuario') ?>" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10"><input type="text" name="nombre" class="form-control" required value="<?php if(isset($nombre)) echo $nombre; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Correo</label>
				<div class="col-sm-10"><input type="email" name="correo" class="form-control" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" required value="<?php if(isset($correo)) echo $correo; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Usuario</label>
				<div class="col-sm-10"><input type="text" name="usuario" class="form-control" required value="<?php if(isset($usuario)) echo $usuario; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Contraseña</label>
				<div class="col-sm-10"><input type="password" name="contrasenia" class="form-control" required value="<?php if(isset($contrasenia)) echo $contrasenia; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Rol</label>
                <div class="col-sm-10">
                	<select class="form-control m-b" name="rol" required>
	                    <option value="">Selecciona el rol</option>
	                    <?php foreach ($roles as $rol) {
							echo '<option ';
							if(isset($rol_select)){
								if($rol_select == $rol['id']) 
									echo 'selected="selected"';
							}
							echo ' value="'. $rol['id'] . '">'. $rol['nombre'] .'</option>';
						} ?>
                	</select>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            	<div class="form-group">
            		<label class="col-sm-2 control-label">Permisos</label>
                    <div class="col-sm-10">
                    	<?php foreach ($menus as $key=>$menu) { ?>
                    		<div class="i-checks"><label><input type="checkbox" <?php if(isset($permisos)) if (in_array($key+1, $permisos)) echo 'checked=""'; ?> name="permisos[]" value="<?php echo $menu['id']; ?>"><i></i> <?php echo $menu['nombre']; ?></label></div>
                    	<?php } ?>
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
<script>
$(document).ready(function () {
	$('.i-checks').iCheck({
		checkboxClass: 'icheckbox_square-green',
	});
});
</script>