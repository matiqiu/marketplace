<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

Conexion::Abrir_conexion();

/*
for ($usuarios = 0; $usuarios < 10; $usuarios++){
    $nombre = sa(10);
    $email = sa(5).'@' .sa(3);
    $clave = password_hash('123456', PASSWORD_DEFAULT);
    
    $usuario = new Usuario('',$nombre,$email,$clave,'','');
    repositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
}

for ($entradas = 0; $entradas < 10; $entradas++){
    $titulo = sa(10);
    $url = $titulo;
    $texto = lorem();
    $autor = rand(1,10);
    
    $entrada = new Entrada('', $autor,$url,$titulo,$texto,'','');
    repositorioEntrada::insertar_entrada(Conexion::obtener_conexion(), $entrada);
}
for ($comentarios = 0; $comentarios < 10; $comentarios++){
    $titulo = sa(10);
    $texto = lorem();
    $autor = rand(1,10);
    $entrada = rand(1,10);
    
    $comentario = new Comentario('', $autor,$entrada,$titulo,$texto,'');
    repositorioComentario::insertar_comentario(conexion::obtener_conexion(), $comentario);
}

function sa($longitud){
    $caracteres = '0123456789qwertyuiopasdfghjklñzxcvbnmQWERTYUIOPASDFGHJKLÑZXCVBNM';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';
    
    for ($i = 0; $i < $longitud; $i++){
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }
    
    return $string_aleatorio;
}

function lorem() {
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla posuere dui at libero vulputate, vitae dapibus sem tempor. Nullam pretium, dolor tincidunt aliquam efficitur, orci magna hendrerit nulla, sed mattis neque tellus vitae nisi. Praesent vitae ultrices nulla. Etiam quis euismod neque. Nulla eu maximus neque, ut ornare quam. Fusce eget magna nec dui auctor tempor molestie laoreet nunc. Sed ut lorem eu felis sollicitudin pellentesque eu sed lectus. Aenean finibus sem eu nunc pharetra varius.

Vestibulum porta, augue in tempor finibus, dolor felis vestibulum augue, eget placerat metus justo vitae tellus. Fusce leo ante, rhoncus in volutpat et, fringilla semper tortor. Praesent tincidunt velit aliquam ipsum eleifend egestas. Integer a dui tincidunt, porta dolor ac, iaculis dolor. Aenean varius, lacus tempor pretium ullamcorper, sem nunc rutrum erat, in tincidunt libero sapien sed diam. Sed id augue porta, tempus neque id, maximus ante. Maecenas ultrices accumsan elit vitae convallis. Ut hendrerit erat in quam condimentum condimentum. Morbi vel molestie tellus. Vivamus consequat id ex non placerat. Phasellus nibh ligula, iaculis at pharetra eget, blandit eget nisi. In ultrices neque nec elit dignissim volutpat. Maecenas ultricies nibh vitae est sagittis rutrum. Donec at tempor diam.

Maecenas porta ultricies iaculis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu felis sem. Etiam et lobortis elit, sit amet consectetur ligula. Donec ac elit eget libero porta malesuada. Duis ipsum massa, porttitor in vulputate in, condimentum ultricies nisl. Sed ut velit sed turpis sollicitudin malesuada sit amet non metus. Cras ornare mollis libero, nec ultricies ante. Etiam eu imperdiet arcu. In volutpat gravida pretium. Fusce sit amet condimentum felis. Quisque efficitur arcu eu augue consequat, quis placerat ipsum molestie.

Nulla facilisi. Pellentesque finibus erat gravida placerat bibendum. Suspendisse id sagittis enim. Duis ut sodales massa. Nunc ac erat quam. Curabitur gravida maximus nunc varius iaculis. Aenean eleifend justo vel magna blandit feugiat. Integer volutpat, metus et placerat condimentum, arcu dui tincidunt eros, et viverra lacus tellus ut nulla. Quisque tincidunt augue sed varius porta. Phasellus ornare felis volutpat, molestie velit et, venenatis ligula.

Pellentesque malesuada est sit amet velit lobortis, vel lacinia nunc luctus. Nullam vel felis malesuada, porttitor massa at, ornare orci. Nullam semper lorem commodo vulputate malesuada. Aliquam lacinia leo a aliquam ornare. Nunc a ipsum sem. Cras condimentum vulputate est eget volutpat. Praesent vehicula augue justo, quis volutpat felis hendrerit a. Pellentesque in tincidunt eros. Curabitur viverra tincidunt nisl, sit amet suscipit lectus commodo at. Morbi sed congue justo. Nulla facilisi.';
    
    return $lorem;
}
 * 
 */

for ($usuarios = 0; $usuarios < 10; $usuarios++){
    $nombre = sa(10);
    $email = sa(5).'@' .sa(3);
    $clave = password_hash('123456', PASSWORD_DEFAULT);
    
    $usuario = new Usuario('',$nombre,$email,$clave,'','');
    repositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
}

for ($entradas = 0; $entradas < 10; $entradas++){
    $titulo = sa(10);
    $url = $titulo;
    $texto = lorem();
    $autor = rand(1,10);
    
    $entrada = new Entrada('', $autor,$url,$titulo,$texto,'','');
    repositorioEntrada::insertar_entrada(Conexion::obtener_conexion(), $entrada);
}
for ($comentarios = 0; $comentarios < 10; $comentarios++){
    $titulo = sa(10);
    $texto = lorem();
    $autor = rand(1,10);
    $entrada = rand(1,10);
    
    $comentario = new Comentario('', $autor,$entrada,$titulo,$texto,'');
    repositorioComentario::insertar_comentario(conexion::obtener_conexion(), $comentario);
}

function sa($longitud){
    $caracteres = '0123456789qwertyuiopasdfghjklñzxcvbnmQWERTYUIOPASDFGHJKLÑZXCVBNM';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';
    
    for ($i = 0; $i < $longitud; $i++){
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }
    
    return $string_aleatorio;
}

function lorem() {
    $lorem = 'Descripción producto. Descripción producto. Descripción producto. Descripción producto. Descripción producto. '
            . 'Descripción producto. Descripción producto. Descripción producto. Descripción producto. Descripción producto. '
            . 'Descripción producto. Descripción producto. Descripción producto. Descripción producto. Descripción producto. ';
    
    return $lorem;
}