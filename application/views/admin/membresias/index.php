<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Membresías</h2>
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
						<th>Precio</th>
						<th>Máximo de Impresiones</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($membresias as $membresia){
							echo '<tr>';
							echo '<td>' . $membresia['id'] . '</td>';
							echo '<td>' . $membresia['nombre'] . '</td>';
							echo '<td>$ ' . number_format((float)$membresia['precio'], 2, '.', ',') . '</td>';
							echo '<td>' . $membresia['impresiones'] . '</td>';
							echo '<td class="acciones"><form role="form" action="'.base_url('editar_membresia').'" method="post">
			                        <input type="hidden" name="id" value="'.$membresia['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-pencil"></i></button>
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