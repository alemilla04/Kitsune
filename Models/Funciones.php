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

function selectUsers(){
    global $pdo, $cfg;

    $pdo = connectDb();
    $consulta = "SELECT * FROM $cfg[mysqlTable]";

    $resultado = $pdo->query($consulta);

    if(!$resultado){
        return false;
    }else{
        print "    <table>\n";
        print "      <thead>\n";
        print "        <tr>\n";
        print "          <th>Nombre</th>\n";
        print "          <th>Email</th>\n";
        print "          <th>Contraseña</th>\n";
        print "          <th>Foto</th>\n";
        print "        </tr>\n";
        print "      </thead>\n";
        foreach ($resultado as $registro) {
            print "<tr>\n";
            print "<td>$registro[Nombre]</td>\n";
            print "<td>$registro[Email]</td>\n";
            print "<td>$registro[Password]</td>\n";
            print "<td>$registro[Foto]</td>\n";
            print "</tr>\n";
        }

        print "</table>";
        return true;
    }
}

function insertDb($user){
    global $pdo, $cfg;

    $pdo = connectDb();

    if($pdo!=null){
        $consulta = "INSERT INTO $cfg[mysqlTable] (Nombre, Email, Password, Foto)
                    VALUES (:nombre, :email, :password, :foto)";
    
        $resultado = $pdo->prepare($consulta);
    
        if(!$resultado){
            return false;
        }elseif(!$resultado->execute([":nombre"=>$user->nombre,":email"=>$user->email,":password"=>$user->password,":foto"=>$user->foto])){
            return false;
        }else{
            return true;
        }
    } else {
        return false;
    }
}

function deleteDb($id){
    global $pdo, $cfg;

    $pdo = connectDb();

    $consulta = "DELETE FROM $cfg[mysqlTable] WHERE UserId = :id";
    
    $resultado = $pdo->prepare($consulta);

    if(!$resultado){
        return false;
    }elseif(!$resultado->execute([":id"=>$id])){
        return false;
    }else{
        return true;
    }
}

//Actualizar sin terminar 
function updateDb($user){
    global $pdo, $cfg;

    $pdo = connectDb();

    $consulta = "UPDATE $cfg[mysqlTable] SET Nombre=:nombre,Email=:email,Password=:password,Foto=:foto";

    $resultado = $pdo->prepare($consulta);

    if(!$resultado){
        return false;
    }elseif(!$resultado->execute([":nombre"=>$user->nombre,":email"=>$user->email,":password"=>$user->contraseña,":foto"=>$user->foto])){
        return false;
    }else{
        return true;
    }

}