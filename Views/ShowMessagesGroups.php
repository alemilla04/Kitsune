<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require("../Models/Header.php");
    ?>
    <h1>Aquí se mostrarán los mensajes de los usuarios en discover groups</h1>
    <br>
    <h3>Mensajes de grupos de otros usuarios</h3>
    <br>
    <div id="content" class="border-white border-2 p-4 rounded-lg">
        <?php
            require_once(__DIR__."/../Models/Funciones.php");
            $array = selectExperiences();
            //Imprimimos todos los registros de la tabla
            foreach($array as $row){
                print "<div>";
                print "<hr>";
                print "<p>Nombre: " . $row["name"] . "</p>"."\n";
                print "<p>Opinion: " . $row["texto1"] . "</p>"."\n";
                print "<p>Puntuaje: " . $row["texto2"] . "</p>"."\n";
                print "<hr>";
                print "</div>";
            }
        ?>
    </div>
    <?php
    require("../Models/Footer.php");
    ?>
</body>

</html>