<link href="<?php echo base_url('templates/admin/css/plugins/jasny/jasny-bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('templates/admin/css/plugins/codemirror/codemirror.css'); ?>" rel="stylesheet">
<div id="cover">
    <div class="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row text-center sign-with">
                                <div class="col-md-12 titulo-inicio-sesion">
                                    <h3>Cargando el diseño...</h3>
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
<div class="fila-flex acciones_personalizar">
    <div class="contenedor_accion">
        <img src="<?php echo base_url('templates/usuario/images/guardar.png'); ?>"/>
        <a class="accion" id="guardar_disenio" href="javascript:void(0);">Guardar</a>
    </div>
    <div class="contenedor_accion">
        <img src="<?php echo base_url('templates/usuario/images/cancelar.png'); ?>"/>
        <a class="accion" href="<?php echo base_url('cancelar_disenio'); ?>">Cancelar</a>
    </div>
</div>
<div class="fila-flex botones-personalizar">
    <div class="columna-flex-icono">
        <div class="botones">
            <a class="boton" id="zoomIn" href="javascript:void(0);"><i class="fa fa-plus-square-o"></i></a>
            <p>Zoom</p>
        </div>
    </div>
    <div class="columna-flex-icono">
        <div class="botones">
            <a class="boton" id="zoomOut" href="javascript:void(0);"><i class="fa fa-minus-square-o"></i></a>
            <p>Alejarse</p>
        </div>
    </div>
    <div class="columna-flex-icono">
        <div class="botones">
            <a class="boton" id="foto" href="javascript:void(0);"><i class="fa fa-picture-o"></i></a>
            <input type="file" id="nueva_foto"/>
            <p>Importar imagen</p>
        </div>
    </div>
    <div class="columna-flex-icono">
        <div class="botones">
            <a class="boton" id="crop_rect" href="javascript:void(0);"><i class="fa fa-crop"></i></a>
            <p>Corte cuadrado</p>
        </div>
    </div>
    <div class="columna-flex-icono">
        <div class="botones">
            <a class="boton" id="crop_circle" href="javascript:void(0);"><i class="fa fa-crosshairs"></i></a>
            <p>Corte circular</p>
        </div>
    </div>
    <div class="columna-flex-icono">
        <div class="botones">
            <a class="boton" id="crop" href="javascript:void(0);"><i class="fa fa-cut"></i></a>
            <p>Terminar corte</p>
        </div>
    </div>
    <div class="columna-flex-icono">
        <div class="botones">
            <a class="boton" id="texto" href="javascript:void(0);"><i class="fa fa-font"></i></a>
            <p>Campo de texto</p>
        </div>
    </div>
    <div class="columna-flex-icono">
        <label class="color-picker">
            <input type=color value="#000000" id="text_color">
        </label>
        <p>Color</p>
    </div>
    <div class="columna-flex-icono">
        <input type="range" min="24" max="120" step="1" id="text_size">
        <p>Tamaño</p>
    </div>
    <div class="columna-flex-icono">
        <select id="text_font">
            <option value="arial" selected>Arial</option>
            <option value="helvetica">Helvetica</option>
            <option value="verdana">Verdana</option>
            <option value="courier">Courier</option>
            <option value="comic sans ms">Comic Sans MS</option>
            <option value="impact">Impact</option>
        </select>
        <p>Tipo de fuente</p>
    </div>
    <div class="columna-flex-icono">
        <div class="botones">
            <a class="boton" id="eliminar" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
            <p>Eliminar</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="canvas-contenedor" id="canvas_con">
	       <canvas id="disenio"></canvas>
        </div>
    </div>
