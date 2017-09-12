<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Solicitudes de Membresías</h2>
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
						<th>Teléfono</th>
						<th>Correo</th>
						<th>Medio de Contacto</th>
						<th>¿Tiene establecimiento?</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($solicitudes as $solicitud){
							echo '<tr>';
							echo '<td>' . $solicitud['id'] . '</td>';
							echo '<td>' . $solicitud['nombre'] . '</td>';
							echo '<td>' . $solicitud['telefono'] . '</td>';
							echo '<td>' . $solicitud['correo'] . '</td>';
							echo '<td>' . $solicitud['medio_contacto'] . '</td>';
							if($solicitud['establecimiento'] == 0){
								echo '<td><i class="fa fa-window-close"></i></td>';
							}
							if($solicitud['establecimiento'] == 1){
								echo '<td><i class="fa fa-check-square"></i></td>';
							}
							echo '<td class="acciones"><form role="form" action="'.base_url('ver_solicitud').'" method="post">
			                        <input type="hidden" name="id" value="'.$solicitud['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-eye"></i></button>
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