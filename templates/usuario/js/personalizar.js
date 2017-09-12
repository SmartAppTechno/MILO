var canvas,bgImage,foto = '<?php echo $foto; ?>';
$(document).ready(function () {
    canvas = document.querySelector('canvas');
    fitToContainer(canvas);
    canvas = window._canvas = new fabric.Canvas('disenio');
    setCanvasBackgroundImageUrl(foto, 0, 0, 1);
});
function fitToContainer(canvas){
  canvas.style.width ='100%';
  canvas.style.height='100%';
  canvas.width  = canvas.offsetWidth;
  canvas.height = canvas.offsetHeight;
}
function setCanvasBackgroundImageUrl(url) {
    fabric.Image.fromURL(url, function (img) {
        bgImage = img;
        scaleAndPositionImage();
    });
}
function scaleAndPositionImage() {
    var scale = 1,fin = true,canvasWidth = canvas.width,canvasHeight = canvas.height,width,height;
    while(fin){
        width = bgImage.width * scale;
        height = bgImage.height * scale;
        if(width <= canvasWidth && height <= canvasHeight)
            fin = false;
        else
            scale -= 0.000001;
    }
    canvas.setBackgroundImage(bgImage, canvas.renderAll.bind(canvas), {
        height: height,
        width: width,
        originX: "left", 
        originY: "top"
    });
    canvas.setWidth(width);
    canvas.setHeight(height);
    canvas.renderAll();
}