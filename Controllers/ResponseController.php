<?php
require_once(__DIR__ . "/../Models/Autoload.php");
if(isset($_SESSION["usuarioObjeto"])){
    $usuario = $_SESSION["usuarioObjeto"];
}else{
    $usuario = "kk";
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $cuerpo = $_POST["cuerpo"];

    $_SESSION["OK"] = true;

    if($cuerpo != ""){
        $_SESSION["user"]["cuerpo"] = $nombre;
    } else {
        $_SESSION["errorCuerpo"] = "El nombre no puede estar vacío";
        $_SESSION["OK"] = false;
    }
    if($_SESSION["OK"]){
        $fecha_actual = date('Y-m-d H:i:s');

        $question = new Response();
        $question->cuerpo = $cuerpo;
        $question->userID = $usuario['userID'];// De esta no me fio mucho 20:49
        $question->preguntaID = $_SESSION["responseId"]; // De esta no me fio mucho 20:49
        unset($_SESSION["responseId"]);
        $question->fecha = $fecha_actual;
        $ok = insertResponse($question);
        if($ok){
            $_SESSION["responsea"] = "Su respuesta se ha hecho";
            header("Location: ".APP_FOLDER."/../Views/UpdateData.php");
        }else{
            $_SESSION["usere"] = "No se ha podido insertar :V";
            header("Location: ".APP_FOLDER."/../Views/Home.php");
        }
        // public $preguntaID;
        // public $cuerpo;
        // public $userID;
        // public $fecha;
    }
}
?>