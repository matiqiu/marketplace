<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/config.inc.php';

if (ControlSesion::sesion_iniciada()){
    Redireccion::redirigir(SERVIDOR);
}

if (isset($_POST['login'])){
    conexion::abrir_conexion();
    
    $validador = new ValidadorLogin($_POST['email'], $_POST['clave'], Conexion::obtener_conexion());
    
    if($validador -> obtener_error() === '' && !is_null($validador->obtener_usuario())){
        ControlSesion::iniciar_sesion(
                $validador -> obtener_usuario() -> obtener_id(),
                $validador -> obtener_usuario() -> obtener_nombre());
        Redireccion::redirigir(SERVIDOR);
    }
    Conexion::cerrar_conexion();
}

$titulo = 'login';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';


include_once 'vistas/login.php';
?>
