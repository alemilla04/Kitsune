<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/style-login.css">
</head>
<body>
    <?php
    require_once(__DIR__."/../Models/Header.php");
    ?>
    <!-- <?php
        require_once(__DIR__."/../Models/Nav.php");
    ?> -->
    <div class="container">
        <h2>LOGIN</h2>
        <form action="../Controllers/LoginController.php" method="POST">
        <table>
            <tr>
                <td><p class="parrafo">Usuario <input type="text" name="user"></p></td>
            </tr>
            <tr>
                <td><p class="parrafo">Contraseña <input type="text" name="pass"></p></td>
            </tr>
        </table>
        <p><?php
        if(isset($_SESSION["errorLogin"])){
            print $_SESSION["errorLogin"];
            unset($_SESSION["errorLogin"]);
        }
        ?></p>
        <p><input type="submit" value="Iniciar Sesion"></p>
        </form>
    </div>
    <?php
    require_once(__DIR__."/../Models/Footer.php");
    ?>
</body>
</html>