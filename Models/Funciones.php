<?php
require_once(__DIR__ . "/config.php");

function checkEmail($email) {
    if(!str_contains($email, "@") && 
    !str_contains($email, ".") && 
    strrpos($email, "@")>strrpos($email, ".")){
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

// CONECTAR A LA BASE DE DATOS

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
            $usuario = array("userID" => $registro["userID"], "nombre" => $registro["nombre"], "email" => $registro["email"], "foto" => $registro["foto"], "preguntas" => $registro["preguntas"], "respuestas" => $registro["respuestas"]);
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

function selectUserByUserID($userID) {
    global $cfg;
    global $pdo;
    
    $pdo = connectDb();

    $consulta = "SELECT * FROM " . $cfg["mysqlTable"]["table4"] ." WHERE userID = :userID";
    
    $resultado = $pdo->prepare($consulta);

    if(!$resultado) {
        return null;
    } elseif(!$resultado->execute([":userID"=>$userID])) {
        return null;
    }else{
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}

function insertUser($usuario){
    global $pdo, $cfg;
    
    $pdo = connectDb();

    if($pdo != null){
        $consulta = "INSERT INTO " . $cfg["mysqlTable"]["table4"] ." (nombre, email, contraseña, foto)
                    VALUES (:nombre, :email, :contrasena, :foto)";

        $resultado = $pdo->prepare($consulta);
        
        if(!$resultado){
            return false;
            // $respuesta = "error en resultado.";
            // return $respuesta;
        } elseif(!$resultado->execute([
            ":nombre" => $usuario->nombre,
            ":email" => $usuario->email,
            ":contrasena" => $usuario->password,
            ":foto" => $usuario->foto
        ])){
            return false;
            // $respuesta = "Error al ejecutar la consulta: " . implode(":", $resultado->errorInfo());
            // return $respuesta;
        } else {
            return true;
        }
    } else {
        return false;
    }

}

function updateUser($user){
    global $pdo, $cfg;
    
    $pdo = connectDb();
    
    $consulta = "UPDATE " . $cfg["mysqlTable"]["table4"] ." SET nombre = :nombre, email = :email, foto = :foto, preguntas = :preguntas, respuestas = :respuestas WHERE userID = :userID";

    $resultado = $pdo->prepare($consulta);
    
    $params = [
        ":nombre" => $user["nombre"],
        ":email" => $user["email"],
        ":foto" => $user["foto"],
        ":preguntas" => $user["preguntas"],
        ":respuestas" => $user["respuestas"],
        ":userID" => $user["userID"]
    ];
    
    if(!$resultado){
        // $respuesta = "error en resultado.";
        // return $respuesta;
        return false;
    }elseif(!$resultado->execute($params)){
        // $respuesta = "Error al ejecutar la consulta: " . implode(":", $resultado->errorInfo());
        // return $respuesta;
        return false;
    }else{
        return true;
    }
    
}

function updateDataUser($user,$id){
    global $pdo, $cfg;

    $pdo = connectDb();
    
    $consulta = "UPDATE " . $cfg["mysqlTable"]["table4"] ." SET nombre = :nombre, email = :email, foto = :foto WHERE userID = :userID";
    
    $resultado = $pdo->prepare($consulta);
    
    $params = [
        ":nombre" => $user->nombre,
        ":email" => $user->email,
        ":foto" => $user->foto,
        ":userID" => $id
    ];
    
    if(!$resultado){
        return false;
    }elseif(!$resultado->execute($params)){
        return false;
    }else{
        return true;
    }
}

function deleteUser($id){
    global $pdo, $cfg;

    $pdo = connectDb();
    
    $consulta = "DELETE FROM " . $cfg["mysqlTable"]["table4"] ." WHERE userID = :id";
    
    $resultado = $pdo->prepare($consulta);
    
    if(!$resultado){
        return false;
    }elseif(!$resultado->execute([":id"=>$id])){
        return false;
    }else{
        return true;
    }
}

function updatePasswordUser($password){
    
}

// TABLA PREGUNTAS

function getQuestions(){
    global $pdo, $cfg;

    $pdo = connectDb();
    $consulta = "SELECT * FROM " . $cfg["mysqlTable"]["table3"] . " ORDER BY preguntaID DESC";

    $resultado = $pdo->query($consulta);

    if (!$resultado) {
        return false;
    } else {
        $listaPreguntas = array();
        
        foreach($resultado as $registro){
            $pregunta = array("preguntaID" => $registro["preguntaID"], "titulo" => $registro["titulo"], "cuerpo" => $registro["cuerpo"], "etiqueta" => $registro["etiqueta"], "userID" => $registro["userID"], "guest_nombre" => $registro["guest_nombre"], "guest_email" => $registro["guest_email"], "fecha" => $registro["fecha"], "respuestas" => $registro["respuestas"], "vistas" => $registro["vistas"], "puntuacion" => $registro["puntuacion"]);
            array_push($listaPreguntas, $pregunta);
        }
        return $listaPreguntas;
    }
}

function getQuestion($preguntaID){
    global $cfg;
    global $pdo;

    $pdo = connectDb();

    $consulta = "SELECT * FROM " . $cfg["mysqlTable"]["table3"] ." WHERE preguntaID = :preguntaID";

    $resultado = $pdo->prepare($consulta);

    if(!$resultado) {
        return null;
    } elseif(!$resultado->execute([":preguntaID"=>$preguntaID])) {
        return null;
    }else{
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}

function insertQuestion($question) {
    global $pdo,$cfg;

    $pdo = connectDb();

    if($pdo != null){
        $consulta = "INSERT INTO " . $cfg["mysqlTable"]["table3"] ." (titulo, cuerpo, etiqueta, userID, guest_nombre, guest_email, fecha, respuestas, :vistas)
                        VALUES (:titulo, :cuerpo, :etiqueta, :userID, :guest_name, :guest_email, :fecha, :respuestas, :vistas)";

        $resultado = $pdo->prepare($consulta);

        if(!$resultado){
            return false;
            // $respuesta = "error en resultado.";
            // return $respuesta;
        } elseif(!$resultado->execute([
            ":titulo" => $question->titulo,
            ":cuerpo" => $question->cuerpo,
            ":etiqueta" => $question->etiqueta,
            ":userID" => $question->userID,
            ":guest_name" => $question->guest_nombre,
            ":guest_email" => $question->guest_email,
            ":fecha" => $question->fecha,
            ":respuestas" => $question->respuestas,
            ":vistas" => $question->vistas,
            ":puntuacion" => $question->puntuacion
        ])){
            return false;
            // $respuesta = "Error al ejecutar la consulta: " . implode(":", $resultado->errorInfo());
            // return $respuesta;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

function updateQuestion($pregunta){
    global $pdo, $cfg;

    $pdo = connectDb();

    $consulta = "UPDATE " . $cfg["mysqlTable"]["table3"] ." SET titulo = :titulo, cuerpo = :cuerpo, etiqueta = :etiqueta, guest_nombre = :guest_nombre, guest_email = :guest_email, vistas = :vistas WHERE preguntaID = :preguntaID";

    $resultado = $pdo->prepare($consulta);

    $params = [
        ":titulo" => $pregunta["titulo"],
        ":cuerpo" => $pregunta["cuerpo"],
        ":etiqueta" => $pregunta["etiqueta"],
        ":guest_nombre" => $pregunta["guest_nombre"],
        ":guest_email" => $pregunta["guest_email"],
        ":vistas" => $pregunta["vistas"],
        ":preguntaID" => $pregunta["preguntaID"]
    ];

    if(!$resultado){
        // $respuesta = "error en resultado.";
        // return $respuesta;
        return false;
    }elseif(!$resultado->execute($params)){
        // $respuesta = "Error al ejecutar la consulta: " . implode(":", $resultado->errorInfo());
        // return $respuesta;
        return false;
    }else{
        return true;
    }
}

// TABLA EXPERIENCIAS

function selectExperiences(){
    global $cfg, $pdo;
    //Creamos el array
    $experiences = [];

    $pdo = connectDb();
    
    $query = "SELECT * FROM " . $cfg["mysqlTable"]["table2"];

    $resultado = $pdo->query($query);
    if($resultado){
        foreach ($resultado as $row) {
            $experiences[] = $row;
        }
    
        return $experiences;
    }else{
        print "<p>Todavia no hay experiencias</p>";
    }
    
}

function insertGuestsExperience($experiencie){
    var_dump($experiencie);

    global $pdo,$cfg;

    $pdo = connectDb();

    if($pdo != null){
        $consulta = "INSERT INTO " . $cfg["mysqlTable"]["table2"] ." (name,experiencia,opinion)
                     VALUES (:name,:experiencia,:opinion)";
        $resultado = $pdo->prepare($consulta);

        if(!$resultado){
            return false;
        }elseif(!$resultado->execute([
            ":name" => $experiencie->name,
            ":experiencia" => $experiencie->experiencia,
            ":opinion" => $experiencie->opinion
        ])){
            var_dump($resultado->errorInfo());
            die();
            return false;
        }else{
            return true;
        }
    }else{
        return false;
    }
}

// TABLA RESPUESTAS

function insertResponse($response){
    global $pdo, $cfg;

    $pdo = connectDb();

    if($pdo != null){
        $consulta = "INSERT INTO " . $cfg["mysqlTable"]["table6"] ." (preguntaID,cuerpo,userID,fecha)
                    VALUES (:idQuestion, :body, :idUser, :fecha)";

        $resultado = $pdo->prepare($consulta);

        if(!$resultado){
            return false;
        } elseif(!$resultado->execute([
            ":idQuestion" => $response->preguntaID,
            ":body" => $response->cuerpo,
            ":idUser" => $response->userID,
            ":fecha" => $response->fecha
        ])){
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }

}