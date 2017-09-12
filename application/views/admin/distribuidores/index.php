<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Distribuidores</h2>
		<form role="form" action="<?php echo base_url('nuevo_distribuidor'); ?>" method="post">
            <button type="submit" class="btn btn-w-m btn-primary">Nuevo</button>
        </form>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover tabla-buscador" >
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Contacto</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($distribuidores as $distribuidor){
							echo '<tr>';
							echo '<td>' . $distribuidor['id'] . '</td>';
							echo '<td>' . $distribuidor['nombre'] . '</td>';
							echo '<td>' . $distribuidor['contacto'] . '</td>';
							echo '<td class="acciones"><form role="form" action="'.base_url('editar_distribuidor').'" method="post">
			                        <input type="hidden" name="id" value="'.$distribuidor['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-pencil"></i></button>
			                    </form>
			                    <form role="form" action="'.base_url('eliminar_distribuidor').'" method="post">
			                        <input type="hidden" name="id" value="'.$distribuidor['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-trash"></i></button>
			                    </form></td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>