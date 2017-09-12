<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Solicitudes de Diseños Especiales</h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover tabla-buscador" >
				<thead>
					<tr>
						<th>ID</th>
						<th>Foto</th>
						<th>Cliente</th>
						<th>Descripción</th>
						<th>Fecha</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($disenios as $disenio){
							echo '<tr>';
							echo '<td>' . $disenio['id'] . '</td>';
							echo '<td><img src="' . base_url($disenio['foto']) . '" width="50" height="50" /></td>';
							echo '<td>' . $disenio['cliente'] . '</td>';
							echo '<td>' . $disenio['descripcion'] . '</td>';
							echo '<td>' . $disenio['fecha'] . '</td>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>