<?php
session_start();
require_once(__DIR__ . "/../Models/Funciones.php");
require_once(__DIR__ . "/../Models/Config.php");
require_once(__DIR__ . "/../Models/Question.php");

// if(isset($_SESSION['insertarOk'])){
//     $insertarOk = $_SESSION['insertarOk'];
// }

$questions = getQuestions();

// var_dump($questions);

// $question = new Question();
// $question->titulo = "prueba";
// $question->cuerpo = "prueba 1.1";
// $question->etiqueta = "prueba";
// $fechaHoy = date("Y-m-d H:i:s");
// $question->fecha = $fechaHoy;
// $question->userID = 1;
// $insertar = insertQuestion($question);

// print $insertar;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/output.css">
    <script type="module" src="../Scripts/Filtros.js"></script>
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
            margin-top: 7px;
        }

        .contenedor-user {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 7px;
        }


    </style>
</head>
<body class="h-screen grid grid-rows-[auto_1fr_auto] grid-cols-[1fr]">
    <header>
    <?php
    require_once(__DIR__."/../Models/Header.php");
    ?>
    </header>

    <main class="h-[100%] w-[100%] grid grid-cols-[auto_1fr] grid-rows-[1fr]">
    
    <?php
    require_once(__DIR__."/../Models/Nav.php");
    ?>
    
    <div class="h-[100%] flex flex-col mt-5 lg:ml-[5rem] sm:ml-[10px] mr-[5px]">
        <div class="text-lg lg:flex lg:flex-row lg:justify-between md:flex md:flex-row md:justify-between sm:flex sm:flex-col">
            <h1>Explora nuestras preguntas</h1>
            <div class="text-white">
                <a class="border bg-[#007bff] rounded-[5px] p-2 text-xs cursor-pointer hover:duration-[1s] hover:bg-[#165CA3]" href="MakeQuestion.php">Formular una pregunta</a>
            </div>
        </div>
        <div class='mt-[20px] mb-[20px] lg:flex lg:flex-row md:flex md:flex-col gap-4'>
            <?php
            print "<h1 class='flex-grow'> ". count($questions) ." preguntas en total</h1>";
            ?>
            <div class='flex-grow text-sm flex justify-between border-[1px] rounded-[5px] border-[#BABFC5] p-[3px]'>
                <form action="<?php $_SERVER["PHP_SELF"]?>">
                    <button type='button' name="reciente" class='hover:bg-[#eff0f0] rounded-[5px] p-[8px] focus:bg-[#eff0f0]'>Mas reciente</button>       
                    <button type='button' name="no-response" class='hover:bg-[#eff0f0] rounded-[5px] p-[8px] focus:bg-[#eff0f0]'>Sin responder</button>
                    <button type='button' name="puntuacion" class='hover:bg-[#eff0f0] rounded-[5px] p-[8px] focus:bg-[#eff0f0]'>Puntuacion</button>
                </form>
            </div>
            <div>
                <label>Etiquetadas con:</label>
                <input class='border-[1px] rounded-[5px] border-[#BABFC5]' type="text" name="etiqueta" placeholder="p. ej. php, javascript...">
                <button type="submit" class='rounded-[5px] p-2 text-xs cursor-pointer hover:duration-[1s] hover:bg-[#165CA3]' name="filtro-etiqueta">🔎</button>
            </div>
        </div>
        <hr>
        <div class="questions">
            <?php
                    if(isset($questions)){
                        foreach($questions as $question){
                            print "<div class='text-sm lg:flex md:flex md:flex-row lg:flex-row sm:flex-col gap-4 pt-[20px] pb-[20px]'>";
                            print "  <div class='lg:flex-col md:flex-col lg:gap-2 md:gap-2 lg:flex-none lg:text-right md:flex-none md:text-right sm:flex sm:flex-row sm:gap-12 sm:mb-[10px]'>";
                            print "    <li>0 votos</li>"; 
                            print "    <li>$question[respuestas] respuesta</li>";
                            print "    <li>$question[vistas] vistas</li>";
                            
                            print "  </div>";
        
                            print "  <div class='lg:flex-grow lg:flex-col md:flex-grow md:flex-col'>";
                            print "    <form action='./Question.php' method='POST' enctype='multipart/form-data'>";
                            print "      <button type='submit' name='ir-a-question' value='$question[preguntaID]' class='text-[#155CAB] hover:duration-[1s] hover:text-[#47505a] mb-[5px]'>$question[titulo]</button>";
                            print "    </form>";
                            print "    <span>$question[cuerpo]</span>";
                            print "    <div class='lg:flex lg:flex-row md:flex md:flex-row sm:flex-col items-center'>";
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
    // if(isset($insertarOk)){
    //     print "<p>$insertarOk</p>";
    // }

    // unset($_SESSION["insertarOk"]);
    ?>
    </main>
    <footer>
        <?php
        require_once(__DIR__."/../Models/Footer.php");
        ?>
    </footer>
</body>
</html>