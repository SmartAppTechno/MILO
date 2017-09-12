<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Manuales</h2>
		<form role="form" action="<?php echo base_url('nuevo_manual'); ?>" method="post">
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
						<th>Título</th>
						<th>Nombre del Archivo</th>
						<th>Categoría</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($manuales as $manual){
							echo '<tr>';
							echo '<td>' . $manual['id'] . '</td>';
							echo '<td>' . $manual['titulo'] . '</td>';
							echo '<td>' . get_nombre($manual['url']) . '</td>';
							echo '<td>' . $manual['categoria'] . '</td>';
							echo '<td class="acciones"><form role="form" action="'.base_url('editar_manual').'" method="post">
			                        <input type="hidden" name="id" value="'.$manual['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-pencil"></i></button>
			                    </form>
			                    <form role="form" action="'.base_url('eliminar_manual').'" method="post">
			                        <input type="hidden" name="id" value="'.$manual['id'].'">
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
<?php
function get_nombre($url) {
	$partes = explode("/", $url);
	return $partes[2];
}
?>