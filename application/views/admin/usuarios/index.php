<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Usuarios</h2>
		<form role="form" action="<?php echo base_url('nuevo_usuario'); ?>" method="post">
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
						<th>Correo</th>
						<th>Rol</th>
						<th>Usuario</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($usuarios as $usuario){
							echo '<tr>';
							echo '<td>' . $usuario['id'] . '</td>';
							echo '<td>' . $usuario['nombre'] . '</td>';
							echo '<td>' . $usuario['correo'] . '</td>';
							echo '<td>' . $usuario['rol'] . '</td>';
							echo '<td>' . $usuario['usuario'] . '</td>';
							echo '<td class="acciones"><form role="form" action="'.base_url('editar_usuario').'" method="post">
			                        <input type="hidden" name="id" value="'.$usuario['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-pencil"></i></button>
			                    </form>
			                    <form role="form" action="'.base_url('eliminar_usuario').'" method="post">
			                        <input type="hidden" name="id" value="'.$usuario['id'].'">
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