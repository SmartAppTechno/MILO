<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Vídeos</h2>
		<form role="form" action="<?php echo base_url('nuevo_video'); ?>" method="post">
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
						<th>Nombre</th>
						<th>Categoría</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($videos as $video){
							echo '<tr>';
							echo '<td>' . $video['id'] . '</td>';
							echo '<td>' . get_youtube_title($video['video_id']) . '</td>';
							echo '<td>' . $video['categoria'] . '</td>';
							echo '<td class="acciones"><form role="form" action="'.base_url('editar_video').'" method="post">
			                        <input type="hidden" name="id" value="'.$video['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-pencil"></i></button>
			                    </form>
			                    <form role="form" action="'.base_url('eliminar_video').'" method="post">
			                        <input type="hidden" name="id" value="'.$video['id'].'">
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