<?php
//phpinfo();
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/ValidadorEntrada.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';


$entrada_publica = 0;
if (isset($_POST['guardar'])) {
    Conexion :: abrir_conexion();
 
    $validador = new ValidadorEntrada($_POST['titulo'], $_POST['valor'], $_POST['url'], htmlspecialchars($_POST['texto']), Conexion :: obtener_conexion());

    if (isset($_POST['publicar']) && $_POST['publicar'] == 'si') {
        $entrada_publica = 1;
    }

    if ($validador->entrada_valida()) {
        if (ControlSesion :: sesion_iniciada()) {

            $entrada = new Entrada('', $_SESSION['id_usuario'], $validador->obtener_url(), $validador->obtener_titulo(), $validador->obtener_valor(), $validador->obtener_texto(), '', $entrada_publica);

            $entrada_insertada = RepositorioEntrada :: insertar_entrada(Conexion :: obtener_conexion(), $entrada);
            if ($entrada_insertada) {
                Redireccion :: redirigir(RUTA_GESTOR_ENTRADAS);
            }else{
                Redireccion :: redirigir(RUTA_LOGIN);
            }
        }
        Conexion :: cerrar_conexion();
    }
}

$titulo = 'Guia Turistica';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

include_once 'vistas/nueva-entrada.php';
?>

