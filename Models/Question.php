<?php
class Question {
    public $titulo = "";
    public $cuerpo = "";
    public $etiquetas;

    public function __construct() {
        $this->etiquetas = array();
    }
}