<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Preguntas Frecuentes</h2>
		<form role="form" action="<?php echo base_url('nueva_pregunta'); ?>" method="post">
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
						<th>Pregunta</th>
						<th>Respuesta</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($preguntas as $pregunta){
							echo '<tr>';
							echo '<td>' . $pregunta['id'] . '</td>';
							echo '<td>' . $pregunta['pregunta'] . '</td>';
							echo '<td>' . $pregunta['respuesta'] . '</td>';
							echo '<td class="acciones"><form role="form" action="'.base_url('editar_pregunta').'" method="post">
			                        <input type="hidden" name="id" value="'.$pregunta['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary"><i class="fa fa-pencil"></i></button>
			                    </form>
			                    <form role="form" action="'.base_url('eliminar_pregunta').'" method="post">
			                        <input type="hidden" name="id" value="'.$pregunta['id'].'">
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