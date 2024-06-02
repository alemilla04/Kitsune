<?php
session_start();
if(isset($_SESSION["error"])){
    $error = $_SESSION["error"];
    unset($_SESSION["error"]);
}
if(isset($_SESSION["error2"])){
    $error2 = $_SESSION["error2"];
    unset($_SESSION["error2"]);
}
if(isset($_SESSION["error3"])){
    $error3 = $_SESSION["error3"];
    unset($_SESSION["error3"]);
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
        <p class="text-center mb-4 size-4">Formulario de opinion de usuario</p>
        <form action="../Controllers/GroupsController.php" method="POST" class="flex flex-col gap-1">
            <label>Nombre: </label>
                <input type="text" id="name" name="nombre" size="20" class="bg-white text-black">
            <label>Describala su experiencia en otras paginas: </label>
                <input type="text" id="textDesc1" name="texto1" size="20" class="bg-white text-black lg-rounded">
            <label>Puntuacion de esta pagina: </label>
                <input type="text" id="textDesc2" name="texto2" size="20" class="bg-white text-black lg-rounded">
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