<?php
//phpinfo();
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/ValidadorEntrada.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ValidadorEntradaEditada.inc.php';

Conexion :: abrir_conexion();

if(isset($_POST['guardar_cambios_entrada'])){
    $entrada_publica_nueva = 0;
    if(isset($_POST['publicar']) && $_POST['publicar'] == "si"){
        $entrada_publica_nueva = 1;
    }
    
    $validador = new ValidadorEntradaEditada($_POST['titulo'], $_POST['titulo-original'], $_POST['valor'], $_POST['valor-original'], $_POST['url'], $_POST['url-original'],
            htmlspecialchars($_POST['texto']), $_POST['texto-original'], $entrada_publica_nueva,
            $_POST['publicar-original'], Conexion::obtener_conexion());

            if (!$validador -> hay_cambios()){
                Redireccion:: redirigir(RUTA_GESTOR_ENTRADAS);
            } else {
                if ($validador -> entrada_valida()){
                    $cambio_efectuado = RepositorioEntrada :: actualizar_entrada(Conexion::obtener_conexion(),
                            $_POST['id-entrada'], $validador -> obtener_titulo(), $validador -> obtener_valor(), $validador -> obtener_url(),
                            $validador -> obtener_texto(), $validador -> obtener_checkbox());
                    
                    if ($cambio_efectuado){
                        Redireccion:: redirigir(RUTA_GESTOR_ENTRADAS);
                    }
                }
            }
    
    }

$titulo = "Editar producto";

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

include_once 'vistas/editar-entrada.php';
?>
