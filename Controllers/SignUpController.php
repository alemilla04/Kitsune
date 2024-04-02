<?php
session_start();
require_once(__DIR__."/../Models/User.php");
require_once(__DIR__."/../Models/Config.php");
require_once(__DIR__."/../Models/Funciones.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $_SESSION["OK"] = true;

    if($nombre != ""){
        $_SESSION["user"]["name"];
    } else {
        $_SESSION["errorNombre"] = "El nombre no puede estar vacío";
        $_SESSION["OK"] = false;
    }

    if($email != ""){
        if(checkEmail($email)){
            $_SESSION["user"]["email"];
        }
        $_SESSION["errorEmail"] = "Error en el formato del email";
        $_SESSION["OK"] = false;
    } else {
        $_SESSION["errorEmail"] = "El email no puede estar vacío";
        $_SESSION["OK"] = false;
    }

    if($password != ""){
        if($password2 != ""){
            if(checkPassword($password)){
                if($password === $password2) {
                    $_SESSION["user"]["password"];
                }
            } else {
                $_SESSION["errorPassword"] = "La contraseña debe contener 8 o más carácteres";        
                $_SESSION["OK"] = false;
            }
        } else {
            $_SESSION["errorRepitePassword"] = "La contraseña no puede estar vacía";    
            $_SESSION["OK"] = false;
        }
    } else{
        $_SESSION["errorPassword"] = "La contraseña no puede estar vacía";
        $_SESSION["OK"] = false;
    }

    if($_FILES["picture"]["error"] == UPLOAD_ERR_OK){
        $nombreFichero = $_FILES["picture"]["name"];
        move_uploaded_file($_FILES["picture"]["tmp_name"], "../Content/profile_pics/". $_FILES["picture"]["name"]);
    }

    if($_SESSION["OK"] == true){
        $user = new User;
        $user->name = $nombre;
        $user->email = $email;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $user->password = $passwordHash;

        if($_FILES["picture"]["error"] == UPLOAD_ERR_OK){
            $user->picture = $nombreFichero;
        }

        $insertarOK = insertDb($user);

        if(!$insertarOK) {
            $_SESSION["errorInsertar"] = "Error al registrar usuario";
            $_SESSION["insertarOK"] = false;
        } else {
            $_SESSION["insertarOK"] = true;
        }

        unset($_SESSION["user"]);
        header("Location: ".APP_FOLDER."/../Views/SignUp.php");  
        exit();  
    } else {
        header("Location: ".APP_FOLDER."/../Views/SignUp.php");  
        exit();  
    }

} else {
    header("Location: ".APP_FOLDER."/../Views/Home.php");
    exit();
}