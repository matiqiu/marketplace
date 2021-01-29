<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-default form-control" data-toggle="collapse" data-target="#comentarios">
                <?php echo "Ver comentarios (" . count($comentarios) . ")" ?>
            </button>
            <br>
            <br>
            <div id="comentarios" class="collapse">
                <?php
                for ($i = 0; $i < count($comentarios); $i++) {
                    $comentario = $comentarios[$i];
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php echo $comentario->obtener_titulo(); ?>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-2">
                                        <a href="<?php echo RUTA_PERFIL . '/' . $autor->obtener_nombre();?>">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                            <?php
                                            echo $autor->obtener_nombre();
                                            ?>

                                        </a>
                                    </div>
                                    <div class="col_md-10">
                                        <p>
                                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                            <?php echo $comentario->obtener_fecha(); ?>
                                        </p>
                                        <p id="texto_comentario">
                                            <?php echo nl2br($comentario->obtener_texto()); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>