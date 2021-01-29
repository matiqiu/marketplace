<?php
include_once 'app/Conexion.inc.php';

$titulo = 'PruebaApi';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Prueba Api
                </div>
                <div class="panel-body">
                    <form role="form" method=post"#">
                        <input type="text" class="form-control">
                        <br>
                        <br>
                        <button type="button" class="btn btn-default btn-default">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>

