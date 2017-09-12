<?php $this->load->view('cliente/header'); ?>
<div class="titulo_cliente">
    <h1>Nuevo diseño</h1>
</div>
<div class="panel panel-default" id="crear_producto">
    <div class="panel-heading">
        <div class="nav nav-tabs">
            <div class="<?php if($paso==1) echo 'active'; ?>">Elige el producto</div>
            <div class="flecha">
                <?php if($paso==1){ ?>
                <img src="<?php echo base_url('templates/usuario/images/paso_actual.png'); ?>"/>
                <?php }else{ ?>
                <img src="<?php echo base_url('templates/usuario/images/paso.png'); ?>"/>
                <?php } ?>
            </div>
            <div class="<?php if($paso==2) echo 'active'; ?>">Elige la ocasión</div>
            <div class="flecha">
                <?php if($paso==2){ ?>
                <img src="<?php echo base_url('templates/usuario/images/paso_actual.png'); ?>"/>
                <?php }else{ ?>
                <img src="<?php echo base_url('templates/usuario/images/paso.png'); ?>"/>
                <?php } ?>
            </div>
            <div class="<?php if($paso==3) echo 'active'; ?>">Elige el diseño</div>
            <div class="flecha">
                <?php if($paso==3){ ?>
                <img src="<?php echo base_url('templates/usuario/images/paso_actual.png'); ?>"/>
                <?php }else{ ?>
                <img src="<?php echo base_url('templates/usuario/images/paso.png'); ?>"/>
                <?php } ?>
            </div>
            <div class="<?php if($paso==4) echo 'active'; ?>">Personaliza tu diseño</div>
            <div class="flecha">
                <?php if($paso==4){ ?>
                <img src="<?php echo base_url('templates/usuario/images/paso_actual.png'); ?>"/>
                <?php }else{ ?>
                <img src="<?php echo base_url('templates/usuario/images/paso.png'); ?>"/>
                <?php } ?>
            </div>
            <div class="<?php if($paso==5) echo 'active'; ?>">Imprime</div>
        </div>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane <?php if($paso==1) echo 'active'; ?>">
                <form role="form" action="<?php echo base_url('elegir_ocasion') ?>" method="post">
                    <?php if($paso==1) $this->load->view('cliente/personalizar/elegir_producto'); ?>
                </form>
            </div>
            <div class="tab-pane <?php if($paso==2) echo 'active'; ?>">
                <form role="form" action="<?php echo base_url('elegir_disenio') ?>" method="post">
                    <?php if($paso==2) $this->load->view('cliente/personalizar/elegir_ocasion'); ?>
                </form>
            </div>
            <div class="tab-pane <?php if($paso==3) echo 'active'; ?>">
                <form role="form" action="<?php echo base_url('personalizar_disenio') ?>" method="post">
                    <?php if($paso==3) $this->load->view('cliente/personalizar/elegir_disenio');  ?>
                </form>
            </div>
            <div class="tab-pane <?php if($paso==4) echo 'active'; ?>">
                <form id="form_personalizar" enctype="multipart/form-data" role="form" action="<?php echo base_url('guardar_impresion') ?>" method="post">
                    <?php if($paso==4) $this->load->view('cliente/personalizar/personalizar_disenio'); ?>
                </form>
            </div>
            <div class="tab-pane <?php if($paso==5) echo 'active'; ?>">
                <form id="form_imprimir" enctype="multipart/form-data" role="form" action="<?php echo base_url('imprimir_disenio') ?>" method="post">
                    <?php if($paso==5) $this->load->view('cliente/personalizar/vista_previa'); ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('cliente/footer'); ?>