<?php $this->load->view('cliente/header'); ?>
<div class="titulo_cliente">
    <h1>Imprimir Creación<br><img src="<?php echo base_url('templates/usuario/images/adorno_titulo.png'); ?>"/></h1>
</div>
<div id="cover">
	<div class="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row text-center sign-with">
                                <div class="col-md-12 titulo-inicio-sesion">
                                    <h3>Cargando tu diseño...</h3>
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
<div class="contenedor_previa">
	<div class="foto_previa">
		<img src="<?php echo $foto_impresion; ?>" width="100%" height="auto"/>
		<div class="marca_agua"></div>
	</div>
	<div class="formulario_imprimir">
		<?php if($video_id != null){ ?>
			<iframe class="iframe-video" width="356" height="200" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allowfullscreen></iframe>
		<?php } ?>
	</div>
	<div class="contenedor_imprimir">
        <a id="imprimir_disenio" href="javascript:void(0);" onclick="imprimir();">Imprimir</a>
    </div>
</div>
<?php $this->load->view('cliente/footer'); ?>
<script>
$(window).load(function(){
    $('#cover').fadeOut(0);
});
function imprimir(){
	window.print();
}
</script>