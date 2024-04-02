<?php
require_once(__DIR__ ."/../includes/funciones.php");
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el valor del campo "usuario"
    $user = recoge("user");

    // Obtener el valor del campo "contraseña"
    $pass = recoge("pass");

    // Ahora puedes usar $usuario y $contraseña para realizar cualquier acción que necesites
    // Por ejemplo, podrías imprimirlos:
    // Esto es provisional, hasta que no se haga una Base de datos
    $usuario = "pepe";
    $password = "1234";

    if($user == $usuario && $pass == $password){
        // Aqui se pondria la redirección a la web
        var_dump($_POST);
    }else{
        $_SESSION["errorLogin"]="<p class='error'>El usuario o la contraseña no son correctos</p>";
        header("location:../frontend/login.php");
    }
}
?>