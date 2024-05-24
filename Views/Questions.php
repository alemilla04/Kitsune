<?php
session_start();
require_once(__DIR__ . "/../Models/Funciones.php");
require_once(__DIR__ . "/../Models/Config.php");
require_once(__DIR__ . "/../Models/Question.php");

if(isset($_SESSION['insertarOk'])){
    $insertarOk = $_SESSION['insertarOk'];
}

$questions = getQuestions();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <spannk rel="stylesheet" href="../Content/output.css">
    <style>
        :root {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body class="h-screen w-[100%] grid grid-rows-[auto_1fr_auto] grid-cols-[1fr]">
    <header>
    <?php
    require_once(__DIR__."/../Models/Header.php");
    ?>
    </header>

    <main class="h-[100%] w-[100%] grid grid-cols-[auto_1fr] grid-rows-[1fr]">

    <?php
    require_once(__DIR__."/../Models/Nav.php");
    ?>
    
    <div class="h-screen grid grid-cols-[1fr] grid-rows-[auto_auto_1fr] mt-5 lg:ml-[5rem] sm:ml-[10px] mr-[5px]">
        <div class="text-lg lg:flex lg:flex-row lg:justify-between md:flex md:flex-row md:justify-between sm:flex sm:flex-col">
            <h1>Explora nuestras preguntas</h1>
            <div class="text-white">
                <a class="border bg-[#007bff] rounded-[5px] p-2 text-xs cursor-pointer hover:duration-[1s] hover:bg-[#165CA3]" href="MakeQuestion.php">Formular una pregunta</a>
            </div>
        </div>
        <div class='mt-[20px] mb-[20px] lg:flex lg:flex-row md:flex md:flex-col gap-4'>
            <h1 class='flex-grow'>5 preguntas en total</h1>
            <div class='flex-grow text-sm flex justify-between border-[1px] rounded-[5px] border-[#BABFC5] p-[3px]'>
                <span class='hover:bg-[#eff0f0] rounded-[5px] p-[8px]'>Mas reciente</span>       
                <span class='hover:bg-[#eff0f0] rounded-[5px] p-[8px]'>Sin responder</span>
                <span class='hover:bg-[#eff0f0] rounded-[5px] p-[8px]'>Puntuacion</span>
            </div>
            <div>
                <label>Etiquetadas con:</label>
                <input class='border-[1px] rounded-[5px] border-[#BABFC5]' type="text" name="etiqueta" placeholder="p. ej. php, javascript...">
                <button type="submit" class='rounded-[5px] p-2 text-xs cursor-pointer hover:duration-[1s] hover:bg-[#165CA3]' name="filtro-etiqueta">🔎</button>
            </div>
        </div>
        <div class="questions border-2 border-green-400">
            <?php
                    if(isset($questions)){
                        foreach($questions as $question){
                            print "<div class='flex gap-4'>";
                            print "  <div class='border-2 border-red-500 flex-none text-right'>";
                            print "    <li>0 votos</li>";
                            print "    <li>$question[respuestas] respuestas</li>";
                            print "    <li>3 vistas</li>";
                            
                            print "  </div>";
        
                            print "  <div class='flex-grow border-2 border-blue-500'>";
                            print "    <a href='#' class='text-[#155CAB] hover:duration-[1s] hover:text-[#47505a]'>Problema enfocar un carrito de compra sencillo con PHP y Javascript</a>";
                            print "    <br>";
                            print "    <span>Descripcion de la pregunta</span>";
                            print "    <div class='flex'>";
                            print "      <span class='flex-none border-2 border-red-500'>etiqueta</span>";
                            print "        <div class='border-2 border-yellow-400 flex-grow text-right'>";
                            print "          <span>foto y usuario</span>";
                            print "          <span>formulada hace 5 horas</span>";
                            print "        </div>";
                            print "    </div>";
                            print "  </div>";
                            print "</div>";
                            print "<br>";
                        }
                    }

                ?>
        </div>
    </div>
    <?php
    if(isset($insertarOk)){
        print "<p>$insertarOk</p>";
    }

    unset($_SESSION["insertarOk"]);
    ?>
    </main>
    <footer>
        <?php
        require_once(__DIR__."/../Models/Footer.php");
        ?>
    </footer>
</body>
</html>