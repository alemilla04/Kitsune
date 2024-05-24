<?php
class Question {
    public $titulo = "";
    public $cuerpo = "";
    public $etiqueta = "";
    public $userID = "";
    public $guest_nombre = "";
    public $guest_email = "";
    public $respuestas = "";
    public $fecha = "";

    public function __construct() {
        $this->respuestas = 0;
    }
}