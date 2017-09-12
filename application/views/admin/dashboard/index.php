<?php $this->load->view('admin/header'); ?>

<div class="wrapper-content">
	<div class="row">
		<div class="col-md-3">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-users fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                        <span>Clientes</span>
                        <h2 class="font-bold"><?php echo $clientes; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-shopping-cart fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                        <span>Productos</span>
                        <h2 class="font-bold"><?php echo $productos; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-picture-o fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                        <span>Diseños</span>
                        <h2 class="font-bold"><?php echo $disenios; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-calendar fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                        <span>Ocasiones</span>
                        <h2 class="font-bold"><?php echo $ocasiones; ?></h2>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<div class="row">
        <?php foreach ($membresias as $key => $membresia) { ?>
            <div class="col-md-3">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-id-card-o fa-4x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <span>Membresía <?php echo $membresia; ?></span>
                            <h2 class="font-bold"><?php echo $membresias_usuarios[$key]; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
	</div>
	<div class="row">
		<div class="col-md-3">
            <div class="widget style1 blue-bg">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-lightbulb-o fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                        <span>Creaciones en este día</span>
                        <h2 class="font-bold"><?php echo $cd; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget style1 blue-bg">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-lightbulb-o fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                        <span>Creaciones en esta semana</span>
                        <h2 class="font-bold"><?php echo $cs; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget style1 blue-bg">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-lightbulb-o fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                        <span>Creaciones en este mes</span>
                        <h2 class="font-bold"><?php echo $cm; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget style1 blue-bg">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-lightbulb-o fa-4x"></i>
                    </div>
                    <div class="col-xs-10 text-right">
                        <span>Creaciones en este año</span>
                        <h2 class="font-bold"><?php echo $ca; ?></h2>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<div class="row">
		<div class="col-md-3">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <span>Este día: <?php echo $cod; ?> <?php if($cod == 1) echo 'orden'; else echo 'órdenes'; ?></span>
                        <h2 class="font-bold">$ <?php echo $od; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <span>Esta semana: <?php echo $cos; ?> <?php if($cos == 1) echo 'orden'; else echo 'órdenes'; ?></span>
                        <h2 class="font-bold">$ <?php echo $os; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <span>Este mes: <?php echo $com; ?> <?php if($com == 1) echo 'orden'; else echo 'órdenes'; ?></span>
                        <h2 class="font-bold">$ <?php echo $om; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <span>Este año: <?php echo $coa; ?> <?php if($coa == 1) echo 'orden'; else echo 'órdenes'; ?></span>
                        <h2 class="font-bold">$ <?php echo $oa; ?></h2>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Cantidad de Órdenes por Mes del <?php date_default_timezone_set('America/Mexico_City'); echo date('Y'); ?></h5>
                </div>
                <div class="ibox-content">
                    <div id="ordenes-grafico"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Cantidad de Creaciones por Mes del <?php date_default_timezone_set('America/Mexico_City'); echo date('Y'); ?></h5>
                </div>
                <div class="ibox-content">
                    <div id="creaciones-grafico"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/footer'); ?>
<?php 
	setlocale(LC_ALL,"es_ES");
	$ordenes = array();
	foreach($grafica_ordenes as $key=>$aux){
		$ordenes[$key] = $aux['ordenes'];
	}
	$mes_orden = array();
	foreach($grafica_ordenes as $key=>$aux){
		$dateObj   = DateTime::createFromFormat('!m', $aux['mes']);
		$mes_orden[$key] = ucfirst(strftime("%B",$dateObj->getTimestamp()));
	}
	$creaciones = array();
	foreach($grafica_creaciones as $key=>$aux){
		$creaciones[$key] = $aux['creaciones'];
	}
	$mes_creacion = array();
	foreach($grafica_creaciones as $key=>$aux){
		$dateObj   = DateTime::createFromFormat('!m', $aux['mes']);
		$mes_creacion[$key] = ucfirst(strftime("%B",$dateObj->getTimestamp()));
	}
?>
<script>
$(document).ready(function () {
    c3.generate({
        bindto: '#ordenes-grafico',
        data:{
            x: 'x',
	        json: {
	            x: <?php echo json_encode($mes_orden); ?>,
	            Órdenes: <?php echo json_encode($ordenes); ?>
	        },
	        colors: {
	            Órdenes: '#008860',
	        }
        },
        legend: {
	        show: false
	    },
        axis: {
	        x: {
	            type: 'category'
	        }
	    }
    });
    c3.generate({
        bindto: '#creaciones-grafico',
        data:{
            x: 'x',
	        json: {
	            x: <?php echo json_encode($mes_creacion); ?>,
	            Órdenes: <?php echo json_encode($creaciones); ?>
	        },
	        colors: {
	            Órdenes: '#008860',
	        }
        },
        legend: {
	        show: false
	    },
        axis: {
	        x: {
	            type: 'category'
	        }
	    }
    });
});
</script>