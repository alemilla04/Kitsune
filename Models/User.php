<?php
class User {
    public $name = "";
    public $surname = "";
    public $email = "";
    public $password = "";
    public $picture = "";

    public function __construct() {
        $this->picture = "default.jpg";
    }
}