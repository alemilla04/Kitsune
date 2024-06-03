<?php
class Question {
    public $preguntaID = "";
    public $titulo = "";
    public $cuerpo = "";
    public $etiqueta = "";
    public $userID = "";
    public $guest_nombre = "";
    public $guest_email = "";
    public $fecha = "";
    public $respuestas = "";
    public $vistas = "";

    public function __construct() {
        $this->respuestas = 0;
        $this->userID = NULL;
        $this->guest_nombre = NULL;
        $this->guest_email = NULL;
        $this->vistas = 0;
    }
}