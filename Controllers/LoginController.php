<?php
require_once(__DIR__ . "/../Models/funciones.php");
session_start();
global $cfg, $pdo;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $datosOK = true;

    if($_POST["user"] != ""){
        $usuario = $_POST["user"];
        $_SESSION["usuarioLogin"]["usuario"] = $usuario;
    } else {
        $_SESSION["errorLoginUsuario"] = "Debe proporcionar el usuario";
        $datosOK = false;
    }

    if($_POST["pass"] != ""){
        $contrasena = $_POST["pass"];
    } else{
        $_SESSION["errorLoginPass"] = "Debe proporcionar la contraseña";
        $datosOK = false;
    }

    if($datosOK==true){
        $usuarioBBDD = selectUser($usuario);
    
        if ($usuarioBBDD) {
            if (password_verify($contrasena, $usuarioBBDD['contraseña'])) {
                $_SESSION["usuarioObjeto"] = $usuarioBBDD;
                header("Location:../Views/Questions.php");
                exit;
            } else {
                $_SESSION["errorLogin"] = "Contraseña incorrecta";
                header("Location:../Views/Login.php");
                exit;
            }
        } else {
            $_SESSION["errorLogin"] = "Usuario no encontrado";
            header("Location:../Views/Login.php");
            exit();
        }
    } else {
        header("Location:../Views/Login.php");
        exit();
    }
} else {
    header("Location: ".APP_FOLDER."/../Views/Home.php");
    exit();
}
