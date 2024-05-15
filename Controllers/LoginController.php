<?php
require_once(__DIR__ . "/../Models/funciones.php");
session_start();
global $cfg, $pdo;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["user"];
    $contrasena = $_POST["pass"];
    // $pdo = connectDb();

    // $sql = "SELECT * FROM $cfg[mysqlTable] WHERE Email = :email";
    // $resultado = $pdo->prepare($sql);
    // $resultado->execute([':email' => $usuario]);
    // $usuario = $resultado->fetch();
    $usuarioBBDD = selectUser($usuario);

    if ($usuarioBBDD) {
        if (password_verify($contrasena, $usuarioBBDD['contraseña'])) {
            $_SESSION["usuarioObjeto"] = $usuarioBBDD;
            header("Location:../Views/Questions.php");
            exit;
        } else {
            $_SESSION["errorLogin"] = "Contraseña incorrecta.";
            header("Location:../Views/Login.php");
            exit;
        }
    } else {
        $_SESSION["errorLogin"] = "Usuario no encontrado.";
        header("Location:../Views/Login.php");
        exit();
    }
}
