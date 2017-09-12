<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Detalles de la Orden #<?php echo $orden_id; ?></h2>
		<h4><strong>Cliente:</strong> <?php echo $cliente['nombre']; ?></h4>
		<h4><strong>Dirección:</strong> <?php echo $cliente['direccion']; ?></h4>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover tabla-buscador" >
				<thead>
					<tr>
						<th>Foto</th>
						<th>Producto</th>
						<th>Tipo</th>
						<th>Cantidad</th>
						<th>Descripción</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($orden as $producto){
							echo '<tr>';
							echo '<td><img src="' . base_url($producto['foto']) . '" width="100" height="100" /></td>';
							echo '<td>' . $producto['producto'] . '</td>';
							echo '<td>';
							if (strcmp($producto['tipo'],'productos') == 0)
								echo 'Producto';
							if (strcmp($producto['tipo'],'disenios') == 0)
								echo 'Diseño';
							echo '</td>';
							echo '<td>' . $producto['cantidad'] . '</td>';
							echo '<td>' . $producto['descripcion'] . '</td>';
							echo '<td>$ ' . number_format((float)$producto['total'], 2, '.', ',') . '</td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>