<?php
include_once 'app/ValidadorComentario.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/RepositorioComentario.inc.php';


if (isset($_POST['guardar2'])) {
    Conexion::abrir_conexion();

    $validador = new ValidadorComentario($_POST['titulo2'], htmlspecialchars($_POST['texto2']), Conexion :: obtener_conexion());

    if ($validador->comentario_validado()) {
        if (ControlSesion :: sesion_iniciada()) {
            $comentario = new Comentario('', $_SESSION['id_usuario'], $entrada->obtener_id(), $validador->obtener_titulo(), $validador->obtener_texto(), '');

            $comentario_insertado = RepositorioComentario :: insertar_comentario(Conexion :: obtener_conexion(), $comentario);
            
            if ($comentario_insertado) {
                redireccion::redirigir(RUTA_ENTRADA . '/' . $entrada->obtener_url());
            }else{
                redireccion::redirigir(RUTA_ENTRADA . '/' . $entrada->obtener_url());
            }
        }
        Conexion :: cerrar_conexion();
    }
}

if (ControlSesion::sesion_iniciada()) {
    ?>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <h3>Deja un comentario <i class="far fa-comment-alt"></i></h3
            <br>
            <form class="form-nuevo-comentario" method="post" action="<?php echo RUTA_ENTRADA . '/' . $entrada->obtener_url();?>">
                <?php
                if (isset($_POST['guardar2'])) {
                    include_once 'plantillas/nuevo_comentario_validado.inc.php';
                } else {
                    include_once 'plantillas/nuevo_comentario_vacio.inc.php';
                }
                ?>
            </form>
        </div>
        <div class="col-md-2">

        </div>
    </div>
    <?php
} else {
    ?>
    <div class="text-center">
        <p><a href="<?php echo RUTA_LOGIN; ?> ">¡Inicia sesión para crear comentario!</a></p>
    </div>
    <?php
}
?>
