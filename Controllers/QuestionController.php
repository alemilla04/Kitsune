<?php
session_start();
require_once(__DIR__ . "/../Models/Funciones.php");
require_once(__DIR__ . "/../Models/Config.php");
require_once(__DIR__ . "/../Models/Question.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $titulo = $_POST["titulo"];
    $cuerpo = $_POST["cuerpo"];
    $etiqueta = $_POST["etiqueta"];
    $_SESSION["datosOk"] = true;

    if($titulo != ""){
        $_SESSION["question"]["titulo"] = $titulo;
    } else {
        $_SESSION["errorTitulo"] = "El título no puede estar vacío.";
        $_SESSION["datosOk"] = false;
    }

    if($cuerpo != ""){
        $_SESSION["question"]["cuerpo"] = $cuerpo;
    } else {
        $_SESSION["errorCuerpo"] = "El cuerpo no puede estar vacío.";
        $_SESSION["datosOk"] = false;
    }

    if($etiqueta != ""){
        $_SESSION["question"]["etiqueta"] = $etiqueta;
    } else {
        $_SESSION["errorEtiqueta"] = "La etiqueta no puede estar vacío.";
        $_SESSION["datosOk"] = false;
    }

    if($_SESSION["datosOk"]){
        $question = new Question();
        $question->titulo = $titulo;
        $question->cuerpo = $cuerpo;
        $question->etiqueta = $etiqueta;
        
        if(isset($_SESSION["usuarioObjeto"])){
            $usuario = selectUser($_SESSION["usuarioObjeto"]["email"]);
            if($usuario!=null){
                $question->userID = $usuario['userID'];
                $insertarOK = insertUsersQuestion($question);

                if(!$insertarOK){
                    
                }
            }

        } else {
            $nombre = $_POST["guest_nombre"];
            $email = $_POST["guest_email"];
        }

    } else {
        header("Location: ".APP_FOLDER."MakeQuestion.php");
    }
    
}