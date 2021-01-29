
<br>
<div class="container">
    <div class="row">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#avanzada">Búsqueda avanzada <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a>
                    </h4>
                </div>
                <div id="avanzada" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form role="form" method="post" action ="#">
                            <div class="form-group">
                                <input type="search" name="termino-buscar" class="form-control" placeholder="¿Que buscas?" required>
                            </div>
                            <p>Buscar en los siguientes campos: </p>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="campos[]" value="titulo">Título
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="campos[]" value="contenido">Contenido
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="campos[]" value="tags">Tags
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="campos[]" value="autor">Autor
                            </label>
                            <hr>
                            <p>Ordenar por: </p>
                            <label class="radio-inline">
                                <input type="radio" name="fecha" value="recientes" checked>Entradas más recientes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="fecha" value="antiguas">Entradas más antiguas
                            </label>
                            <hr>
                            <button type="submit" name="busqueda-avanzada" class="btn btn-default btn-buscar">
                                Busqueda avanzada
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" id="resultados">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>
                    Resultados 
                    <?php
                    if (count($resultados)) {
                        echo '<small>' . count($resultados) . ' resultados</small>';
                    }
                    ?>
                </h1>
            </div>
        </div>
    </div> 
    <?php
    if (count($resultados)) {
        if(!$resultados_multiples){
            EscritorEntradas::mostrar_entradas_busqueda($resultados);
        }else{
            //mostrar resultados
        }
    } else {
        ?>
        <p>No hay coincidencias</p>
        <?php
    }
    ?>
</div>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>