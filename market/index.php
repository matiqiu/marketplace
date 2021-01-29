<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';
include_once 'app/Perfil.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';
include_once 'app/RepositorioPerfil.inc.php';

$componentes_url = parse_url($_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'vistas/404.php';

if ($partes_ruta[0] == 'market') {
    if (count($partes_ruta) == 1) {
        $ruta_elegida = 'vistas/inicio.php';
    } else if (count($partes_ruta) == 2) {
        switch ($partes_ruta[1]) {
            case 'login':
                $ruta_elegida = 'controladores/controlador-login.php';
                break;
            case 'logout':
                $ruta_elegida = 'controladores/controlador-logout.php';
                break;
            case 'registro':
                $ruta_elegida = 'controladores/controlador-registro.php';
                break;
            case 'gestor':
                $ruta_elegida = 'controladores/controlador-gestor.php';
                $gestor_actual = '';
                break;
            case 'relleno-dev':
                $ruta_elegida = 'scripts/script-relleno.php';
                break;
            case 'lista-entradas':
                $ruta_elegida = 'scripts/lista-entradas.php';
                break;
            case 'nueva-entrada':
                $ruta_elegida = 'controladores/controlador-nueva-entrada.php';
                break;
            case 'borrar-entrada':
                $ruta_elegida = 'scripts/borrar-entrada.php';
                break;
            case 'editar-entrada':
                $ruta_elegida = 'controladores/controlador-editar-entrada.php';
                break;
            case 'recuperar-clave':
                $ruta_elegida = 'controladores/controlador-recuperar-clave.php';
                break;
            case 'generar-url-secreta':
                $ruta_elegida = 'scripts/generar-url-secreta.php';
                break;
            case 'mail':
                $ruta_elegida = 'vistas/prueba-mail.php';
                break;
            case 'buscar':
                $ruta_elegida = 'controladores/controlador-buscar.php';
                break;

            case 'prueba-api':
                $ruta_elegida = 'vistas/prueba-api.php';
                break;
            case 'crear-perfil':
                $ruta_elegida = 'vistas/crear-perfil.php';
                break;
        }
    } else if (count($partes_ruta) == 3) {
        if ($partes_ruta[1] == 'registro-correcto') {
            $nombre = $partes_ruta[2];
            $ruta_elegida = 'vistas/registro-correcto.php';
        }
        if ($partes_ruta[1] == 'entrada') {
            $url = $partes_ruta[2];

            Conexion::abrir_conexion();
            $entrada = RepositorioEntrada :: obtener_entrada_por_url(Conexion::obtener_conexion(), $url);

            if ($entrada != null) {
                $autor = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $entrada->obtener_autor_id());
                $comentarios = RepositorioComentario::obtener_comentarios(Conexion::obtener_conexion(), $entrada->obtener_id());
                $entradas_azar = RepositorioEntrada::obtener_entradas_al_azar(Conexion::obtener_conexion(), 3);

                $ruta_elegida = 'vistas/entrada.php';
            }
        }
        if ($partes_ruta[1] == 'gestor') {
            switch ($partes_ruta[2]) {
                case 'entradas';
                    $gestor_actual = 'entradas';
                    $ruta_elegida = 'controladores/controlador-gestor.php';
                    break;
                case 'comentarios';
                    $gestor_actual = 'comentarios';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
                case 'favoritos';
                    $gestor_actual = 'favoritos';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
            }
        }
        if ($partes_ruta[1] == 'recuperacion-clave') {
            $url_personal = $partes_ruta[2];
            $ruta_elegida = 'vistas/recuperacion-clave.php';
        }
       /* if ($partes_ruta[1] == 'perfil2') {
            $nombre = $partes_ruta[2];

            Conexion::abrir_conexion();
            $usuario = RepositorioUsuario :: obtener_usuario_por_nombre(Conexion::obtener_conexion(), $nombre);


            if ($usuario != null) {

                $perfil = RepositorioPerfil :: obtener_perfil_por_id(Conexion::obtener_conexion(), $usuario->obtener_id());

                $perfil2 = RepositorioPerfil::obtener_perfil(Conexion::obtener_conexion(), $usuario->obtener_id());
                $autor = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $perfil2->obtener_usuario_id());
                $ruta_elegida = 'vistas/perfil2.php';
            }
        }
        * 
        */
        if ($partes_ruta[1] == 'perfil') {
            $nombre = $partes_ruta[2];

            Conexion::abrir_conexion();
            $usuario = RepositorioUsuario :: obtener_usuario_por_nombre(Conexion::obtener_conexion(), $nombre);
            
            if ($usuario != null) {
                $perfil2 = array();
                
                $autor = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $usuario->obtener_id());
                $perfil1 = RepositorioPerfil :: obtener_perfil_por_id(Conexion::obtener_conexion(), $usuario->obtener_id());
                $perfil2 = RepositorioPerfil::obtener_perfil(Conexion::obtener_conexion(), $usuario->obtener_id());
                $perfiles = RepositorioPerfil::obtener_perfil(Conexion::obtener_conexion(), $usuario->obtener_id());
                $ruta_elegida = 'vistas/perfil.php';
            }
        }
        /*
        if ($partes_ruta[1] == 'crear-perfil') {
            $nombre = $partes_ruta[2];

            Conexion::abrir_conexion();
            $usuario = RepositorioUsuario :: obtener_usuario_por_nombre(Conexion::obtener_conexion(), $nombre);


            if ($usuario != null) {
                
                $autor = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $usuario->obtener_id());
                $perfil = RepositorioPerfil::obtener_perfil(Conexion::obtener_conexion(), $usuario->obtener_id());

                $ruta_elegida = 'vistas/crear-perfil.php';
            }
        }
         * 
         */
    }
}


include_once $ruta_elegida;

/*
if ($partes_ruta[2] == 'registro') {
    include_once 'vistas/registro.php';
} else if ($partes_ruta[2] == 'login'){
    include_once 'vistas/login.php';
}else if ($partes_ruta[1] == 'guia-turistica2') {
    include_once 'vistas/inicio.php';
} else {
    echo '404';
}
 * 
 * 
 * 
 * if ($partes_ruta[2] == 'registro-correcto') {
            $nombre = $partes_ruta[3];
            $ruta_elegida = 'vistas/registro-correcto.php';
        }
        if ($partes_ruta[2] == 'entrada') {
            $url = $partes_ruta[3];

            Conexion::abrir_conexion();
            $entrada = RepositorioEntrada :: obtener_entrada_por_url(Conexion::obtener_conexion(), $url);

            if ($entrada != null) {
                $autor = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $entrada->obtener_autor_id());
                $entradas_azar = RepositorioEntrada::obtener_entradas_al_azar(Conexion::obtener_conexion(), 3);

                $ruta_elegida = 'vistas/entrada.php';
            }
        }
 * 
 */