<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Productos</h2>
		<form role="form" action="<?php echo base_url('nuevo_producto'); ?>" method="post">
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
						<th>Foto</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Descripción</th>
						<th>Ancho</th>
						<th>Alto</th>
						<th>Categoría</th>
						<th>Membresía</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($productos as $producto){
							echo '<tr>';
							echo '<td>' . $producto['id'] . '</td>';
							echo '<td><img src="' . base_url($producto['foto']) . '" width="50" height="50" /></td>';
							echo '<td>' . $producto['nombre'] . '</td>';
							echo '<td>$ ' . number_format((float)$producto['precio'], 2, '.', ',') . '</td>';
							echo '<td>' . $producto['descripcion'] . '</td>';
							echo '<td>' . $producto['ancho'] . ' px</td>';
							echo '<td>' . $producto['alto'] . ' px</td>';
							echo '<td>' . $producto['categoria'] . '</td>';
							echo '<td>' . $producto['membresia'] . '</td>';
							echo '<td class="acciones"><form role="form" action="'.base_url('editar_producto').'" method="post">
			                        <input type="hidden" name="id" value="'.$producto['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-pencil"></i></button>
			                    </form>
			                    <form role="form" action="'.base_url('eliminar_producto').'" method="post">
			                        <input type="hidden" name="id" value="'.$producto['id'].'">
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