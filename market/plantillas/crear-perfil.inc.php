<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioPerfil.inc.php';
include_once 'app/Perfil.inc.php';
include_once 'app/ValidadorPerfil.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';


if (isset($_POST['guardar3'])) {
    Conexion :: abrir_conexion();

    $validador = new ValidadorPerfil($_POST['celular'], $_POST['facebook'], $_POST['twitter'], $_POST['instagram'], Conexion :: obtener_conexion());

    if ($validador->perfil_valido()) {
        if (ControlSesion :: sesion_iniciada()) {

            $perfil = new Perfil('', $_SESSION['id_usuario'], $validador->obtener_celular(), $validador->obtener_facebook(), $validador->obtener_twitter(), $validador->obtener_instagram());
            $perfil_insertado = RepositorioPerfil :: insertar_perfil(Conexion :: obtener_conexion(), $perfil);
            
            if ($perfil_insertado) {
                redireccion::redirigir(RUTA_PERFIL . '/' . $usuario->obtener_nombre());
            }else{
                redireccion::redirigir(RUTA_PERFIL . '/' . $usuario->obtener_nombre());
            }
        }
        Conexion :: cerrar_conexion();
    }
}
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-default form-control" data-toggle="collapse" data-target="#comentarios">
                <?php echo "Agregar nuevos tipos de contacto"; ?>
            </button>
            <div id="comentarios" class="collapse">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-editar-perfil" method="post" action="<?php echo RUTA_PERFIL . '/' . $usuario->obtener_nombre(); ?>">
                            <?php
                            if (isset($_POST['guardar3'])) {
                                include_once 'plantillas/editor_perfil_validado.inc.php';
                            } else {
                                include_once 'plantillas/editor_perfil_vacio.inc.php';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>