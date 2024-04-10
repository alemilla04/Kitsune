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
    </style>
    <script src="../Scripts/modal.js"></script>
    <script src="../Scripts/code-questions.js"></script>
</head>
<body>
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
    
    <main class="h-screen w-[100%] grid grid-cols-[auto_1fr] grid-rows-[1fr]">
        <?php
            require_once(__DIR__."/../Models/Nav.php");
        ?>
        <div class="m-5">
            <h1 class="mb-[20px] font-bold text-xl">Formular una pregunta</h1>
            <div class="flex border rounded-[10px] shadow-[0px_0px_5px_0px_rgb(128,128,128)] w-[100%]">
                <form action="../Controller/QuestionController.php" class="p-4">
                    <div>
                        <div>
                            <h1 class="mb-[10px]">Título</h1>
                        </div>
                        <div>
                            <p class="mb-[10px]">Sé específico e imagina que estás haciendo la pregunta a otra persona</p>
                        </div>
                        <div>
                            <input class="w-[100%] border rounded-[5px]" type="text" name="titulo" placeholder="¿Cuál es tu pregunta?">
                        </div>
                        <div>
                            <h1 class="mt-[20px] mb-[10px]">Cuerpo</h1>
                            <label class="form-control">
                            <!-- <div class="label">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </div> -->
                            <textarea id="text-area" class="border rounded-[5px] textarea textarea-bordered h-24 w-[100%]" placeholder="Bio"></textarea>
                            <div class="label">
                                <span class="label-text-alt">Escribir</span>
                                <span id="span-borrar-todo">Borrar Todo</span>
                            </div>
                            </label>
                        </div>
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