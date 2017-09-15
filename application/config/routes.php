<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//Rutas del Cliente
//Perfil
$route['perfil'] = 'perfil_controller';
$route['guardar_direccion'] = 'perfil_controller/guardar_direccion';

//órdenes de productos
$route['ordenes_productos'] = 'ordenes_productos_controller';
$route['ver_orden/(:num)'] = 'ordenes_productos_controller/ver_orden/$1';

//Membresías
$route['pagos_membresia'] = 'pagos_membresia_controller';
$route['actualizar_pago'] = 'pagos_membresia_controller/actualizar_pago';
$route['cancelar_membresia'] = 'pagos_membresia_controller/cancelar_membresia';
$route['revisar_membresias'] = 'pagos_membresia_controller/revisar_membresias';

//Diseño Especial
$route['disenio_especial'] = 'Disenio_especial_controller';
$route['disenio_especial_mensaje'] = 'Disenio_especial_controller/enviar_mensaje';

//Capacitación
$route['videos'] = 'capacitacion_controller/videos';
$route['manuales'] = 'capacitacion_controller/manuales';
$route['preguntas_frecuentes'] = 'capacitacion_controller/preguntas';
$route['capacitacion_presencial'] = 'capacitacion_controller/presencial';

//Inicio de Sesión
$route['google_login'] = 'principal_controller/google_login';
$route['google_callback'] = 'principal_controller/google_callback';
$route['fblogin'] = 'principal_controller/fblogin';
$route['fbcallback'] = 'principal_controller/fbcallback';
$route['cerrar_sesion'] = 'principal_controller/cerrar_sesion';

//Comprar productos
$route['comprar_productos'] = 'comprar_productos_controller/comprar_productos';
$route['buscar_productos'] = 'comprar_productos_controller/buscar_productos';
$route['agregar_producto'] = 'comprar_productos_controller/agregar_producto';

//Comprar diseños
$route['comprar_disenios'] = 'comprar_disenios_controller/comprar_disenios';
$route['buscar_disenios'] = 'comprar_disenios_controller/buscar_disenios';
$route['agregar_disenio'] = 'comprar_disenios_controller/agregar_disenio';

//Carrito
$route['carrito'] = 'carrito_controller';
$route['actualizar_carro'] = 'carrito_controller/actualizar';
$route['eliminar_producto/(:num)'] = 'carrito_controller/eliminar/$1';

//Paypal
$route['compra_exitosa'] = 'Paypal_controller/exito';
$route['compra_cancelada'] = 'Paypal_controller/cancelar';

//Personalizar
$route['personaliza'] = 'crear_disenio_controller';
$route['elegir_ocasion'] = 'crear_disenio_controller/elegir_ocasion';
$route['elegir_disenio'] = 'crear_disenio_controller/elegir_disenio';
$route['personalizar_disenio'] = 'crear_disenio_controller/personalizar_disenio';
$route['guardar_impresion'] = 'crear_disenio_controller/guardar_impresion';
$route['cancelar_disenio'] = 'crear_disenio_controller/cancelar_disenio';
$route['disenios_creados'] = 'crear_disenio_controller/disenios_creados';
$route['imprimir_disenio'] = 'crear_disenio_controller/imprimir_disenio';

//Rutas del Backend
//Login
$route['admin'] = 'Login_controller';
$route['iniciar_sesion'] = 'Login_controller/iniciar_sesion';
$route['salir'] = 'Login_controller/cerrar_sesion';

//Panel
$route['panel'] = 'Dashboard_controller';

//Usuarios
$route['usuarios'] = 'Usuarios_controller';
$route['nuevo_usuario'] = 'Usuarios_controller/nuevo_usuario';
$route['crear_usuario'] = 'Usuarios_controller/crear_usuario';
$route['editar_usuario'] = 'Usuarios_controller/editar_usuario';
$route['guardar_usuario'] = 'Usuarios_controller/guardar_usuario';
$route['eliminar_usuario'] = 'Usuarios_controller/eliminar_usuario';

//Clientes
$route['clientes'] = 'Clientes_controller/clientes';
$route['desactivar_cliente'] = 'Clientes_controller/desactivar_cliente';
$route['ordenes_cliente'] = 'Clientes_controller/ordenes_cliente';
$route['detalles_orden_cliente'] = 'Clientes_controller/detalles_orden_cliente';
$route['disenios_cliente'] = 'Clientes_controller/disenios_cliente';
$route['membresias_cliente'] = 'Clientes_controller/membresias_cliente';

//Log de Creaciones
$route['creaciones'] = 'Creaciones_controller';
$route['ver_creacion'] = 'Creaciones_controller/ver_creacion';