</div>
<script type="text/javascript">
$(window).load(function(){
    $('#cover').fadeOut(0);
});
var canvas,ancho_con,foto = '<?php echo $foto; ?>';
var num_fotos = 0;
var num_textos = 0;
var minimo, primer = 1;
var escala_x=1,escala_y=1;
$(document).ready(function () {
    canvas = document.querySelector('canvas');
    canvas = window._canvas = new fabric.Canvas('disenio');
    ancho_con = $('#canvas_con').width();
    fabric.Image.fromURL(foto, function (img) {
        canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
            height: img.height,
            width: img.width,
            originX: "left", 
            originY: "top"
        });
        canvas.setWidth(img.width);
        canvas.setHeight(img.height);
        canvas.setZoom(ancho_con/img.width);
        canvas.renderAll();
    });
    fabric.Object.prototype.set({
        transparentCorners: false,
        borderColor: '#00ff00',
        cornerColor: '#00ff00'
    });
});
//Guardar canvas
$('#guardar_disenio').click(function(){
    canvas.setZoom(1.0);
    canvas.deactivateAll().renderAll();
    var img = canvas.toDataURL();

    var form = document.getElementById("form_personalizar");
    var url = "<?php echo base_url('guardar_impresion'); ?>";                
    var base64ImageContent = img.replace(/^data:image\/(png|jpg);base64,/, "");
    var blob = base64ToBlob(base64ImageContent, 'image/png');                
    var formData = new FormData(form);
    formData.append('foto_impresion', blob);

    $.ajax({
        url: url,
        data: formData,
        type: "POST", 
        contentType: false,
        processData: false,
        cache: false,
        error: function(err){
        },
        success: function(data){
            window.location.href = '<?php echo base_url('personaliza'); ?>';
        }
    });
});
function base64ToBlob(base64, mime) 
{
    mime = mime || '';
    var sliceSize = 1024;
    var byteChars = window.atob(base64);
    var byteArrays = [];
    for (var offset = 0, len = byteChars.length; offset < len; offset += sliceSize) {
        var slice = byteChars.slice(offset, offset + sliceSize);
        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }
        var byteArray = new Uint8Array(byteNumbers);
        byteArrays.push(byteArray);
    }
    return new Blob(byteArrays, {type: mime});
}
//Guardar canvas
//Zoom
$('#zoomIn').click(function(){
    if(primer == 1){
        minimo = canvas.getZoom();
        primer++;
    }
    if(canvas.getZoom() <= 1.0){
        canvas.setZoom(canvas.getZoom() * 1.1 ) ;
    }
}) ;
$('#zoomOut').click(function(){
    if(primer == 1){
        minimo = canvas.getZoom();
        primer++;
    }
    if(canvas.getZoom() > minimo){
        canvas.setZoom(canvas.getZoom() / 1.1 ) ;
    }
}) ;
//Zoom
//Agregar Texto
$("#texto").click(function(e) {
    if (num_textos > 4) {
            alert("Lo sentimos, solo es posible agregar 5 textos al diseño.");
    } else {
        canvas.add(new fabric.Textbox('Escribe algo...', { 
            fontFamily: 'arial',
            left: 100, 
            top: 100 ,
        }));
        num_textos++;
    }
});
//Agregar Texto
//Color del texto
document.getElementById('text_color').onchange = function() {
    canvas.getActiveObject().setFill(this.value);
    canvas.renderAll();
};
//Color del texto
//Tipo de letra
document.getElementById('text_font').onchange = function() {
    canvas.getActiveObject().setFontFamily(this.value);
    canvas.renderAll();
};
//Tipo de letra
//Tamaño del texto
document.getElementById('text_size').onchange = function() {
    canvas.getActiveObject().setFontSize(this.value);
    canvas.renderAll();
};
//Tamaño del texto
//Eliminar elemento
$('#eliminar').click(function(){
    var object = canvas.getActiveObject();
    if (!object){
        alert('Por favor selecciona una foto o un texto.');
        return '';
    }
    if(object.isType('textbox')){
        num_textos--;
    }else if(object.isType('image')){
        num_fotos--;
    }
    canvas.remove(object);
});
//Eliminar elemento
//Agregar foto
$("#foto").click(function () {
    $("#nueva_foto").click();
});
document.getElementById('nueva_foto').onchange = function handleImage(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        var imgObj = new Image();
        imgObj.src = event.target.result;
        imgObj.onload = function () {
            if (num_fotos > 2) {
                alert("Lo sentimos, solo es posible agregar 3 fotos al diseño.");
            } else {
                var image = new fabric.Image(imgObj);
                image.set({
                    left: 500,
                    top: 500,
                    //hasControls: false
                });
                canvas.bringForward(image);
                canvas.add(image);
                num_fotos++;
            }
        }   
    }
    reader.readAsDataURL(e.target.files[0]);
}
//Agregar foto
//Recortar foto
var el,object;
$('#crop').on('click', function (event) {
    //Rectangular
    var left = parseInt(el.left - object.left);
    var top = parseInt(el.top - object.top);
    var eWidth = el.width;
    var eHeight = el.height;
    var eScaleX = el.scaleX;
    var eScaleY = el.scaleY;
    //Ver el tipo
    var tipo = el.tipo;
    if(tipo == 0){
        object.clipTo = function (ctx) {
            var ancho = parseInt(el.width *eScaleX);
            var alto = parseInt(el.height *eScaleY);
            var x = -(eWidth / 2) + left;
            var y = -(eHeight / 2) + top;
            //var ancho = parseInt(el.width);
            //var alto = parseInt(el.height);
            //var x = -(object.width / 2) + left;
            //var y = -(object.height / 2) + top;
            //var x = -(object.width*object.scaleX / 2) + left;
            //var y = -(object.height*object.scaleY / 2) + top;
            ctx.rect(x, y, ancho, alto);
        }
    }
    if(tipo == 1){
        object.clipTo = function (ctx) {
            // ancho alto
            var radius = Math.max(parseInt(el.width *eScaleX),parseInt(el.height *eScaleY)) * 0.5;
            //x
            var x1 = -(eWidth / 2) + left;
            //x + ancho
            var x2 = (-(eWidth / 2) + left) + parseInt(el.width *eScaleX);
            //y
            var y1 = -(eHeight / 2) + top;
            //y + alto
            var y2 = (-(eHeight / 2) + top) + parseInt(el.height *eScaleY);
            ctx.arc((x1+x2)/2,(y1+y2)/2 , radius, 0, Math.PI * 2.0, true);
        }
    }
    for (var i = 0; i < $("#layers li").size(); i++) {
        canvas.item(i).selectable = true;
    }
    disabled = true;
    canvas.remove(el);
    canvas.renderAll();
});
$('#crop_rect').on('click', function () {
    canvas.remove(el);
    if (canvas.getActiveObject()) {
        object = canvas.getActiveObject();
        el = new fabric.Rect({
            fill: 'rgba(0,0,0,0.3)',
            originX: 'left',
            originY: 'top',
            stroke: '#ccc',
            strokeDashArray: [2, 2],
            opacity: 1,
            width: 1,
            height: 1,
            borderColor: '#36fd00',
            cornerColor: 'green',
            hasRotatingPoint: false
        });
        el.left = canvas.getActiveObject().left;
        el.top = canvas.getActiveObject().top;
        el.width = canvas.getActiveObject().width * canvas.getActiveObject().scaleX;
        el.height = canvas.getActiveObject().height * canvas.getActiveObject().scaleY;
        el.tipo = 0;
        canvas.add(el);
        canvas.setActiveObject(el);
        for (var i = 0; i < $("#layers li").size(); i++) {
            canvas.item(i).selectable = false;
        }
    } else {
        alert("Por favor selecciona un elemento");
    }
});
$('#crop_circle').on('click', function () {
    canvas.remove(el);
    if (canvas.getActiveObject()) {
        object = canvas.getActiveObject();
        el = new fabric.Rect({
            fill: 'rgba(0,0,0,0.3)',
            originX: 'left',
            originY: 'top',
            stroke: '#ccc',
            strokeDashArray: [2, 2],
            opacity: 1,
            width: 1,
            height: 1,
            borderColor: '#36fd00',
            cornerColor: 'green',
            hasRotatingPoint: false
        });
        el.left = canvas.getActiveObject().left;
        el.top = canvas.getActiveObject().top;
        el.width = canvas.getActiveObject().width * canvas.getActiveObject().scaleX;
        el.height = canvas.getActiveObject().height * canvas.getActiveObject().scaleY;
        el.tipo = 1;
        canvas.add(el);
        canvas.setActiveObject(el);
        for (var i = 0; i < $("#layers li").size(); i++) {
            canvas.item(i).selectable = false;
        }
    } else {
        alert("Por favor selecciona un elemento");
    }
});
//Recortar foto
</script>
<!-- Subir archivos -->
<script src="<?php echo base_url('templates/admin/js/plugins/jasny/jasny-bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('templates/admin/js/plugins/codemirror/codemirror.js'); ?>"></script>
<script src="<?php echo base_url('templates/admin/js/plugins/codemirror/mode/xml/xml.js'); ?>"></script>