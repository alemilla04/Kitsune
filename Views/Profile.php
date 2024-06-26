<?php
require_once(__DIR__ . "/../Models/Autoload.php");
$usuario = selectUser($_SESSION["usuarioObjeto"]["email"]);
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
            <h1 class="text-4xl">Datos del usuario</h1>
            <div class="users-list">
                <?php
                    print "<div>";
                    print "<p>Nombre: ".$usuario["nombre"]."</p>";
                    print "<p> Correo: ".$usuario["email"]."</p>";
                    echo "<div class='w-16'>";
                    echo '<img src="../Content/profile_pics/' . $usuario["foto"]. '" alt="Profile Picture">';
                    echo "</div>";
                    print "</div>";
                ?>
            </div>
        </div>
    </main>
    <?php
    require("../Models/Footer.php");
    ?>
</body>

</html>