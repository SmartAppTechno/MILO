<?php $this->load->view('cliente/header'); ?>
<div id="cover">
	<div class="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row text-center sign-with">
                                <div class="col-md-12 titulo-inicio-sesion">
                                    <h3>Cargando tus creaciones...</h3>
                                    <p>Espera un momento por favor<br><img src="<?php echo base_url('templates/usuario/images/cuenta.png'); ?>"/></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="titulo_cliente">
    <h1>Diseños creados<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
</div>

<?php if( !empty($disenios_creados)){ ?>
<div class="contenedor-tabla">
	<div class="tabla disenios-creados table-responsive">
      <table class="table tabla-buscador">
        <thead>
          <tr>
            <th>ID</th>
            <th>Impresiones</th>
            <th>Foto</th>
            <th>Producto</th>
            <th>Diseño</th>
            <th>Ocasión</th>
            <th>Imprimir</th>
          </tr>
        </thead>
        <tbody>
       		<?php
				foreach($disenios_creados as $disenio){
					echo '<tr>';
					echo '<td>' . $disenio['id'] . '</td>';
					echo '<td>' . $disenio['impresiones'] . '/'. $impresiones .'</td>';
					echo '<td><img src="' . $disenio['foto'] . '" width="50" height="50" /></td>';
					echo '<td>' . $disenio['producto'] . '</td>';
					echo '<td>' . $disenio['disenio'] . '</td>';
					echo '<td>' . $disenio['ocasion'] . '</td>';
					if($disenio['impresiones'] < $impresiones){
						echo '<td class="acciones">
								<form role="form" action="'.base_url('imprimir_disenio').'" method="post">
		                        <input type="hidden" name="creacion" value="'.$disenio['id'].'">
		                        <button type="submit" class="btn btn-w-m btn-primary">Imprimir</button>
		                    	</form>
		                    </td>';
		            }else{
		            	echo '<td><button type="submit" class="impresiones-agotadas btn btn-w-m btn-primary">Impresiones Agotadas</button></td>';
		            }
					echo '</tr>';
				}
			?>
        </tbody>
      </table>
    </div>
</div>
<?php }else{ ?>
<div class="tabla_vacia">
	<h4 class="centrar">No hay ningún diseño creado</h4>
</div>
<?php } ?>
<?php $this->load->view('cliente/footer'); ?>
<script>
$(window).load(function(){
    $('#cover').fadeOut(0);
});
</script>