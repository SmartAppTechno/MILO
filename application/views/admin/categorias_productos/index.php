<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Categorías de Productos</h2>
		<form role="form" action="<?php echo base_url('nueva_categoria_productos'); ?>" method="post">
            <button type="submit" class="btn btn-w-m btn-primary">Nueva</button>
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
						<th>Nombre</th>
						<th>Vídeo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($categorias as $categoria){
							echo '<tr>';
							echo '<td>' . $categoria['id'] . '</td>';
							echo '<td>' . $categoria['nombre'] . '</td>';
							echo '<td>';
							if(isset($categoria['video_id'])) 
								echo get_youtube_title($categoria['video_id']);
							echo '</td>';
							echo '<td class="acciones"><form role="form" action="'.base_url('editar_categoria_productos').'" method="post">
			                        <input type="hidden" name="id" value="'.$categoria['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-pencil"></i></button>
			                    </form>
			                    <form role="form" action="'.base_url('eliminar_categoria_productos').'" method="post">
			                        <input type="hidden" name="id" value="'.$categoria['id'].'">
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
function get_youtube_title($video_id) {
	$json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $video_id . '&format=json');
	$details = json_decode($json, true);
	return $details['title'];
}
?>