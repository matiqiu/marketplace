<?php

include_once 'RepositorioPerfil.inc.php';

class ValidadorPerfil {

    private $aviso_inicio;
    private $aviso_cierre;
    private $celular;
    private $facebook;
    private $twitter;
    private $instagram;
    private $error_celular;
    private $error_facebook;
    private $error_twitter;
    private $error_instagram;

    public function __construct($celular, $facebook, $twitter, $instagram, $conexion) {
        $this->aviso_inicio = "<bt><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";

        $this->celular = "";
        $this->facebook = "";
        $this->twitter = "";
        $this->instagram = "";

        $this->error_celular = $this->validar_celular($conexion, $celular);
        $this->error_facebook = $this->validar_facebook($conexion, $facebook);
        $this->error_twitter = $this->validar_twitter($conexion, $twitter);
        $this->error_instagram = $this->validar_instagram($conexion, $instagram);
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validar_celular($conexion, $celular) {
        if (!$this->variable_iniciada($celular)) {
            return "Debes escribir un celular";
        } else {
            $this->celular = $celular;
        }
        if (strlen($celular) > 12) {
            return "El celular no puede exceder los 12 digitos";
        }
    }

    private function validar_facebook($conexion, $facebook) {
        if (!$this->variable_iniciada($facebook)) {
            return "El contenido no puede estar vacio";
        } else {
            $this->facebook = $facebook;
        }
    }

    private function validar_twitter($conexion, $twitter) {
        if (!$this->variable_iniciada($twitter)) {
            return "El contenido no puede estar vacio";
        } else {
            $this->twitter = $twitter;
        }
    }

    private function validar_instagram($conexion, $instagram) {
        if (!$this->variable_iniciada($instagram)) {
            return "El contenido no puede estar vacio";
        } else {
            $this->instagram = $instagram;
        }
    }

    public function obtener_celular() {
        return $this->celular;
    }

    public function obtener_facebook() {
        return $this->facebook;
    }

    public function obtener_twitter() {
        return $this->twitter;
    }

    public function obtener_instagram() {
        return $this->instagram;
    }

    public function mostrar_celular() {
        if ($this->celular != "") {
            echo 'value = "' . $this->celular . '"';
        }
    }

    public function mostrar_facebook() {
        if ($this->facebook != "" && strlen(trim($this->facebook)) > 0) {
            echo $this->facebook;
        }
    }

    public function mostrar_twitter() {
        if ($this->twitter != "" && strlen(trim($this->twitter)) > 0) {
            echo $this->twitter;
        }
    }

    public function mostrar_instagram() {
        if ($this->instagram != "" && strlen(trim($this->instagram)) > 0) {
            echo $this->instagram;
        }
    }

    public function mostrar_error_celular() {
        if ($this->error_celular != "") {
            echo $this->aviso_inicio . $this->error_celular . $this->aviso_cierre;
        }
    }

    public function mostrar_error_facebook() {
        if ($this->error_facebook != "") {
            echo $this->aviso_inicio . $this->error_facebook . $this->aviso_cierre;
        }
    }

    public function mostrar_error_twitter() {
        if ($this->error_twitter != "") {
            echo $this->aviso_inicio . $this->error_twitter . $this->aviso_cierre;
        }
    }

    public function mostrar_error_instagram() {
        if ($this->error_instagram != "") {
            echo $this->aviso_inicio . $this->error_instagram . $this->aviso_cierre;
        }
    }

    public function perfil_valido() {
        if ($this->error_celular == "" && 
                $this->error_facebook == "" && 
                $this->error_twitter == "" && 
                $this->error_instagram == "") {
            return true;
        } else {
            return false;
        }
    }

}
