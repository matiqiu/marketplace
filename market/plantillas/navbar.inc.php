<?php
include_once 'app/ControlSesion.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioPerfil.inc.php';

conexion :: abrir_conexion();
$total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());

include_once 'app/Redireccion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/config.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/Entrada.inc.php';

 if(ControlSesion :: sesion_iniciada()) {
    Conexion :: abrir_conexion();
    $id = $_SESSION['id_usuario'];
    $usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);
    if ((isset($_POST['perfil2']))) {

        redireccion::redirigir(RUTA_PERFIL . '/' . $usuario->obtener_nombre());
    }
}

?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                <span class="sr-only">Este botón despliega la barra de navegacion></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo SERVIDOR ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Marketplace</a>
        </div>        
        <div id="navbar" class="navbar-collapse collapse">
            <?php
            if (!ControlSesion::sesion_iniciada()) {
                ?> 
                <ul class="nav navbar-nav">
                    <li><a href="#">nada</a></li>
                    <li><a href="<?php echo RUTA_LISTA_ENTRADAS ?>">Todos los productos</a></li>
                </ul>
                <?php
            }
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form role="form" method="post" action="<?php echo RUTA_BUSCAR; ?>">
                        <div class="form-group">
                            <table
                                <tr>
                                    <td>
                                        <input type="search" name="termino-buscar" class="form-control" placeholder="¿Qué buscas?">
                                    </td>
                                    <td>
                                        <button type="submit" name="buscar"class="form-control btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </li>
                <?php
                if (ControlSesion::sesion_iniciada()) {
                    ?>
                    <li>
                        <a href="<?php echo RUTA_PERFIL . '/' . $_SESSION['nombre_usuario']; ?>">

                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php echo ' ' . $_SESSION['nombre_usuario']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_GESTOR; ?>">
                            <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>Gestor
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_LOGOUT ?>">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            Cerrar sesión
                        </a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php
                            echo $total_usuarios;
                            ?>

                        </a>
                    </li>

                    <li>
                        <a href="<?php echo RUTA_LOGIN ?>">
                            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                            Iniciar sesión
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_REGISTRO ?>">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            Registrarse
                        </a>
                    </li>

                    <?php
                }
                ?>

            </ul>
        </div>
    </div>   
</nav>