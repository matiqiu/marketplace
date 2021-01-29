
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Publica un producto o servicio</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-nueva-entrada" method="post" action="<?php echo RUTA_NUEVA_ENTRADA; ?>">
                <?php
                
                if (isset($_POST['guardar'])){
                    include_once 'plantillas/form_nueva_entrada_validado.inc.php';
                }else {
                    include_once 'plantillas/form_nueva_entrada_vacio.inc.php';
                }
                
                ?>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>