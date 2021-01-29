
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Formulario de registro
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_REGISTRO ?>">
                        <?php
                        if (isset($_POST['enviar'])) {
                            include_once 'plantillas/registro_validado.inc.php';
                        } else {
                            include_once 'plantillas/registro_vacio.inc.php';
                        }
                        ?>
                    </form>
                    <div class="text-center">
                        <br>
                        <a href="<?php echo RUTA_LOGIN; ?>">¿Ya tienes cuenta?</a>
                        <br>
                        <br>
                        <a href="<?php echo RUTA_RECUPERAR_CLAVE; ?>">¿Olvidaste tu contraseña?</a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>

<!-- llamadas
<php
echo $_POST['nombre'];
echo $_POST['email'];
echo $_POST['clave1'];
echo $_POST['clave2'];
-->