<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/config.inc.php';

if (isset($_POST['enviar'])) {
    conexion :: abrir_conexion();

    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'], Conexion :: obtener_conexion());

    if ($validador->registro_valido()) {
        $usuario = new Usuario('', $validador->obtener_nombre(), $validador->obtener_email(), password_hash($validador->obtener_clave(), PASSWORD_DEFAULT), '', '');
        $usuario_insertado = repositorioUsuario :: insertar_usuario(conexion :: obtener_conexion(), $usuario);

        if ($usuario_insertado) {
            //redirigir a login
            redireccion::redirigir(RUTA_REGISTRO_CORRECTO . '/' . $usuario->obtener_nombre());
        }
    }

    conexion:: cerrar_conexion();
}

$titulo = 'Registro';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

include_once 'vistas/registro.php';
?>
