<?php
    class Response{
        public $preguntaID = "";
        public $cuerpo = "";
        public $userID = "";
        public $fecha = "";
        public $puntuacion = "";
    
    public function __construct() {
        $this->preguntaID = 0;
        $this->userID = 0;
        $this->puntuacion = 0;
    }
}
?>