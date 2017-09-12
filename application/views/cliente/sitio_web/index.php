<?php $this->load->view('cliente/sitio_web/header'); ?>
<?php echo $map['js']; ?>
<!-- Slider Principal -->
<div class="slider-principal">
    <?php foreach($slide_principal as $foto){
        echo '<img class="slides" src="' . base_url($foto['foto']) . '">';
    } ?>
    <button class="flechas flecha-izquierda" onclick="plusDivs(-1)">&#10094;</button>
    <button class="flechas flecha-derecha" onclick="plusDivs(1)">&#10095;</button>
</div>
<!-- Slider Principal -->
<!-- Productos -->
<div class="titulo-seccion">
    <h1>Nuestros <br><span>productos</span><br><img src="<?php echo base_url('templates/usuario/images/cuenta.png'); ?>"/></h1>
</div>
<div class="banner-bottom">
    <div class="container">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <?php
                    $a = false;
                    foreach($productos_categorias as $categoria){
                    echo '<li class="';
                    if(!$a){echo 'active';$a = true;}
                    echo '"><a href="#' . $categoria['id'] . '" data-toggle="tab">' . $categoria['nombre'] . '</a></li>';
                } ?>
            </ul>
            <div class="tab-content">
                <?php 
                    $a = false;
                    foreach ($productos_categorias as $categoria) { ?>
                    <div id="<?php echo $categoria['id']; ?>" class="tab-pane fade <?php if(!$a){echo 'in active';$a = true;} ?>">
                        <div class="agile_ecommerce_tabs">
                            <?php foreach ($productos as $producto) { ?>
                                <?php if($categoria['id'] == $producto['categoria'] ){ ?>
                                    <div class="col-md-3 contenedor-columna">
                                        <div class="contenedor-foto-columna">
                                            <img src="<?php echo base_url($producto['url']); ?>" width="200" height="200" />
                                        </div> 
                                        <h4 class="columna-titulo"><?php echo $producto['nombre']; ?></h4>
                                        <p class="productos-membresia">Membresía <?php echo $producto['membresia']; ?></p>
                                        <p class="productos-precio">$ <?php echo number_format((float)$producto['precio'], 2, '.', ','); ?></p>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Productos -->
<!-- Promociones -->
<div class="contenedor_promociones">
    <div class="titulo-seccion">
        <h1>Nuestras <br><span>promociones</span><br><img src="<?php echo base_url('templates/usuario/images/cuenta.png'); ?>"/></h1>
    </div>
    <div class="slider-promociones">
        <?php foreach($promociones as $foto){
            echo '<img class="promociones" src="' . base_url($foto['foto']) . '">';
        } ?>
        <button class="flechas flecha-izquierda" onclick="plusDivs_promociones(-1)">&#10094;</button>
        <button class="flechas flecha-derecha" onclick="plusDivs_promociones(1)">&#10095;</button>
    </div>
</div>
<!-- Promociones -->
<!-- Membresías -->
<div class="titulo-seccion">
    <h1>Nuestras <br><span>membresías</span><br><img src="<?php echo base_url('templates/usuario/images/cuenta.png'); ?>"/></h1>
</div>
<div class="row noticias">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
        <?php foreach($membresias as $membresia){ ?>
            <div class="col-md-4 contenedor-columna">
                <div class="contenedor-foto-columna">
                    <img src="<?php echo base_url($membresia['foto']); ?>" width="100%" height="auto" />
                </div>
                <div class="contenedor_membresia">
                    <h3 class="titulo_membresia"><?php echo $membresia['nombre']; ?><br><img src="<?php echo base_url('templates/usuario/images/noticia.png'); ?>"/></h3>
                    <div class="columna-texto"><?php echo $membresia['descripcion']; ?></div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
<!-- Membresías -->
<!-- Vídeos -->
<div class="titulo-seccion">
    <h1>Videos <br><span>no te quedes sin verlos</span><br><img src="<?php echo base_url('templates/usuario/images/cuenta.png'); ?>"/></h1>
</div>
<div class="banner-bottom">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="slide-videos" class="carousel slide">
                <div class="carousel-inner">
                    <?php 
                        $a = false;
                        foreach($videos as $video){ ?>
                        <div class="video-container item <?php if(!$a){echo 'active';$a = true;} ?>">
                            <div class="youtube-video" id="<?php echo $video['video_id']; ?>"></div>
                        </div>
                    <?php  } ?>
                </div>
                <div class="controls">
                    <a class="left carousel-control" href="#slide-videos" data-slide="prev">
                        <div class="left-button"><img src="<?php echo base_url('templates/usuario/images/video_left.png'); ?>"/></div>
                    </a>
                    <a class="right carousel-control" href="#slide-videos" data-slide="next">        
                        <div class="right-button"><img src="<?php echo base_url('templates/usuario/images/video_right.png'); ?>"/></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vídeos -->
<!-- Noticias -->
<div class="titulo-seccion">
    <h1>Noticias <br><span>entérate de la última tendencia</span><br><img src="<?php echo base_url('templates/usuario/images/cuenta.png'); ?>"/></h1>
</div>
<div class="row noticias">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <?php foreach ($noticias as $noticia) { ?>
                <div class="col-md-4 contenedor-columna">
                    <div class="contenedor-foto-columna">
                        <img src="<?php echo base_url($noticia['portada']); ?>" width="100%" height="auto" />
                    </div>
                    <div class="contenedor_noticia">
                        <h3 class="noticia-titulo"><?php echo $noticia['titulo']; ?><br><img src="<?php echo base_url('templates/usuario/images/noticia.png'); ?>"/></h3>
                        <div class="columna-texto"><?php 
                            $content = preg_replace("/<img[^>]+\>/i", "", $noticia['contenido']);
                            $des = substr($content, 0, 300);
                            echo html_entity_decode($des) . '...'; 
                        ?></div>
                        <form role="form" action="<?php echo base_url('noticia'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $noticia['id']; ; ?>">
                            <button type="submit" class="btn btn-primary">Leer Más</button>
                        </form>
                    </div>
                </div>
            <?php  } ?>
        </div>
    </div>
</div>
<!-- Noticias -->
<!-- Distribuidores -->
<div class="titulo-seccion">
    <h1>Nuestros <br><span>distribuidores</span><br><img src="<?php echo base_url('templates/usuario/images/cuenta.png'); ?>"/></h1>
</div>
<div class="row distribuidores">
    <div class="col-md-12">
        <?php echo $map['html']; ?>
    </div>
</div>
<!-- Distribuidores -->
<?php $this->load->view('cliente/sitio_web/footer'); ?>
<script src="<?php echo base_url('templates/usuario/js/slide_video.js'); ?>"></script>
<script type="text/javascript">
var slideIndex = 1;
showDivs(slideIndex);
function plusDivs(n) {
    showDivs(slideIndex += n);
}
function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("slides");
    if (n > x.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    x[slideIndex-1].style.display = "block";  
}
//Promociones
var slideIndex_pro = 1;
showDivs_promociones(slideIndex_pro);
function plusDivs_promociones(n_pro) {
    showDivs_promociones(slideIndex_pro += n_pro);
}
function showDivs_promociones(n_pro) {
    var i_pro;
    var x_pro = document.getElementsByClassName("promociones");
    if (n_pro > x_pro.length) {slideIndex_pro = 1}    
    if (n_pro < 1) {slideIndex_pro = x_pro.length}
    for (i_pro = 0; i_pro < x_pro.length; i_pro++) {
        x_pro[i_pro].style.display = "none";  
    }
    x_pro[slideIndex_pro-1].style.display = "block";  
}
if (window.location.hash && window.location.hash == '#_=_') {
    if (window.history && history.pushState) {
        window.history.pushState("", document.title, window.location.pathname);
    } else {
        var scroll = {
            top: document.body.scrollTop,
            left: document.body.scrollLeft
        };
        window.location.hash = '';
        document.body.scrollTop = scroll.top;
        document.body.scrollLeft = scroll.left;
    }
}
</script>