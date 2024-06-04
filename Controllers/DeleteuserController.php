<?php
require_once(__DIR__ . "/../Models/Autoload.php");

if(isset($_SESSION["id_user"])){
    $usuario = $_SESSION["id_user"];
    unset($_SESSION["id_user"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Si'])) {
        deleteUser($usuario);
        unset($_SESSION["usuarioObjeto"]);
        header("Location:../Views/Home.php");
    } elseif (isset($_POST['No'])) {
        header("Location:../Views/Settings.php");
    }
}
?>