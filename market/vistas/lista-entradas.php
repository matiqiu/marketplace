<?php
//phpinfo();

include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/EscritorEntradas.inc.php';

include_once 'app/EscritorEntradas.inc.php';

$titulo = 'entradas';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

include_once 'app/escritorEntradas.inc.php';
include_once 'app/entrada.inc.php';




EscritorEntradas::escribir_entradas();


    include_once 'plantillas/documento-cierre.inc.php';
?>