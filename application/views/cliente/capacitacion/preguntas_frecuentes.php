<?php $this->load->view('cliente/header'); ?>
<div class="titulo_cliente">
    <h1>Preguntas frecuentes<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
</div>
<div class="panel-group" id="accordion">
	<?php foreach ($preguntas as $pregunta) { ?>
		<div class="panel panel-default">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $pregunta['id']; ?>">
		    <div class="panel-heading">
		      <h4 class="panel-title"><span><?php echo $pregunta['pregunta']; ?></span> <img src="<?php echo base_url('templates/usuario/images/preguntas.png'); ?>"/></h4>
		    </div>
		    </a>
		    <div id="collapse<?php echo $pregunta['id']; ?>" class="panel-collapse collapse">
		      <div class="panel-body"><?php echo $pregunta['respuesta']; ?></div>
		    </div>
	  	</div>
	<?php } ?>
</div>
<?php $this->load->view('cliente/footer'); ?>