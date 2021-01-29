<?php
include_once 'app/EscritorEntradas.inc.php';

$busqueda = null;
$resultados = null;

$resultados_multiples = null;

if (isset($_POST['buscar']) && isset($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
    $busqueda = $_POST['termino-buscar'];
    $resultados_multiples = false;
    
    Conexion::abrir_conexion();
    $resultados = RepositorioEntrada::buscar_entradas_todos_los_campos(Conexion::obtener_conexion(), $busqueda);

    Conexion::cerrar_conexion();
}
/*
if (isset($_POST['busqueda-avanzada']) && isset($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
    $busqueda = $_POST['termino-buscar'];
    $resultados_multiples = true;

    print_r($_POST['campos']);
    echo ($_POST['fecha']);
}
*/
$titulo = "Buscar en Marketplace";

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

include_once 'vistas/buscar.php';
?>
