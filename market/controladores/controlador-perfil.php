    <?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if (!ControlSesion :: sesion_iniciada()) {
    Redireccion :: redirigir(SERVIDOR);
} else {
    Conexion :: abrir_conexion();
    $id = $_SESSION['id_usuario'];
    $usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);
}

if(isset($_POST['guardar_imagen']) && !empty($_FILES['archivo_subido']['tmp_name'])){
    $directorio = DIRECTORIO_RAIZ."/subidasPerfil/";
    $carpeta_objetivo = $directorio.basename($_FILES['archivo_subido']['name']);
    $subida_correcta= 1;
    $tipo_imagen = pathinfo($carpeta_objetivo, PATHINFO_EXTENSION);
    
    $comprobacion = getimagesize($_FILES['archivo_subido']['tmp_name']);
    if($comprobacion !== false){
        $subida_correcta = 1;
    } else {
        $subida_correcta = 0;
    }
    
    if ($_FILES['archivo_subido']['size'] > 1000000){
        echo "El archivo no puede ocupar más de 1mb";
        $subida_correcta = 0;
    }
    if($tipo_imagen != "jpg" && $tipo_imagen != "png" && $tipo_imagen != "jpeg" && $tipo_imagen != "gif" ){
        echo "Sólo se admiten formatos JPG, JPEG, PNG y GIF";
        $subida_correcta = 0;
    }
    if ($subida_correcta == 0){
        echo "Tu archivo no puede subirse";
    } else {
        if (move_uploaded_file($_FILES['archivo_subido']['tmp_name'], DIRECTORIO_RAIZ."/subidas/".$usuario
                ->obtener_id())){
            echo "El archivo ".basename($_FILES['archivo_subido']['name'])." ha sido subido.";
        } else {
            echo "Ha ocurrido un error.";
        }
    }
}

$titulo = "Perfil de usuario";

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

include_once 'vistas/perfil.php';
?>

