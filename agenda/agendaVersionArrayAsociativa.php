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
        
        $nombre = $telefono = "";
        $listado = [];

        if (isset($_GET['listado'])) {
            $listado = $_GET['listado'];
        }

        if (filter_input(INPUT_GET, "submit")) {
            $nombre = trim(filter_input(INPUT_GET, "nombre"));
            $telefono = filter_input(INPUT_GET, "telefono");
            
            //valido que el usuario haya introducido el nombre del nuevo contacto a registrar
            if (empty($nombre)) {
                
                echo "<h4 style='color:red;'>¡ATENCIÓN!</h4><p style='color:red;'>El nombre es obligatorio.</p>";
                
            } else if (empty($telefono)) {

                if (isset($listado[filter_input(INPUT_GET, "nombre")])) {

                    //elimino el contacto (la key) de $listado
                    unset($listado[filter_input(INPUT_GET, "nombre")]);
                    echo "<p>Contacto eliminado.</p>";
                    
                } else {

                    echo "<h4 style='color:red;'>¡ATENCIÓN!</h4><p style='color:red;'>El nombre indicado no está registrado.</p>";
                }
                
            } else if (!preg_match("/[0-9]{9}/", $telefono) || strlen($telefono) > 9) {

                echo "<h4 style='color:red;'>¡ATENCIÓN!</h4><p style='color:red;'>El teléfono indicado no es válido."
                . " Por favor, sigue  el formato 9 dígitos entre 0 y 9, ambos incluidos. </p>";
                
            } else {
                $listado[$nombre] = $telefono;
            }
        }

        displayForm();
        displayContacts();

        /**
         * Impresión del formulario de registro
         * 
         * @global type $nombre
         * @global type $telefono
         * @global type $listado Contactos registrados de la agenda
         */
        function displayForm() {
            global $nombre, $telefono, $listado;

            $output = "<h1>AGENDA</h1>" .
                    "<form>" .
                    "<input type='text' name='nombre' placeholder='nombre' value=$nombre >" .
                    "<input type='text' name='telefono' placeholder='telefono' value=$telefono >";

            foreach ($listado as $key => $value) {
                $output .= "<input type='hidden' name='listado[$key]' value='$value'>";
            }

            $output .= "<input type='submit' name='submit' /></form>";

            echo $output;
        }

        /**
         * Listado de contactos de la agenda
         * 
         * @global type $listado Contactos registrados de la agenda
         */
        function displayContacts() {
            global $listado;
            $list = "<h2>CONTACTOS</h2><ul>";

            foreach ($listado as $key => $value) {
                $list .= "<li> $key : $value </li>";
            }

            if (!count($listado)) {
                $list = "<p style='color:red;'>No hay contactos en agenda.</p>";
            }

            $list .= "</ul>";

            echo $list;
        }
        ?>
    </body>
</html>
