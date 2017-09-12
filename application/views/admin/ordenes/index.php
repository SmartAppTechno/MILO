<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Órdenes</h2>
	</div>
</div>

<div class="wrapper-ordenes">
	<div class="row">
        <div class="col-md-6">
            <div class="widget lazur-bg no-padding">
                <div class="p-m">
                    <h1 class="m-xs">$ <?php echo $total_pagado; ?></h1>
                    <h3 class="font-bold no-margins">Órdenes Pagadas</h3>
                    <small>Ganancia Total</small>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget yellow-bg no-padding">
                <div class="p-m">
                    <h1 class="m-xs">$ <?php echo $total_pendiente; ?></h1>
                    <h3 class="font-bold no-margins">Órdenes Pendientes</h3>
                    <small>Ganancia Total</small>
                </div>
            </div>
        </div>
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
						<th>Cliente</th>
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
							echo '<td>' . $orden['cliente'] . '</td>';
							echo '<td>$ ' . number_format((float)$orden['total'], 2, '.', ',') . '</td>';
							echo '<td><form role="form" action="' . base_url('cambiar_estado_orden').'" method="post">
								<input type="hidden" name="orden" value="'.$orden['id'].'">
								<select class="form-control m-b" name="estado" onchange="this.form.submit()">
	                    		<option value="">Selecciona el estado</option>';
			                    foreach ($estados as $estado) {
									echo '<option ';
									if($orden['status'] == $estado['id']) 
										echo 'selected="selected"';
									echo ' value="'. $estado['id'] . '">'. $estado['nombre'] .'</option>';
								} 
	                			echo '</select></form></td>';
			                echo '<td class="acciones">
								<form role="form" action="'.base_url('detalles_orden').'" method="post">
			                        <input type="hidden" name="id" value="'.$orden['id'].'">
			                        <input type="hidden" name="cliente" value="'.$orden['cliente_id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary">Ver Detalles</button>
			                    </form>
			                    <form role="form" action="'.base_url('eliminar_orden').'" method="post">
			                        <input type="hidden" name="id" value="'.$orden['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary">Eliminar</button>
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