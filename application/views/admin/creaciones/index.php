<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Log de Creaciones</h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover tabla-buscador" >
				<thead>
					<tr>
						<th>ID</th>
						<th>No. de Impresiones</th>
						<th>Fecha de Creación</th>
						<th>Cliente</th>
						<th>Detalles</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($creaciones as $creacion){
							echo '<tr>';
							echo '<td>' . $creacion['id'] . '</td>';
							echo '<td>' . $creacion['impresiones'] . '</td>';
							echo '<td>' . $creacion['fecha'] . '</td>';
							echo '<td>' . $creacion['cliente'] . '</td>';
							echo '<td class="acciones">
								<form role="form" action="'.base_url('ver_creacion').'" method="post">
			                        <input type="hidden" name="id" value="'.$creacion['id'].'">
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