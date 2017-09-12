<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Detalles de la Solicitud #<?php echo $solicitud['id']; ?></h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<form role="form" action="" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre</label>
				<label class="col-sm-10 creacion-informacion"><?php echo $solicitud['nombre']; ?></label>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Teléfono</label>
				<label class="col-sm-10 creacion-informacion"><?php echo $solicitud['telefono']; ?></label>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Correo</label>
				<label class="col-sm-10 creacion-informacion"><?php echo $solicitud['correo']; ?></label>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Código Postal</label>
				<label class="col-sm-10 creacion-informacion"><?php echo $solicitud['codigo_postal']; ?></label>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Medio de contacto</label>
				<label class="col-sm-10 creacion-informacion"><?php echo $solicitud['medio_contacto']; ?></label>
			</div>
			<?php if($solicitud['establecimiento'] == 1){ ?>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Giro</label>
				<label class="col-sm-10 creacion-informacion"><?php echo $solicitud['giro']; ?></label>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">No. de Empleados</label>
				<label class="col-sm-10 creacion-informacion"><?php echo $solicitud['empleados']; ?></label>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">No. de Sucursales</label>
				<label class="col-sm-10 creacion-informacion"><?php echo $solicitud['sucursales']; ?></label>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">¿En que temporada tus ventas se incrementan?</label>
				<label class="col-sm-10 creacion-informacion"><?php echo $solicitud['temporada']; ?></label>
			</div>
			<?php } ?>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">¿Porqué te interesa adquirir a Milo?</label>
				<label class="col-sm-10 creacion-informacion"><?php echo $solicitud['interes']; ?></label>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">¿Cómo te enteraste de Milo?</label>
				<label class="col-sm-10 creacion-informacion"><?php echo $solicitud['como_enteraste']; ?></label>
			</div>
		</form>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>