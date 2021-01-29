<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';
include_once 'app/ControlSesion.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';

include_once 'app/EscritorEntradas.inc.php';

include_once 'app/Redireccion.inc.php';
include_once 'app/config.inc.php';

if (ControlSesion :: sesion_iniciada()) {
    Conexion :: abrir_conexion();
    $id = $_SESSION['id_usuario'];
    $usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);
    /* if ((isset($_POST['perfil2']))) {

      redireccion::redirigir(RUTA_PERFIL2 . '/' . $autor->obtener_nombre());
      }
     * 
     */
}

if (isset($_POST['guardar_imagen2']) && !empty($_FILES['archivo_subido2']['tmp_name'])) {
    $directorio = DIRECTORIO_RAIZ . "/subidasProductos/";
    $carpeta_objetivo = $directorio . basename($_FILES['archivo_subido2']['name']);
    $subida_correcta = 1;
    $tipo_imagen = pathinfo($carpeta_objetivo, PATHINFO_EXTENSION);

    $comprobacion = getimagesize($_FILES['archivo_subido2']['tmp_name']);
    if ($comprobacion !== false) {
        $subida_correcta = 1;
    } else {
        $subida_correcta = 0;
    }

    if ($_FILES['archivo_subido2']['size'] > 1000000) {
        echo "El archivo no puede ocupar más de 1mb";
        $subida_correcta = 0;
    }
    if ($tipo_imagen != "jpg" && $tipo_imagen != "png" && $tipo_imagen != "jpeg" && $tipo_imagen != "gif") {
        echo "Sólo se admiten formatos JPG, JPEG, PNG y GIF";
        $subida_correcta = 0;
    }
    if ($subida_correcta == 0) {
        echo "Tu archivo no puede subirse";
    } else {
        if (move_uploaded_file($_FILES['archivo_subido2']['tmp_name'], DIRECTORIO_RAIZ . "/subidasProductos/" . $entrada->obtener_id())) {
            echo "El archivo " . basename($_FILES['archivo_subido2']['name']) . " ha sido subido.";
        } else {
            echo "Ha ocurrido un error.";
        }
    }
}


$titulo = $entrada->obtener_titulo();

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container contenido-articulo">
    <div class="row">
        <div class="col-md-12">
            <h1>
                <i class="fas fa-angle-right"></i> <?php echo $entrada->obtener_titulo(); ?>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>
                <i class="fas fa-dollar-sign"></i> <?php echo $entrada->obtener_valor(); ?>
            </h2>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p>
                Por:
                <a href="<?php echo RUTA_PERFIL . '/' . $autor->obtener_nombre();?>">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $autor->obtener_nombre();?>
                </a>
                <br>
                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                <?php echo $entrada->obtener_fecha(); ?>
            </p>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Descripción:</h4>
                <article class="text-justify">
                    <?php echo nl2br($entrada->obtener_texto()); ?>
                </article>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-3">
            <?php
            if (file_exists(DIRECTORIO_RAIZ . '/subidasProductos/' . $entrada->obtener_id())) {
                ?>
                <img src="<?php echo SERVIDOR . '/subidasProductos/' . $entrada->obtener_id(); ?>" class="img-responsive">
                <?php
            } else {
                ?>
                <img src="../img/venta.jpg" class="img-responsive">
                <?php
            }
            ?>

            <br>
            <br>
            <br>
        </div>
        <div class="col-md-4">
            <br>
            <br>
            <?php
            if ($_SESSION['id_usuario'] == $autor->obtener_id()) {
                ?>
                <form class="text-center" action="<?php echo RUTA_ENTRADA . '/' . $entrada->obtener_url(); ?>" method="post" enctype="multipart/form-data">
                    <label for="archivo_subido2" id="label-archivo">Subir una imagen</label>
                    <input type="file" name="archivo_subido2" id="archivo_subido2" class="boton_subir">
                    <br>
                    <br>
                    <input type="submit" value="Guardar" name="guardar_imagen2" class="form-control">
                </form>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
    include_once 'plantillas/entradas_al_azar.inc.php';
    ?>
    <br>

    <br>
    <br>

    <?php
    include_once 'plantillas/nuevo_comentario.inc.php';
    ?>

    <br>
    <br>
    <?php
    if (count($comentarios) > 0) {
        include_once 'plantillas/comentarios_entrada.inc.php';
    } else {
        ?>
        <div class="text-center">
            <p>¡Todavía no hay comentarios!</p>
        </div>
        <?php
    }
    ?>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
