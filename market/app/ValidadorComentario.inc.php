<?php

include_once 'RepositorioComentario.inc.php';

class ValidadorComentario {
        
    private $aviso_inicio;
    private $aviso_cierre;
    
    private $titulo;
    private $texto;
    
    private $error_titulo;
    private $error_texto;
    
    public function __construct($titulo, $texto, $conexion){
        $this -> aviso_inicio = "<bt><div class='alert alert-danger' role='alert'>";
        $this -> aviso_cierre = "</div>";
        
        $this -> titulo = "";
        $this -> texto = "";
        
        $this -> error_titulo = $this -> validar_titulo($conexion, $titulo);
        $this -> error_texto = $this -> validar_texto($conexion, $texto);
       
    }
    
    private function variable_iniciada($variable){
        if (isset($variable) && !empty($variable)){
            return true;
        } else {
            return false;
        }
    }
    
    private function validar_titulo($conexion, $titulo){
        if(!$this -> variable_iniciada($titulo)){
            return "Debes escribir un titulo";
        } else {
            $this -> titulo = $titulo;
        }
        if (strlen($titulo) > 255){
            return "El titulo no puede ocupar más de 255 caracteres";
            
        }
        if (RepositorioComentario :: titulo_existe($conexion, $titulo)){
            return "Ya existe una entrada con ese titulo, asigna otro";
        }
    }
    
    private function validar_texto($conexion, $texto){
        if (!$this -> variable_iniciada($texto)) {
            return "El contenido no puede estar vacio";
        } else {
            $this -> texto = $texto;
        }
    }
    
    public function obtener_titulo(){
        return $this->titulo;
    }
    public function obtener_texto(){
        return $this->texto;
    }
    
    public function mostrar_titulo(){
        if($this->titulo != ""){
            echo 'value = "' .$this->titulo . '"';
        }
    }
    public function mostrar_texto(){
        if ($this->texto != "" && strlen(trim($this->texto)) >0){
            echo $this-> texto;
        }
    }
    
    public function mostrar_error_titulo(){
        if($this->error_titulo != ""){
            echo $this->aviso_inicio . $this->error_titulo . $this->aviso_cierre;
        }
    }
    public function mostrar_error_texto(){
        if($this->error_texto != ""){
            echo $this->aviso_inicio . $this->error_texto . $this->aviso_cierre;
        }
    }
    
    public function comentario_validado(){
        if ($this -> error_titulo == "" && $this -> error_texto == ""){
            return true;
        } else {
            return false;
        }
    }
    
}
