<?php
session_start();
require_once(__DIR__."/../Models/User.php");
require_once(__DIR__."/../Models/Funciones.php");
// var_dump($_POST["ir-a-question"]);

if($_SERVER["REQUEST_METHOD"] = "POST") {
    $preguntaID = $_POST["ir-a-question"];
    
    $question = getQuestion($preguntaID);
    $question['vistas'] = $question['vistas'] + 1;
    updateQuestion($question);

    // var_dump($question);
} else {
    header("Location: ".APP_FOLDER."/../Views/Home.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        form p {
            color: red;
        }
    </style>
</head>
<body class='h-screen w-[100%]'>
    <header>
    <?php
    require_once(__DIR__."/../Models/Header.php");
    ?>
    </header>
    <main class="min-h-screen w-[100%] grid grid-cols-[auto_1fr] grid-rows-[1fr]">
        <?php
        require_once(__DIR__."/../Models/Nav.php");
        ?>
        <div class="m-[20px_auto]">
            <?php
            print "<div>";
            print "  <h1>$question[titulo]</h1>";
            print "  <div>";
            print "    <span>Formulada $question[fecha]</span>";
            print "    <span>Modificada $question[fecha]</span>";
            print "    <span>Vista</span>";
            if($question["vistas"]==1){
                print "    <span>$question[vistas] vez</span>";
            } else {
                print "    <span>$question[vistas] veces</span>";
            }
            print "  </div>";
            print "</div>";
            ?>
        </div>
    </main>
    <footer>
    <?php
    require_once(__DIR__."/../Models/Footer.php");
    ?>
    </footer>
</body>
</html>