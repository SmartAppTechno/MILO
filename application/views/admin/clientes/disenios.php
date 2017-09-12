<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Diseños del Cliente</h2>
		<h3>#<?php echo $cliente['id']; ?> <?php echo $cliente['nombre']; ?></h3>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover tabla-buscador" >
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Diseño</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($disenios as $disenio){
							echo '<tr>';
							echo '<td>' . $disenio['fecha'] . '</td>';
							echo '<td>' . $disenio['disenio'] . '</td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>