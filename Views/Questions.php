<?php
session_start();

if(isset($_SESSION['insertarOk'])){
    $insertarOk = $_SESSION['insertarOk'];
}
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
                <a class="border bg-[#007bff] rounded-[5px] p-2 text-xs cursor-pointer hover:duration-[1s] hover:bg-[#0000ff]" href="MakeQuestion.php">Formular una pregunta</a>
            </div>
        </div>
        <div class='mt-[20px] mb-[20px] lg:flex lg:flex-row md:flex md:flex-col gap-4'>
            <h1 class='flex-grow'>5 preguntas en total</h1>
            <div class='flex-grow text-sm flex justify-between border-[1px] rounded-[5px] border-[#BABFC5] p-[8px]'>
                <span class='hover:bg-[#eff0f0] rounded-[5px]'>Mas reciente</span>       
                <span class='hover:bg-[#eff0f0] rounded-[5px]'>Sin responder</span>
                <span class='hover:bg-[#eff0f0] rounded-[5px]'>Puntuacion</span>
            </div>
            <div>
                <label>Etiquetadas con:</label>
                <input class='border-[1px] rounded-[5px] border-[#BABFC5]' type="text" name="etiqueta" placeholder="p. ej. php, javascript...">
                <button type="submit" class='border bg-[#007bff] rounded-[5px] p-2 text-xs cursor-pointer hover:duration-[1s] hover:bg-[#0000ff] text-white' name="filtro-etiqueta">🔎</button>
            </div>
        </div>
        <div class="questions border-2 border-green-400">
            <div class="flex gap-4">
                <div class="border-2 border-red-500 flex-none text-right">
                    <li>0 votos</li>
                    <li>0 respuestas</li>
                    <li>3 vistas</li>
                </div>
                <div class="flex-grow border-2 border-blue-500 ">
                    <a href="#" class="text-[#155CAB] hover:duration-[1s] hover:text-[#47505a]">Problema enfocar un carrito de compra sencillo con PHP y Javascript</a>
                    <br>
                    <span>Descripcion de la pregunta</span>
                    <div class="flex">
                        <span class="flex-none border-2 border-red-500">etiqueta</span>
                        <div class="border-2 border-yellow-400 flex-grow text-right">
                            <span>foto y usuario</span>
                            <span>formulada hace 5 horas</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <?php
            print "<table>";
            print "";
            print "</table>";
            ?> -->
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