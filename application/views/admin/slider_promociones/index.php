<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Slider de Promociones</h2>
		<form role="form" action="<?php echo base_url('nueva_promocion'); ?>" method="post">
            <button type="submit" class="btn btn-w-m btn-primary">Nueva Promoción</button>
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
						<th>Orden</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($fotos as $foto){
							echo '<tr>';
							echo '<td>' . $foto['id'] . '</td>';
							echo '<td><img src="' . base_url($foto['foto']) . '" class="slider-foto" /></td>';
							echo '<td>' . $foto['orden'] . '</td>';
							echo '<td class="acciones"><form role="form" action="'.base_url('editar_promocion').'" method="post">
			                        <input type="hidden" name="id" value="'.$foto['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-pencil"></i></button>
			                    </form>
			                    <form role="form" action="'.base_url('eliminar_promocion').'" method="post">
			                        <input type="hidden" name="id" value="'.$foto['id'].'">
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