//Preguntas Frecuentes
$route['preguntas'] = 'Preguntas_controller';
$route['nueva_pregunta'] = 'Preguntas_controller/nueva_pregunta';
$route['crear_pregunta'] = 'Preguntas_controller/crear_pregunta';
$route['editar_pregunta'] = 'Preguntas_controller/editar_pregunta';
$route['guardar_pregunta'] = 'Preguntas_controller/guardar_pregunta';
$route['eliminar_pregunta'] = 'Preguntas_controller/eliminar_pregunta';

//Ocasiones
$route['ocasiones'] = 'Ocasiones_controller';
$route['nueva_ocasion'] = 'Ocasiones_controller/nueva_ocasion';
$route['crear_ocasion'] = 'Ocasiones_controller/crear_ocasion';
$route['editar_ocasion'] = 'Ocasiones_controller/editar_ocasion';
$route['guardar_ocasion'] = 'Ocasiones_controller/guardar_ocasion';
$route['eliminar_ocasion'] = 'Ocasiones_controller/eliminar_ocasion';

//Vídeos
$route['administrar_videos'] = 'Video_controller';
$route['nuevo_video'] = 'Video_controller/nuevo_video';
$route['crear_video'] = 'Video_controller/crear_video';
$route['editar_video'] = 'Video_controller/editar_video';
$route['guardar_video'] = 'Video_controller/guardar_video';
$route['eliminar_video'] = 'Video_controller/eliminar_video';

//Categorías de vídeos
$route['categorias_videos'] = 'Videos_Categorias_controller';
$route['nueva_categoria_videos'] = 'Videos_Categorias_controller/nueva_categoria_videos';
$route['crear_categoria_videos'] = 'Videos_Categorias_controller/crear_categoria_videos';
$route['editar_categoria_videos'] = 'Videos_Categorias_controller/editar_categoria_videos';
$route['guardar_categoria_videos'] = 'Videos_Categorias_controller/guardar_categoria_videos';
$route['eliminar_categoria_videos'] = 'Videos_Categorias_controller/eliminar_categoria_videos';

//Categorías de Manuales
$route['categorias_manuales'] = 'Manuales_Categorias_controller';
$route['nueva_categoria_manuales'] = 'Manuales_Categorias_controller/nueva_categoria_manuales';
$route['crear_categoria_manuales'] = 'Manuales_Categorias_controller/crear_categoria_manuales';
$route['editar_categoria_manuales'] = 'Manuales_Categorias_controller/editar_categoria_manuales';
$route['guardar_categoria_manuales'] = 'Manuales_Categorias_controller/guardar_categoria_manuales';
$route['eliminar_categoria_manuales'] = 'Manuales_Categorias_controller/eliminar_categoria_manuales';

//Manuales
$route['administrar_manuales'] = 'Manual_controller';
$route['nuevo_manual'] = 'Manual_controller/nuevo_manual';
$route['crear_manual'] = 'Manual_controller/crear_manual';
$route['editar_manual'] = 'Manual_controller/editar_manual';
$route['guardar_manual'] = 'Manual_controller/guardar_manual';
$route['eliminar_manual'] = 'Manual_controller/eliminar_manual';

//Órdenes
$route['ordenes'] = 'Ordenes_controller';
$route['detalles_orden'] = 'Ordenes_controller/ver_orden';
$route['cambiar_estado_orden'] = 'Ordenes_controller/cambiar_estado_orden';
$route['eliminar_orden'] = 'Ordenes_controller/eliminar_orden';

//Diseños
$route['disenios'] = 'Disenios_controller';
$route['nuevo_disenio'] = 'Disenios_controller/nuevo_disenio';
$route['crear_disenio'] = 'Disenios_controller/crear_disenio';
$route['editar_disenio'] = 'Disenios_controller/editar_disenio';
$route['guardar_disenio'] = 'Disenios_controller/guardar_disenio';
$route['eliminar_disenio'] = 'Disenios_controller/eliminar_disenio';
$route['solicitud_disenio_especial'] = 'Disenios_controller/solicitudes';
$route['administrar_disenio_especial'] = 'Disenios_controller/disenios_especiales';

//Categorías de diseños
$route['categorias_disenios'] = 'Disenios_Categorias_controller';
$route['nueva_categoria_disenios'] = 'Disenios_Categorias_controller/nueva_categoria_disenios';
$route['crear_categoria_disenios'] = 'Disenios_Categorias_controller/crear_categoria_disenios';
$route['editar_categoria_disenios'] = 'Disenios_Categorias_controller/editar_categoria_disenios';
$route['guardar_categoria_disenios'] = 'Disenios_Categorias_controller/guardar_categoria_disenios';
$route['eliminar_categoria_disenios'] = 'Disenios_Categorias_controller/eliminar_categoria_disenios';

//Productos
$route['productos'] = 'Productos_controller';
$route['nuevo_producto'] = 'Productos_controller/nuevo_producto';
$route['crear_producto'] = 'Productos_controller/crear_producto';
$route['editar_producto'] = 'Productos_controller/editar_producto';
$route['guardar_producto'] = 'Productos_controller/guardar_producto';
$route['eliminar_producto'] = 'Productos_controller/eliminar_producto';

