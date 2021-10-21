<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nombre = $edad = "";
        $listado = [];

        if (isset($_GET['listado'])) {
            $listado = $_GET['listado'];
        }

        if (filter_input(INPUT_GET, "submit")) {
            $listado[filter_input(INPUT_GET, "nombre")] = filter_input(INPUT_GET, "edad");
        }

        displayForm($listado);

        function displayForm() {
            global $nombre, $edad, $listado;
            $output = "<form>" .
                    "<input type='text' name='nombre' placeholder='nombre' value=$nombre >" .
                    "<input type='text' name='edad' placeholder='edad' value=$edad >";

            foreach ($listado as $key => $value) {
                $output .= "<input type='hidden' name='listado[$key]' value='$value'>";
            }



            $output .= "<input type='submit' name='submit' /></form>";

            echo $output;
        }

        var_dump($listado);
        ?>
    </body>
</html>
