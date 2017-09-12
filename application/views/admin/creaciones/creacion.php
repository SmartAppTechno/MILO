<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Detalles de la Creación #<?php echo $creacion['id']; ?></h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<div class="row">
			<div class="col-md-6">
				<form role="form" action="" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">No. de Impresiones</label>
						<label class="col-sm-10 creacion-informacion"><?php echo $creacion['impresiones']; ?></label>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Fecha de Creación</label>
						<label class="col-sm-10 creacion-informacion"><?php echo $creacion['fecha']; ?></label>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Cliente</label>
						<label class="col-sm-10 creacion-informacion"><?php echo $creacion['cliente']; ?></label>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Producto</label>
						<label class="col-sm-10 creacion-informacion"><?php echo $creacion['producto']; ?></label>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Ocasión</label>
						<label class="col-sm-10 creacion-informacion"><?php echo $creacion['ocasion']; ?></label>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Diseño</label>
						<label class="col-sm-10 creacion-informacion"><?php echo $creacion['disenio']; ?></label>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Cristal</label>
						<label class="col-sm-10 creacion-informacion"><?php if($creacion['cristal'] == 0) echo 'No'; elseif ($creacion['cristal'] == 1) echo 'Sí'; ?></label>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Propia Impresora</label>
						<label class="col-sm-10 creacion-informacion"><?php if($creacion['propia_impresora'] == 0) echo 'No'; elseif ($creacion['propia_impresora'] == 1) echo 'Sí'; ?></label>
					</div>
				</form>
			</div>
			<div class="col-md-6 centrar">
				<img src="<?php echo base_url($creacion['foto']); ?>"/>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>