//Categorías de productos
$route['categorias_productos'] = 'Productos_Categorias_controller';
$route['nueva_categoria_productos'] = 'Productos_Categorias_controller/nueva_categoria_productos';
$route['crear_categoria_productos'] = 'Productos_Categorias_controller/crear_categoria_productos';
$route['editar_categoria_productos'] = 'Productos_Categorias_controller/editar_categoria_productos';
$route['guardar_categoria_productos'] = 'Productos_Categorias_controller/guardar_categoria_productos';
$route['eliminar_categoria_productos'] = 'Productos_Categorias_controller/eliminar_categoria_productos';

//Slider principal
$route['slider_principal'] = 'Slider_Principal_controller';
$route['nueva_foto'] = 'Slider_Principal_controller/nueva_foto';
$route['crear_foto'] = 'Slider_Principal_controller/crear_foto';
$route['editar_foto'] = 'Slider_Principal_controller/editar_foto';
$route['guardar_foto'] = 'Slider_Principal_controller/guardar_foto';
$route['eliminar_foto'] = 'Slider_Principal_controller/eliminar_foto';

//Vídeos de la página
$route['videos_pagina'] = 'Video_pagina_controller';
$route['nuevo_video_pagina'] = 'Video_pagina_controller/nuevo_video_pagina';
$route['crear_video_pagina'] = 'Video_pagina_controller/crear_video_pagina';
$route['editar_video_pagina'] = 'Video_pagina_controller/editar_video_pagina';
$route['guardar_video_pagina'] = 'Video_pagina_controller/guardar_video_pagina';
$route['eliminar_video_pagina'] = 'Video_pagina_controller/eliminar_video_pagina';

//Slider promociones
$route['slider_promociones'] = 'Slider_Promociones_controller';
$route['nueva_promocion'] = 'Slider_Promociones_controller/nueva_promocion';
$route['crear_promocion'] = 'Slider_Promociones_controller/crear_promocion';
$route['editar_promocion'] = 'Slider_Promociones_controller/editar_promocion';
$route['guardar_promocion'] = 'Slider_Promociones_controller/guardar_promocion';
$route['eliminar_promocion'] = 'Slider_Promociones_controller/eliminar_promocion';

//Membresías
$route['administrar_membresias'] = 'Membresias_controller';
$route['editar_membresia'] = 'Membresias_controller/editar_membresia';
$route['guardar_membresia'] = 'Membresias_controller/guardar_membresia';
$route['pagos_membresias'] = 'Membresias_controller/pagos_membresias';
$route['solicitudes_membresia'] = 'Membresias_controller/solicitudes_membresia';
$route['ver_solicitud'] = 'Membresias_controller/ver_solicitud';

//Noticias
$route['administrar_noticias'] = 'Noticias_controller';
$route['nueva_noticia'] = 'Noticias_controller/nueva_noticia';
$route['crear_noticia'] = 'Noticias_controller/crear_noticia';
$route['editar_noticia'] = 'Noticias_controller/editar_noticia';
$route['guardar_noticia'] = 'Noticias_controller/guardar_noticia';
$route['eliminar_noticia'] = 'Noticias_controller/eliminar_noticia';

//Quiénes Somos
$route['nosotros'] = 'Nosotros_controller';
$route['guardar_nosotros'] = 'Nosotros_controller/guardar_nosotros';

//Capacitación Presencial
$route['presencial'] = 'Capacitacion_presencial_controller';
$route['guardar_presencial'] = 'Capacitacion_presencial_controller/guardar_presencial';

//Distribuidores
$route['distribuidores'] = 'Distribuidores_controller';
$route['nuevo_distribuidor'] = 'Distribuidores_controller/nuevo_distribuidor';
$route['crear_distribuidor'] = 'Distribuidores_controller/crear_distribuidor';
$route['editar_distribuidor'] = 'Distribuidores_controller/editar_distribuidor';
$route['guardar_distribuidor'] = 'Distribuidores_controller/guardar_distribuidor';
$route['eliminar_distribuidor'] = 'Distribuidores_controller/eliminar_distribuidor';

//Rutas de la página
$route['principal'] = 'Principal_controller';
$route['noticia'] = 'Principal_controller/ver_noticia';
$route['noticias'] = 'Principal_controller/noticias';
$route['quienes-somos'] = 'Principal_controller/nosotros';
$route['membresias'] = 'Principal_controller/membresias';
$route['solicitud_equipo'] = 'Principal_controller/solicitud_equipo';
$route['enviar_solicitud'] = 'Principal_controller/enviar_solicitud';

//Rutas predeterminadas
$route['default_controller'] = 'Principal_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;