<?php
require_once(__DIR__ . "/config.php");

function checkEmail($email) {
    if(!str_contains($email, '@') && 
    !str_contains($email, '.') && 
    strrpos($email, '@')>strrpos($email, '.')){
        return false;
    }

    return true;
}

function checkPassword($password){
    if(strlen($password)>=8){
        return true;
    }

    return false;
}

function connectDb(){

    global $cfg; 

    $dsn_conbbdd ="mysql:host=$cfg[mysqlHost];dbname=$cfg[mysqlDatabase];charset=utf8mb4";
    $dsn_sinbbdd ="mysql:host=$cfg[mysqlHost];charset=utf8mb4";

    $usuario = $cfg["mysqlUser"];
    $password = $cfg["mysqlPassword"];

    try{
        $tmp = new PDO($dsn_conbbdd, $usuario, $password);
    } catch (PDOException $e) {
        $tmp = new PDO($dsn_sinbbdd, $usuario, $password);
    } catch (PDOException $e) {
        return null;
        exit;
    } finally {
        $tmp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return $tmp;
    }
}

// TABLA USUARIOS
function selectUsers(){
    global $pdo, $cfg;

    $pdo = connectDb();
    $consulta = "SELECT * FROM " . $cfg["mysqlTable"]["table4"];

    $resultado = $pdo->query($consulta);

    if (!$resultado) {
        return false;
    } else {
        $listaUsuarios = array();
        
        foreach($resultado as $registro){
            $usuario = array("UserID" => $registro["UserID"], "Nombre" => $registro["Nombre"], "Email" => $registro["Email"], "Foto" => $registro["Foto"], "preguntas" => $registro["preguntas"], "respuestas" => $registro["respuestas"]);
            array_push($listaUsuarios, $usuario);
        }
        return $listaUsuarios;
    }
    // if(!$resultado){
    //     return false;
    // }else{
    //     print "    <table>\n";
    //     print "      <thead>\n";
    //     print "        <tr>\n";
    //     print "          <th>Nombre</th>\n";
    //     print "          <th>Email</th>\n";
    //     print "          <th>Contraseña</th>\n";
    //     print "          <th>Foto</th>\n";
    //     print "        </tr>\n";
    //     print "      </thead>\n";
    //     foreach ($resultado as $registro) {
    //         print "<tr>\n";
    //         print "<td>$registro[Nombre]</td>\n";
    //         print "<td>$registro[Email]</td>\n";
    //         print "<td>$registro[Password]</td>\n";
    //         print "<td>$registro[Foto]</td>\n";
    //         print "</tr>\n";
    //     }

    //     print "</table>";
    //     return true;
    // }
}

function selectUser($email) {
    global $cfg;
    global $pdo;

    $pdo = connectDb();

    $consulta = "SELECT * FROM " . $cfg["mysqlTable"]["table4"] ." WHERE email = :email";

    $resultado = $pdo->prepare($consulta);

    if(!$resultado) {
        return null;
    } elseif(!$resultado->execute([":email"=>$email])) {
        return null;
    }else{
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}

function selectExperiences(){
    global $cfg, $pdo;
    //Creamos el array
    $experiences = [];

    $pdo = connectDb();

    $query = "SELECT * FROM " . $cfg["mysqlTable"]["table2"];

    $resultado = $pdo->query($query);
    foreach ($resultado as $row) {
        $experiences[] = $row;
    }

    return $experiences;
}

function insertDb($usuario){
    global $pdo, $cfg;

    $pdo = connectDb();

    if($pdo != null){
        $consulta = "INSERT INTO " . $cfg["mysqlTable"]["table4"] ." (Nombre, Email, Contraseña, Foto)
                    VALUES (:nombre, :email, :contrasena, :foto)";

        $resultado = $pdo->prepare($consulta);

        if(!$resultado){
            return false;
        } elseif(!$resultado->execute([
            ":nombre" => $usuario->nombre,
            ":email" => $usuario->email,
            ":contrasena" => $usuario->password,
            ":foto" => $usuario->foto
        ])){
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}


function deleteDb($id){
    global $pdo, $cfg;

    $pdo = connectDb();

    $consulta = "DELETE FROM " . $cfg["mysqlTable"]["table4"] ." WHERE UserId = :id";
    
    $resultado = $pdo->prepare($consulta);

    if(!$resultado){
        return false;
    }elseif(!$resultado->execute([":id"=>$id])){
        return false;
    }else{
        return true;
    }
}

function updateDb($user){
    global $pdo, $cfg;

    $pdo = connectDb();

    $consulta = "UPDATE " . $cfg["mysqlTable"]["table4"] ." SET Nombre=:nombre,Email=:email,contraseña=:contraseña,Foto=:foto WHERE id = :id";

    $resultado = $pdo->prepare($consulta);

    if(!$resultado){
        return false;
    }elseif(!$resultado->execute([":nombre"=>$user->nombre,":email"=>$user->email,":contraseña"=>$user->contraseña,":foto"=>$user->foto])){
        return false;
    }else{
        return true;
    }

}
// TABLA PREGUNTAS
function insertUsersQuestion($question) {
    global $pdo,$cfg;

    $pdo = connectDb();

    if($pdo != null){
        $consulta = "INSERT INTO " . $cfg["mysqlTable"]["table3"] ." (Titulo, Cuerpo, Etiqueta, userID, guest_name, guest_email)
                    VALUES (:titulo, :cuerpo, :etiqueta, :userID, :guest_name, :guest_email)";

        $resultado = $pdo->prepare($consulta);

        if(!$resultado){
            return false;
        } elseif(!$resultado->execute([
            ":titulo" => $question->titulo,
            ":cuerpo" => $question->cuerpo,
            ":etiqueta" => $question->etiqueta,
            ":userID" => $question->userID,
            ":guest_name" => null,
            ":guest_email" => null
        ])){
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

function insertGuestsQuestion($question) {
    global $pdo,$cfg;

    $pdo = connectDb();

    if($pdo != null){
        $consulta = "INSERT INTO " . $cfg["mysqlTable"]["table3"] ." (Titulo, Cuerpo, Etiqueta, userID, guest_name, guest_email)
                    VALUES (:titulo, :cuerpo, :etiqueta, :guest_name, :guest_email)";

        $resultado = $pdo->prepare($consulta);

        if(!$resultado){
            return false;
        } elseif(!$resultado->execute([
            ":titulo" => $question->titulo,
            ":cuerpo" => $question->cuerpo,
            ":etiqueta" => $question->etiqueta,
            ":userID" => null,
            ":guest_name" => $question->guest_nombre,
            ":guest_email" => $question->guest_email
        ])){
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

