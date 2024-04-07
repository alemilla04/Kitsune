<?php
class User {
    public $nombre = "";
    public $email = "";
    public $password = "";
    public $foto = "";

    public function __construct() {
        $this->foto = "default.jpg";
    }
}