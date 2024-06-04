<?php
require_once(__DIR__ . "/../Models/Autoload.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $experiencia = $_POST["experiencia"];
        $opinion = $_POST["opinion"];

        if($name == ""){
            $_SESSION["ename"] = "Campo opinion vacio";
        }
        if($experiencia == ""){
            $_SESSION["eexperiencia"] = "Campo experiencia vacio";
        }
        if($opinion == ""){
            $_SESSION["eopinion"] = "Campo name vacio";
        }
        
        if(!isset($_SESSION["eopinion"]) && !isset($_SESSION["eexperiencia"]) && !isset($_SESSION["eopinion"])){
            $experiencie = new Experience();
            $experiencie->name = $name;
            $experiencie->experiencia = $experiencia;
            $experiencie->opinion = $opinion;
            insertGuestsExperience($experiencie);
            header("Location: ".APP_FOLDER."/../Views/Groups.php");  
        }else{
            header("Location: ".APP_FOLDER."/../Views/Home.php");  
        }
    }


?>