<?php

class Perfil {

    private $id;
    private $usuario_id;
    private $celular;
    private $facebook;
    private $twitter;
    private $instagram;

    public function __construct($id, $usuario_id, $celular, $facebook, $twitter, $instagram) {
        $this->id = $id;
        $this->usuario_id = $usuario_id;
        $this->celular = $celular;
        $this->facebook = $facebook;
        $this->twitter = $twitter;
        $this->instagram = $instagram;
    }
    
    public function obtener_id(){
        return $this -> id;
    }
    public function obtener_usuario_id(){
        return $this ->usuario_id;
    }
    public function obtener_celular(){
        return $this ->celular;
    }
    public function obtener_facebook(){
        return $this ->facebook;
    }
    public function obtener_twitter(){
        return $this ->twitter;
    }
    public function obtener_instagram(){
        return $this ->instagram;
    }
    
    public function cambiar_celular($celular){
        $this-> celular = $celular;
    }
    public function cambiar_facebook($facebook){
        $this-> facebook = $facebook;
    }
    public function cambiar_twitter($twitter){
        $this-> twitter = $twitter;
    }
    public function cambiar_instagram($instagram){
        $this-> instagram = $instagram;
    }
}
