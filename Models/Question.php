<?php
class Question {
    public $titulo = "";
    public $cuerpo = "";
    public $etiqueta = "";
    public $userID = "";
    public $guest_nombre = "";
    public $guest_email = "";
    public $fecha = "";
    public $respuestas = "";
    public $vistas = "";
    public $puntuacion = "";

    public function __construct() {
        $this->respuestas = 0;
        $this->userID = 0;
        $this->guest_nombre = NULL;
        $this->guest_email = NULL;
        $this->vistas = 0;
        $this->puntuacion = 0;
    }
}