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
    <link rel="stylesheet" href="../Content/output.css">
</head>

<body class="overflow-x-hidden">
    <div class="flex-1 mt-4">
        <a href="../Views/Home.php"><img class="w-[25%] h-[20%] lg:ml-80 sm:ml-64" src="../Content/kit-removebg.png" alt="foto de perfil"><a>
        <a class="enlace btn btn-ghost text-center lg:ml-[370px] sm:ml-[270px] mt-4 text-2xl" href="../Views/Home.php">Kitsune</a>
    </div>
    <div class="container">
        <form action="../Controllers/LoginController.php" method="POST">
            <table>
                <tr>
                    <td>
                        <input type="text" name="user" placeholder="Usuario" class="text-[20px]">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="pass" placeholder="Clave">
                    </td>
                </tr>
            </table>
            <p><?php
                if (isset($_SESSION["errorLogin"])) {
                    print $_SESSION["errorLogin"];
                    unset($_SESSION["errorLogin"]);
                }
                ?></p>
            <p><input type="submit" value="Iniciar Sesion"></p>
        </form>
    </div>
    <?php
    require_once(__DIR__ . "/../Models/Footer.php");
    ?>
</body>

</html>