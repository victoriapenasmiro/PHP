<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario básico con php</title>
    </head>
    <body>
        <?php
        /*
         * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
         * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
         */

        
        if (filter_input(INPUT_GET, "submit")) {
            $numeros = explode (",", filter_input(INPUT_GET, "numeros")); // split string to an Array
            
            foreach ($numeros as $num) {
                echo (int) $num;
            }   
            
        } else {
            displayForm();
        }
        
        function displayForm() {
            ?>
            <h1>Algoritmos de ordenación</h1>
            <form>
                <label for="numeros">Por favor, introduce un listado de números enteros separados por coma.</label>
                <input type="text" name="numeros" id="numeros" />
                <input type="submit" name="submit" />
            </form>

            <?php
        }
        ?>

    </body>
</html>