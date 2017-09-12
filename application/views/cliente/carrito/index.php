<?php $this->load->view('cliente/header'); ?>
<div class="titulo_cliente">
    <h1>Carro de Compras<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
</div>
<?php if(count($carro) > 0){ ?>
<div class="formulario">
	<form role="form" action="<?php echo base_url('actualizar_carro') ?>" method="post">
		<div class="contenedor-tabla compras no-padding">
			<div class="tabla no-margen table-responsive">
				<table class="table sortable">
					<thead>
						<tr>
						<th>Foto</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Total</th>
						<th class="sorttable_nosort">Eliminar</th>
					</tr>
					</thead>
					<tbody class="searchable">
						<?php foreach($carro as $key=>$elemento){ ?>
							<tr>
								<td><img src="<?php echo base_url($elemento['foto']); ?>" width="50" height="50" /></td>
								<td><?php echo $elemento['nombre']; ?></td>
								<td>$<?php echo number_format((float)$elemento['precio'], 2, '.', ','); ?></td>
								<td class="carro_cantidad">
									<?php if(strcmp($elemento['tipo'], 'productos') == 0){ ?>
										<input type="number" name="<?php echo $key; ?>" value="<?php echo $elemento['cantidad']; ?>" />
									<?php } if(strcmp($elemento['tipo'], 'disenios') == 0){ ?>
										<input type="number" name="<?php echo $key; ?>" value="<?php echo $elemento['cantidad']; ?>" readonly/>
									<?php } ?>
								</td>
								<td>$<?php echo number_format((float)$elemento['precio']*$elemento['cantidad'], 2, '.', ','); ?></td>
								<td><a class="boton carrito" href="<?php echo base_url('eliminar_producto/' . $key) ?>"><img src="<?php echo base_url('templates/usuario/images/carrito.png'); ?>"/></a></td>
							</tr>	
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="boton-orden">
			<h4 class="centrar"><strong>Total:</strong> $<?php echo number_format((float)$total, 2, '.', ','); ?></h4>
		</div>
		<div class="boton-actualizar">
			<input type="submit" name="carrito" value="Actualizar">
			<input type="submit" name="carrito" class="comprar" value="Comprar">
		</div>
	</form>
</div>
<?php } else { ?>
<div class="tabla_vacia">
  <h4 class="centrar">No hay ningún producto en el carro de compras</h4>
</div>
<?php } ?>
<?php $this->load->view('cliente/footer'); ?>