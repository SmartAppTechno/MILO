<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Nueva Pregunta</h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<form role="form" action="<?php echo base_url('crear_pregunta') ?>" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Pregunta</label>
				<div class="col-sm-10"><input type="text" name="pregunta" class="form-control" required></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Respuesta</label>
				<div class="col-sm-10"><textarea id="respuesta" name="respuesta" required></textarea></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">Crear</button>
                </div>
            </div>
		</form>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>
<script>
$(document).ready(function(){
    $('#respuesta').summernote({
    	height: 150,
	  	toolbar: [
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['strikethrough', 'superscript', 'subscript']],
		    ['fontsize', ['fontsize']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']],
		    ['view', ['fullscreen', 'codeview']]
	  	]
	});
});
</script>