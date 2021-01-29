

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Modifica tu articulo</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-nueva-entrada" method="post" action="<?php echo RUTA_EDITAR_ENTRADA; ?>">
                <?php
                if(isset($_POST['editar_entrada'])){
                    $id_entrada = $_POST['id_editar'];
                                                            
                    $entrada_recuperada = RepositorioEntrada :: obtener_entrada_por_id(Conexion::obtener_conexion(), $id_entrada);
                    
                    include_once 'plantillas/form_entrada_recuperada.inc.php';
                    
                    Conexion::cerrar_conexion();
                } else if (isset($_POST['guardar_cambios_entrada'])) {
                    $id_entrada = $_POST ['id-entrada'];
                    
                    $entrada_recuperada = RepositorioEntrada :: obtener_entrada_por_id(Conexion::obtener_conexion(), $id_entrada);
                                        
                    //plantilla validada
                    include_once 'plantillas/form_entrada_recuperada_validada.inc.php';
                }
                
                ?>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>