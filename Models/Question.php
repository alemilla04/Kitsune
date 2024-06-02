<?php
class Question {
    public $titulo = "";
    public $cuerpo = "";
    public $etiqueta = "";
    public $userID = "";
    public $guest_nombre = "";
    public $guest_email = "";
    public $fecha = "";
    public $respuesta = "";

    public function __construct() {
        $this->respuesta = 0;
        $this->userID = NULL;
        $this->guest_nombre = NULL;
        $this->guest_email = NULL;
    }
}