<?php
require_once(__DIR__ . "/../Models/Autoload.php");
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

        .users-list {
            display: grid;
            grid-template-rows: repeat(2, 1fr); /* Cambia el número de filas a 3 */
            grid-template-columns:repeat(2, 1fr);
            gap: 1rem;
        }

        .user-container {
            display: flex;
            flex-direction: column;
            background-color: gray;
            color:white;
            padding: 20px;
            border-radius: 8px;
            margin-top:15px;
            margin-bottom: 1rem;
            margin-right: 45px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .user-container img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
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
        <h1>Aquí se mostrarán los mensajes de los usuarios en discover groups</h1>
    <br>
    <h3>Mensajes de grupos de otros usuarios</h3>
    <br>
    <div id="content" class="border-white border-2 p-4 rounded-lg">
        <?php
            require_once(__DIR__."/../Models/Funciones.php");
            $array = selectExperiences();
            //Imprimimos todos los registros de la tabla
            if(isset($array) && is_array($array)){
                foreach($array as $row){
                    print "<div class='w-10'>";
                    print "<p>Nombre: " . $row["name"] . "</p>"."\n";
                    print "<p>Opinion: " . $row["experiencia"] . "</p>"."\n";
                    print "<p>Puntuaje: " . $row["opinion"] . "</p>"."\n";
                    print "<hr>";
                    print "</div>";
                }
            }
        ?>
    </div>
        </div>
    </main>
    <?php
    require("../Models/Footer.php");
    ?>
</body>

</html>
