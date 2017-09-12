<?php $this->load->view('cliente/header'); ?>
<div class="titulo_cliente">
    <h1>Órdenes de productos<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
</div>

<?php if(isset($mensaje)){ ?>
<div class="tabla_vacia mensaje">
  <h4 class="centrar"><?php echo $mensaje; ?></h4>
</div>
<?php } ?>

<?php if( !empty($ordenes)){ ?>
<div class="contenedor-tabla">
	<div class="tabla productos table-responsive">
      <table class="table tabla-buscador">
        <thead>
          <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Detalles</th>
          </tr>
        </thead>
        <tbody>
       		<?php
				foreach($ordenes as $orden){
					echo '<tr>';
					echo '<td>' . $orden['id'] . '</td>';
					echo '<td>' . $orden['fecha'] . '</td>';
					echo '<td>$ ' . number_format((float)$orden['total'], 2, '.', ',') . '</td>';
                    echo '<td>';
                    foreach ($estados as $estado) {
                        if($orden['status'] == $estado['id']) 
                            echo $estado['nombre'];
                    } 
                    echo '</td>';
					echo '<td>';
					echo '<a class="boton" href="' . base_url('ver_orden/' . $orden['id']) . '">Ver Detalles</a>';
					echo '</td>';
					echo '</tr>';
				}
			?>
        </tbody>
      </table>
    </div>
</div>
<?php }else{ ?>
<div class="tabla_vacia">
  <h4 class="centrar">No hay ninguna orden registrada</h4>
</div>
<?php } ?>
<?php $this->load->view('cliente/footer'); ?>