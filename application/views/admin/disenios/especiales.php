<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Diseños</h2>
		<form role="form" action="<?php echo base_url('nuevo_disenio'); ?>" method="post">
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
						<th>Foto para Impresión</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Descripción</th>
						<th>Categoría</th>
						<th>Producto</th>
						<th>Ocasión</th>
						<th>Membresía</th>
						<th>Cliente</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($disenios as $disenio){
							echo '<tr>';
							echo '<td>' . $disenio['id'] . '</td>';
							echo '<td><img src="' . base_url($disenio['foto_impresion']) . '" width="50" height="50" /></td>';
							echo '<td>' . $disenio['nombre'] . '</td>';
							echo '<td>$ ' . number_format((float)$disenio['precio'], 2, '.', ',') . '</td>';
							echo '<td>' . $disenio['descripcion'] . '</td>';
							echo '<td>' . $disenio['categoria'] . '</td>';
							echo '<td>' . $disenio['categoria_producto'] . '</td>';
							echo '<td>' . $disenio['ocasion'] . '</td>';
							echo '<td>' . $disenio['membresia'] . '</td>';
							echo '<td>' . $disenio['cliente'] . '</td>';
							echo '<td class="acciones"><form role="form" action="'.base_url('editar_disenio').'" method="post">
			                        <input type="hidden" name="id" value="'.$disenio['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-pencil"></i></button>
			                    </form>
			                    <form role="form" action="'.base_url('eliminar_disenio').'" method="post">
			                        <input type="hidden" name="id" value="'.$disenio['id'].'">
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