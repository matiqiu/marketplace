<?php

//Info de la base de datos
define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_USUARIO', 'root');
define('CLAVE', '');
define('NOMBRE_BD', 'market');

//rutas de la web
define("SERVIDOR", "http://localhost/market");


define("RUTA_REGISTRO", SERVIDOR."/registro");
define("RUTA_REGISTRO_CORRECTO", SERVIDOR."/registro-correcto");
define("RUTA_LOGIN", SERVIDOR."/login");
define("RUTA_LOGOUT", SERVIDOR."/logout");
define("RUTA_ENTRADA", SERVIDOR."/entrada");
define("RUTA_MIS_ENTRADAS", SERVIDOR."/mis-entradas");
define("RUTA_LISTA_ENTRADAS", SERVIDOR."/lista-entradas");
define("RUTA_NUEVA_ENTRADA", SERVIDOR."/nueva-entrada");
define("RUTA_BUSCAR", SERVIDOR."/buscar");
define("RUTA_GESTOR", SERVIDOR."/gestor");
define("RUTA_GESTOR_ENTRADAS", RUTA_GESTOR."/entradas");
//define("RUTA_GESTOR_COMENTARIOS", RUTA_GESTOR."/comentarios");
//define("RUTA_GESTOR_FAVORITOS", RUTA_GESTOR."/favoritos");
define("RUTA_BORRAR_ENTRADA", SERVIDOR."/borrar-entrada");
define("RUTA_EDITAR_ENTRADA", SERVIDOR."/editar-entrada");
define("RUTA_RECUPERAR_CLAVE", SERVIDOR."/recuperar-clave"); //solicita cambio de contraseña
define("RUTA_GENERAR_URL_SECRETA", SERVIDOR."/generar-url-secreta");
define("RUTA_PRUEBA_MAIL", SERVIDOR."/mail");
define("RUTA_RECUPERACION_CLAVE", SERVIDOR."/recuperacion-clave"); //escribe la nueva contraseña
define("RUTA_PERFIL", SERVIDOR."/perfil");

define("RUTA_CREAR_PERFIL", SERVIDOR."/crear-perfil");

define("RUTA_PRUEBA_IMAGEN", SERVIDOR."/pruebaImagen");


//relleno
define("RUTA_RELLENO", SERVIDOR."/script-relleno");

//recursos
define("RUTA_CSS", SERVIDOR . "/css/");
define("RUTA_JS", SERVIDOR . "/js/");
define("DIRECTORIO_RAIZ", realpath(dirname(__FILE__)."/.."));// los dos slash sirven para volver atras en una carpeta

