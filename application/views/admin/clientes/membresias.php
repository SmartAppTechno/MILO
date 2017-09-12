<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Membresías del Cliente</h2>
		<h3>#<?php echo $cliente['id']; ?> <?php echo $cliente['nombre']; ?></h3>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover tabla-buscador" >
				<thead>
					<tr>
						<th>Membresía</th>
						<th>Fecha de Inicio</th>
						<th>Fecha de Fin</th>
						<th>Total</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($membresias as $membresia){
							echo '<tr>';
							echo '<td>' . $membresia['membresia'] . '</td>';
							echo '<td>' . $membresia['inicio'] . '</td>';
							echo '<td>' . $membresia['fin'] . '</td>';
							echo '<td>$ ' . number_format((float)$membresia['total'], 2, '.', ',') . '</td>';
							if( $membresia['status'] == 0 )
				              echo '<td>Pendiente</td>';
				            if( $membresia['status'] == 1 )
				              echo '<td>Pagado</td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>