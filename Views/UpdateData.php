<?php
require_once(__DIR__ . "/../Models/Autoload.php");
if(isset($_SESSION["usuarioObjeto"])){
    $usuario = $_SESSION["usuarioObjeto"];
}else{
    $usuario = "kk";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/output.css">
    <style>
        main {
            flex:1;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 20px;
        }

    </style>
</head>

<body>
    <?php
    require("../Models/Header.php");
    ?>
    <main>
        <?php
        require("../Models/Nav.php");
        ?>
        <div>
            <div>
                <p>Actualize sus datos</p>
                    <br>
                <form method="POST" action="../Controllers/UpdateUserController.php" enctype="multipart/form-data">
                    <label>Nombre: </label>
                    <!-- campo tipo hidden para pasar el hidden -->
                    <?php
                    $_SESSION["id_user"] = isset($usuario['userID']) ? $usuario['userID'] : '';
                    ?>
                    <input type='text' name='name' value='<?php echo isset($usuario['nombre']) ? $usuario['nombre'] : '' ?>' class='ml-4'></input>
                        <br>
                        <br>
                    <label>Email: </label>
                    <input type='text' name='mail' value='<?php echo isset($usuario['email']) ? $usuario['email'] : '' ?>'  class=ml-4></input>
                    <div class='w-10'>
                        <br>
                        <img src="../Content/profile_pics/<?php echo isset($usuario['foto']) ? htmlspecialchars($usuario['foto'], ENT_QUOTES, 'UTF-8') : ''; ?>" alt="Profile Picture">
                    </div>
                    <br>
                    <label class="text-white">Quieres cambiar la fotografia?</label>
                    
                    <br>
                    <input class='mt-[5px] mb-[20px] rounded-[7px] p-[7px]' type="file" name="imagen" id="imagen">
                    </div>
                <br>
                <p>
                    <input type='submit' value='Actualizar' class="bg-blue-500 p-2 rounded-md text-white">
                    <input type='reset' value='Reiniciar' class="bg-blue-500 p-2 rounded-md text-white">
                </p>
                <br>
                <?php
                    if(isset($_SESSION["usera"])){
                        print "<p>".$_SESSION['usera']."</p>";
                        unset($_SESSION['usera']);
                    }
                ?>
    </form>
        </div>
                
    </main>
    <?php
    require("../Models/Footer.php");
    ?>
</body>

</html>