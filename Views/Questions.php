<?php
session_start();
require_once(__DIR__ . "/../Models/Funciones.php");
require_once(__DIR__ . "/../Models/Config.php");
require_once(__DIR__ . "/../Models/Question.php");

if(isset($_SESSION['insertarOk'])){
    $insertarOk = $_SESSION['insertarOk'];
}

$questions = getQuestions();

// var_dump($questions);


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

        .foto-perfil {
            height: 2.5rem;
            width: 2.5rem;
            border-radius: 50%;
        }

        .contenedor-derecha {
            color: #626B74;
            flex-grow: 1;
            display: flex;
            justify-content: end;
            gap: 10px;
        }

        .contenedor-user {
            display: flex;
            align-items: center;
            gap: 5px;
        }
    </style>
</head>
<body class="h-screen w-[100%] grid grid-rows-[auto_1fr_auto] grid-cols-[auto_1fr]">
    <header>
    <?php
    require_once(__DIR__."/../Models/Header.php");
    ?>
    </header>

    <main class="h-[100%] grid grid-cols-[auto_1fr] grid-rows-[1fr]">
    
    <?php
    require_once(__DIR__."/../Models/Nav.php");
    ?>
    
    <div class="h-[100%] grid grid-cols-[1fr] grid-rows-[auto_auto_1fr] mt-5 lg:ml-[5rem] sm:ml-[10px] mr-[5px]">
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
        <hr>
        <div class="questions h-screen">
            <?php
                    if(isset($questions)){
                        foreach($questions as $question){
                            print "<div class='text-sm flex gap-4 pt-[20px] pb-[20px]'>";
                            print "  <div class='flex-none text-right'>";
                            print "    <li>0 votos</li>";
                            if($question["respuesta"]==NULL) {
                                print "<li>0 respuestas</li>";
                            } else {
                                print "<li>1 respuesta</li>";
                            }
                            print "    <li>3 vistas</li>";
                            
                            print "  </div>";
        
                            print "  <div class='flex-grow'>";
                            print "    <a href='#' class='text-[#155CAB] hover:duration-[1s] hover:text-[#47505a]'>$question[titulo]</a>";
                            print "    <br>";
                            print "    <span>$question[cuerpo]</span>";
                            print "    <div class='flex items-center'>";
                            print "      <span class='flex-none bg-[#E3E6E8] rounded-[5px] p-[5px] font-bold text-[12px]'>$question[etiqueta]</span>";
                            print "      <div class='contenedor-derecha'>";
                            if($question["userID"]!=NULL){
                                $usuario = selectUserByUserID($question["userID"]);
                                if($usuario != NULL){
                                    print "  <div class='contenedor-user text-[12px]'>";
                                    print "    <span><img class='foto-perfil' alt='Foto de perfil' src='../Content/profile_pics/$usuario[foto]'/></span>";
                                    print "    <span>$usuario[nombre]</span>";
                                    print "    <span>formulada el $question[fecha]</span>";
                                    print "  </div>";
                                }
                                
                            } else {
                                print "  <div class='contenedor-user text-[12px]'>";
                                print "      <span>$question[guest_nombre]</span>";
                                print "      <span>formulada el $question[fecha]</span>";
                                print "  </div>";
                            }
                            print "      </div>";
                            print "    </div>";
                            print "  </div>";
                            print "</div>";
                            print "<hr>";
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