<?php $this->load->view('admin/header'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Editar Vídeo de la Página</h2>
	</div>
</div>

<div class="wrapper-content">
	<div class="ibox-content">
		<form role="form" action="<?php echo base_url('guardar_video_pagina') ?>" method="post" class="form-horizontal">
			<input type="hidden" name="id" value="<?php echo $video['id']; ?>">
			<div class="form-group video">
				<iframe width="400" height="225" src="https://www.youtube.com/embed/<?php echo $video['video_id']; ?>" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">ID del Vídeo</label>
				<div class="col-sm-10"><input type="text" name="video_id" class="form-control" required value="<?php echo $video['video_id']; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Orden</label>
				<div class="col-sm-10"><input type="number" name="orden" class="form-control" required value="<?php echo $video['orden']; ?>"></div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </div>
		</form>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>