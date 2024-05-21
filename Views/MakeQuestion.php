<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Content/output.css">
    <style>
        :root {
            font-size: 18px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .login-a:hover, .signup-a:hover {
            color: rgb(29 78 216);
        }
    </style>
    <script src="../Scripts/CodeMakeQuestions.js"></script>
</head>
<body class="h-screen w-[100%]">
    <?php
    require_once(__DIR__."/../Models/Header.php");
    ?>
    <!-- Ventana modal-->
    <div class="bg-gray-600 bg-opacity-60 fixed z-10 top-0 right-0 left-0 bottom-0 flex" id="ventana_modal">
        <div class="m-auto pl-[1.5rem] pb-4 pt-4 bg-white w-[315px] h-[410px] border rounded-[10px] shadow-[0px_0px_7px_0px_rgb(128,128,128)]">
            <h1 class="font-bold mb-[10px]">Formulando una buena pregunta</h1>
            <span>Antes de publicar, <a class="text-blue-500" href="">haz una búsqueda</a> para averiguar si tu pregunta ya ha sido respondida.</span>
            <div class="mt-[10px]">
                <ul class="list-decimal ml-[25px]">
                    <li>Resume el problema</li>
                    <li>Describe lo que has intentado</li>
                    <li>Cuando sea apropiado, adjunta alguna imagen</li>
                </ul>
            </div>
            <button type="button" id="btn-close" class="hover:bg-blue-700 mt-[20px] ml-[3px] text-white border bg-blue-500 rounded-[8px] p-2 text-xs">Comienza a escribir</button>
        </div>
    </div>
    
    <main class="h-[100%] w-[100%] grid grid-cols-[auto_1fr] grid-rows-[1fr_1fr]">
        <?php
            require_once(__DIR__."/../Models/Nav.php");
        ?>
        <div class="m-5">
            <h1 class="mb-[20px] font-bold text-xl">Formular una pregunta</h1>
            <div class="flex border rounded-[10px] shadow-[0px_0px_5px_0px_rgb(128,128,128)] w-[100%]">
                <form action="../Controllers/MakeQuestionController.php" class="p-4" method="POST">
                    <div>
                        <!-- TITULO -->
                        <div>
                            <h1 class="mb-[10px] font-bold">Título</h1>                        
                        </div>

                        <!-- MINI-EXPLICACION -->
                        <div>
                            <p class="mb-[10px]">Sé específico e imagina que estás haciendo la pregunta a otra persona</p>
                        </div>

                        <!-- INPUT -->
                        <div>
                            <input class="w-[100%] border rounded-[5px]" type="text" name="titulo" placeholder="¿Cuál es tu pregunta?" value="<?php echo !empty($_SESSION['question']) ? $_SESSION["question"]["titulo"] : '';?>">
                        </div>

                        <!-- CUERPO -->
                        <div>
                            <h1 class="mt-[20px] mb-[10px] font-bold">Cuerpo</h1>
                            <label class="form-control">
                            <textarea name='cuerpo' id="text-area" class="border rounded-[5px] textarea textarea-bordered h-24 w-[100%]" placeholder="Describe tu problema" value="<?php echo !empty($_SESSION['question']) ? $_SESSION["question"]["cuerpo"] : '';?>"></textarea>
                            <div class="label">
                                <span class="label-text-alt">Escribir</span>
                                <span id="span-borrar-todo">Borrar Todo</span>
                            </div>
                            <div id="text-area-preview"></div>
                            </label>
                        </div>

                        <!-- ETIQUETA -->
                        <div>
                            <h1 class="mt-[20px] mb-[10px] font-bold">Etiqueta</h1>
                            <div class="search-input-box">
                                <input class="w-[100%] border rounded-[5px]" type="text" name="etiqueta" id="search-input" placeholde="p.j. comida, php, ..." value="<?php echo !empty($_SESSION['question']) ? $_SESSION["question"]["etiqueta"] : '';?>">
                                <ul>
                                    <li></li>
                                </ul>
                            </div>
                        </div>

                        <!-- ETIQUETAS -->
                        <?php
                        if(isset($_SESSION['usuarioObjeto'])){
                            print "<br>";
                            print "<input type='submit' value='Publicar pregunta' class='border bg-blue-500 text-white rounded-[5px] p-2 text-xs'>";
                        } else {
                            print "<br>";
                            print "<h1 class='font-bold'><a href='SignUp.php' class='text-blue-500 signup-a'>Registrarse</a> o <a class='text-blue-500 login-a' href='Login.php'>iniciar sesión</a></h1>";
                            print "<br>";
                            print "<h1 class='font-bold'>Publicar como invitado</h1>";
                            print "<br>";
                            print "<div class='flex flex-col gap-4'>";
                            print "<label class='font-bold text-xs'>Nombre</label>";
                            print "<input class='border rounded-[5px]' type='text' name='guest_nombre' value=''>";
                            print "<label class='font-bold text-xs'>Correo electrónico</label>";
                            print "<input class='border rounded-[5px]' type='text' name='guest_email' id='' value=''>";
                            print "</div>";
                            print "<br>";
                            print "<input name='publicar-pregunta' type='submit' value='Publicar pregunta' class='border bg-blue-500 text-white rounded-[5px] p-2 text-xs hover:bg-blue-700'>";
                        }

                        ?>
                        <?php 
                        if(isset($_SESSION["insertarError"])){
                            print "<p>$_SESSION[insertarError]</p>";
                        }

                        if(isset($_SESSION["errorEmail"])){
                            print "<p>$_SESSION[errorEmail]</p>";
                        }

                        if(isset($_SESSION["insertarErrorGuest"])){
                            print "<p>$_SESSION[insertarErrorGuest]</p>";
                        }

                        unset($_SESSION["insertarError"]);
                        unset($_SESSION["errorEmail"]);
                        unset($_SESSION["insertarErrorGuest"]);

                        ?>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php
    require_once(__DIR__."/../Models/Footer.php");
    ?>
</body>
</html>