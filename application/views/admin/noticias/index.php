<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Noticias</h2>
		<form role="form" action="<?php echo base_url('nueva_noticia'); ?>" method="post">
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
						<th>Título</th>
						<th>Portada</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($noticias as $noticia){
							echo '<tr>';
							echo '<td>' . $noticia['id'] . '</td>';
							echo '<td>' . $noticia['titulo'] . '</td>';
							echo '<td><img src="' . base_url($noticia['portada']) . '" width="50" height="50" /></td>';
							echo '<td class="acciones"><form role="form" action="'.base_url('editar_noticia').'" method="post">
			                        <input type="hidden" name="id" value="'.$noticia['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-pencil"></i></button>
			                    </form>
			                    <form role="form" action="'.base_url('eliminar_noticia').'" method="post">
			                        <input type="hidden" name="id" value="'.$noticia['id'].'">
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