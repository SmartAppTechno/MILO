<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Clientes</h2>
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
						<th>Correo</th>
						<th>Membresía</th>
						<th>Red Social</th>
						<th>Desactivar</th>
						<th>Detalles</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($clientes as $cliente){
							echo '<tr>';
							echo '<td>' . $cliente['id'] . '</td>';
							echo '<td>' . $cliente['nombre'] . '</td>';
							echo '<td>' . $cliente['email'] . '</td>';
							echo '<td>' . $cliente['membresia'] . '</td>';
							echo '<td>' . $cliente['red_social'] . '</td>';
							echo '<td class="acciones">';
							if($cliente['status'] == 4){
								echo '<form role="form" action="'.base_url('activar_cliente').'" method="post">
			                        	<input type="hidden" name="id" value="'.$cliente['id'].'">
			                        	<button type="submit" class="btn btn-w-m btn-primary">Activar</button>
			                    	</form>';
							}else{
								echo '<form role="form" action="'.base_url('desactivar_cliente').'" method="post">
			                        	<input type="hidden" name="id" value="'.$cliente['id'].'">
			                        	<button type="submit" class="btn btn-w-m btn-primary">Desactivar</button>
			                    	</form>';
							}  	
		                    echo '</td>';
							echo '<td class="acciones">
			                    	<form role="form" action="'.base_url('ordenes_cliente').'" method="post">
			                        <input type="hidden" name="id" value="'.$cliente['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary">Órdenes</button>
			                    	</form>
			                    	<form role="form" action="'.base_url('disenios_cliente').'" method="post">
			                        <input type="hidden" name="id" value="'.$cliente['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary">Diseños</button>
			                    	</form>
			                    	<form role="form" action="'.base_url('membresias_cliente').'" method="post">
			                        <input type="hidden" name="id" value="'.$cliente['id'].'">
			                        <button type="submit" class="btn btn-w-m btn-primary">Membresía</button>
			                    	</form>
			                    </td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>