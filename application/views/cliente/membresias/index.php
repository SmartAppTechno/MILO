<?php $this->load->view('cliente/header'); ?>
<div class="titulo_cliente">
    <h1>Historial de pago<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
</div>

<?php if( !empty($membresias)){ ?>
<div class="contenedor-tabla">
	<div class="tabla productos table-responsive">
    <table class="table tabla-buscador">
      <thead>
        <tr>
          <th>Tipo de Membresía</th>
          <th>Fecha de Inicio</th>
          <th>Fecha de Fin</th>
          <th>Total</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
     		<?php
    			foreach($membresias as $membresia){
    				echo '<tr>';
    				echo '<td>' . $membresia['nombre'] . '</td>';
    				echo '<td>' . $membresia['inicio'] . '</td>';
            echo '<td>' . $membresia['fin'] . '</td>';
    				echo '<td>$ ' . number_format((float)$membresia['total'], 2, '.', ',') . '</td>';
            if( $membresia['status'] == 0 )
              echo '<td>Pendiente</td>';
            if( $membresia['status'] == 1 )
              echo '<td>Pagado</td>';
    				echo '</tr>';
    			}
    		?>
      </tbody>
    </table>
    </div>
</div>
<?php }else{ ?>
<div class="tabla_vacia">
  <h4 class="centrar">No hay ningún pago registrado</h4>
</div>
<?php } ?>
<?php $this->load->view('cliente/footer'); ?>