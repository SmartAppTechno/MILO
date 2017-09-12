<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Órdenes del Cliente</h2>
		<h3>#<?php echo $cliente['id']; ?> <?php echo $cliente['nombre']; ?></h3>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover tabla-buscador" >
				<thead>
					<tr>
						<th>ID</th>
						<th>Fecha</th>
						<th>Total</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($ordenes as $orden){
							echo '<tr>';
							echo '<td>' . $orden['id'] . '</td>';
							echo '<td>' . $orden['fecha'] . '</td>';
							echo '<td>$ ' . number_format((float)$orden['total'], 2, '.', ',') . '</td>';
							echo '<td>';
		                    foreach ($estados as $estado) {
								if($orden['status'] == $estado['id']) 
									echo $estado['nombre'];
							} 
                			echo '</td>';
							echo '<td class="acciones">
								<form role="form" action="'.base_url('detalles_orden_cliente').'" method="post">
			                        <input type="hidden" name="id" value="'.$orden['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary">Ver Detalles</button>
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