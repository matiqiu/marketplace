<?php

$destinatario = "n8qzjyr1vcbaz@mail-temp.org";
$asunto = "prueba de email";
$mensaje = "esto es una prueba";

$exito = mail($destinatario, $asunto, $mensaje);

if ($exito){
    echo 'email enviado';
} else{
    echo 'email fallido';
}