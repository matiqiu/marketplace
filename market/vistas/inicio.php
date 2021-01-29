<?php
//phpinfo();

include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/EscritorEntradas.inc.php';

include_once 'app/Redireccion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/config.inc.php';
include_once 'app/ControlSesion.inc.php';

$titulo = 'Marketplace';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="navbar extends carrusel">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="img/imagen7.jpg" alt="primera imagen">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Vitrinea desde casa</h1>
                        <p>Encuentra lo que buscas</p>
                        <p><a class="btn btn-lg btn-default" href="#" role="button">Registrate aquí</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/imagen8.png" alt="segunda imagen">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Comparte, comenta y compra</h1>
                        <p>Con mucha facilidad</p>
                        <p><a class="btn btn-lg btn-default" href="#" role="button">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/imagen6.jpg" alt="tercera imagen">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Genera ingresos vendiendo</h1>
                        <p>Emprende tu negocio desde casa</p>
                        <p><a class="btn btn-lg btn-default" href="#" role="button">Registrate</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controlsss -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!--
<div class="jumbotron">
    <div class="container">
        <h1>MaretPlace</h1>
        <p>
            Beta
        </p>
    </div>
</div>
<!-- FIN CARRUSEL-->

<!--
<div class="container">
    <div class="jumbotron">
        <h1>Marketplace</h1>
        <p>Imagenes</p>
    </div>   
</div>
-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            nada
                        </div>
                        <div class="panel-body">
                            nada
                        </div>
                        <div class="panel-heading">
                            nada
                        </div>
                        <div class="panel-body">
                            nada
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Productos</h4>
                        </div>
                        <div class="panel-body">
                            <?php
                            EscritorEntradas::escribir_entradas();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>