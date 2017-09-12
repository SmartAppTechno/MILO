<?php $this->load->view('cliente/header'); ?>
<div class="titulo_orden">
    <h1>Orden #<?php echo $orden_id; ?><br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
</div>
<div class="contenedor-tabla">
	<div class="tabla productos table-responsive">
      <table class="table tabla-buscador">
        <thead>
          <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
     		<?php
				foreach($productos as $producto){
					echo '<tr>';
					echo '<td>' . $producto['nombre'] . '</td>';
					echo '<td>$ ' . number_format((float)$producto['precio'], 2, '.', ',') . '</td>';
					echo '<td>' . $producto['cantidad'] . '</td>';
					echo '<td>$ ' . number_format((float)$producto['total'], 2, '.', ',') . '</td>';
					echo '</tr>';
				}
        foreach($disenios as $disenio){
          echo '<tr>';
          echo '<td>' . $disenio['nombre'] . '</td>';
          echo '<td>$ ' . number_format((float)$disenio['precio'], 2, '.', ',') . '</td>';
          echo '<td>' . $disenio['cantidad'] . '</td>';
          echo '<td>$ ' . number_format((float)$disenio['total'], 2, '.', ',') . '</td>';
          echo '</tr>';
        }
        ?>
        </tbody>
      </table>
    </div>
</div>
<?php $this->load->view('cliente/footer'); ?>