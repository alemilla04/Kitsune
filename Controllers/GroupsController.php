<?php
require_once(__DIR__ . "/../Models/Funciones.php");
require_once(__DIR__ . "/../Models/Experience.php");
session_start();

function insertGuestsExperience($experiencia){
    global $pdo,$cfg;

    $pdo = connectDb();

    $sql = "INSERT INTO ". $cfg["mysqlTable"]["table2"] ."(name,texto1,texto2) VALUES (:name,:texto1,:texto2)";
    $resultado = $pdo->prepare($sql);
    $resultado->execute([':name' => $experiencia->name,':texto1' => $experiencia->opinion,":texto2"=>$experiencia->puntuaje]);

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["nombre"];
    $texto1 = $_POST["texto1"];
    $texto2 = $_POST["texto2"];
    if(empty($usuario)){
        $_SESSION["error"] = "Falta el nombre";
    }
    if(empty($texto1)){
        $_SESSION["error2"] = "Falta la opinion";
    }
    if(empty($texto2)){
        $_SESSION["error3"] = "Falta el puntuaje";
    }

    if(empty($_SESSION["error"]) && empty($_SESSION["error2"]) && empty($_SESSION["error3"])){
        $experiencia = new Experience();
        $experiencia->name = $usuario;
        $experiencia->opinion = $texto1;
        $experiencia->puntuaje = $texto2;
        insertGuestsExperience($experiencia);
        header("Location:../Views/ShowMessagesGroups.php");
    }else{
        header("Location:../Views/Groups.php");
    }
}else{
    header("location:../Views/Groups.php");
}
?>