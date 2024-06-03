<?php
class User {
    public $userID = "";
    public $nombre = "";
    public $email = "";
    public $password = "";
    public $foto = "";
    public $preguntas;
    public $respuestas;

    public function __construct() {
        $this->foto = "default.jpg";
        $this->preguntas = 0;
        $this->respuestas = 0;
    }
}