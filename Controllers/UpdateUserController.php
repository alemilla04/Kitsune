<?php
require_once(__DIR__ . "/../Models/Autoload.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id = $_SESSION["id_user"];
    $nombre = $_POST["name"];
    $email = $_POST["mail"];

    $_SESSION["OK"] = true;

    if($nombre != ""){
        $_SESSION["user"]["nombre"] = $nombre;
    } else {
        $_SESSION["errorNombre"] = "El nombre no puede estar vacío";
        $_SESSION["OK"] = false;
    }
    if($email != ""){
        if(checkEmail($email)){
            $_SESSION["user"]["email"] = $email;
        } else{
            $_SESSION["errorEmail"] = "Error en el formato del email";
            $_SESSION["OK"] = false;
        }
    } else {
        $_SESSION["errorEmail"] = "El email no puede estar vacío";
        $_SESSION["OK"] = false;
    }
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['imagen']['name'];
        $_SESSION["usuarioObjeto"]["foto"] = $foto;
        $_SESSION["foto"] = $foto;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../Content/profile_pics/" . $foto);
    }
    if($_SESSION["OK"]){
        $usuario = new User();
        $usuario->nombre = $nombre;
        $usuario->email = $email;
        if(!empty($foto)){
            $usuario->foto = $foto;
        }else{
            $usuario->foto = $_SESSION["foto"];
        }
        $ok = updateDataUser($usuario,$id);
        if($ok){
            $_SESSION["usera"] = "Su usuario se actualizo";
            $usuarioBBDD = selectUser($email);
            unset($_SESSION["usuarioObjeto"]);
            $_SESSION["usuarioObjeto"] = $usuarioBBDD;
            header("Location: ".APP_FOLDER."/../Views/UpdateData.php");
        }else{
            $_SESSION["usere"] = "No se puedo actualizar :V";
            header("Location: ".APP_FOLDER."/../Views/Home.php");
        }
    }
}
?>