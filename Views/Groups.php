<?php
require_once(__DIR__ . "/../Models/Autoload.php");
if(isset($_SESSION["ename"])){
    $error = $_SESSION["ename"];
    unset($_SESSION["ename"]);
}
if(isset($_SESSION["eexperiencia"])){
    $error2 = $_SESSION["eexperiencia"];
    unset($_SESSION["eexperiencia"]);
}
if(isset($_SESSION["eopinion"])){
    $error3 = $_SESSION["eopinion"];
    unset($_SESSION["eopinion"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/output.css">
</head>

<body>
    <?php
    require("../Models/Header.php");
    ?>
    <main class="grid justify-center border-2 p-4 border-white rounded-sm">
        <form action="../Controllers/GroupsController.php" method="POST" class="flex flex-col gap-1">
            <label>Nombre: </label>
                <input type="text" id="name" name="name" size="20" class="bg-white text-black">
            <label>Describala su experiencia en otras paginas: </label>
                <input type="text" id="textDesc1" name="experiencia" size="20" class="bg-white text-black lg-rounded">
            <label>Puntuacion de esta pagina: </label>
                <input type="text" id="textDesc2" name="opinion" size="20" class="bg-white text-black lg-rounded">
            <button type="submit">Guardar</button>
        </form>
        <?php
            if(isset($error)){
                print $error."\n";                
            }
            if(isset($error2)){
                print $error2."\n";
            }
            if(isset($error3)){
                print $error3."\n";
            }
        ?>
    </main>
    <?php
    require("../Models/Footer.php");
    ?>
</body>

</html>