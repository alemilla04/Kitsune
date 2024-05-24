<?php
session_start();
require_once(__DIR__ . "/../Models/Funciones.php");
require_once(__DIR__ . "/../Models/Config.php");
require_once(__DIR__ . "/../Models/Question.php");

// print "<pre>";
// var_dump($_SESSION['usuarioObjeto']);
// print "</pre>";
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
        $fechaHoy = date("Y-m-d H:i:s");
        $question->fecha = $fechaHoy;
        
        if(isset($_SESSION["usuarioObjeto"])){
            $usuario = selectUser($_SESSION["usuarioObjeto"]["email"]);
            if($usuario!=null){
                $question->userID = $usuario['userID'];
                $insertarOK = insertUsersQuestion($question);
                
                if(!$insertarOK){
                    $_SESSION["insertarError"] = "Error al crear la pregunta";
                    header("Location: ".APP_FOLDER."/../Views/MakeQuestion.php");
                    exit();
                } else {
                    $_SESSION["insertarOk"] = "Pregunta creada correctamente";
                    $usuario['preguntas'] = $usuario['preguntas'] + 1; 
                    
                    updateUser($usuario);
                    
                    // if(!$updateOK){
                    //     $_SESSION['updateError'] = "no se ha podido actualizar";    
                    // } else {
                    //     $_SESSION['updateOK'] = "se pudo actualizar";
                    // }
                    header("Location: ".APP_FOLDER."/../Views/Questions.php");
                    unset($_SESSION['question']);
                    exit();
                }
            }

        } else {
            $nombre = $_POST["guest_nombre"];
            $email = $_POST["guest_email"];

            if($nombre != ""){
                $_SESSION["question"]["guest_nombre"] = $nombre;
                $question->guest_nombre = $nombre;
            }

            if($email != ""){
                if(checkEmail($email)){
                    $_SESSION["question"]["guest_email"] = $email;
                    $question->guest_email = $email;
                } else {
                    $_SESSION["errorEmail"] = "Error en el formato del email";
                    header("Location: ".APP_FOLDER."/../Views/MakeQuestion.php");
                    exit();
                }
            } else {
                $_SESSION["errorEmail"] = "El email no puede estar vacío";
                header("Location: ".APP_FOLDER."/../Views/MakeQuestion.php");
                exit();
            }
            
            $insertGuestsQuestion = insertGuestsQuestion($question);

            if(!$insertGuestsQuestion) {
                $_SESSION["insertarErrorGuest"] = "Error al crear la pregunta";
                header("Location: ".APP_FOLDER."/../Views/MakeQuestion.php");
                exit();
            } else {
                $_SESSION["insertarOk"] = "Pregunta creada correctamente";
                header("Location: ".APP_FOLDER."/../Views/Questions.php");
                unset($_SESSION['question']);
                exit();
            }

        }

    } else {
        header("Location: ".APP_FOLDER."/../Views/MakeQuestion.php");
    }
    
}