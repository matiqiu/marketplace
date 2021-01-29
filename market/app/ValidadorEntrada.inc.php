<?php

include_once 'RepositorioEntrada.inc.php';
include_once 'Validador.inc.php';

class ValidadorEntrada extends Validador {
        
    public function __construct($titulo, $valor, $url, $texto, $conexion){
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";
        
        $this->titulo="";
        $this->valor="";
        $this->url="";
        $this->texto="";
        
        $this-> error_titulo= $this->validar_titulo($conexion, $titulo);
        $this-> error_valor= $this->validar_valor($conexion, $valor);
        $this-> error_url= $this->validar_url($conexion, $url);
        $this-> error_texto= $this->validar_texto($conexion, $texto);
    }
    
    
}