<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Practica agenda</title>
    </head>
    <body>
        <?php
        $nombre = $telefono = $agenda = "";

        if (filter_input(INPUT_GET, "submit")) {
            global $nombre, $telefono, $agenda;
            $nombre = filter_input(INPUT_GET, "nombre");
            $telefono = filter_input(INPUT_GET, "telefono");

            //valido que el usuario haya introducido el nombre del nuevo contacto a registrar
            if (empty($nombre)) {
                echo "<h4 style='color:red;'>¡ATENCIÓN!</h4><p>El nombre es obligatorio.</p>";
                
            } else {

                //busco si el nombre ya existe en la agenda
                if (strpos(filter_input(INPUT_GET, "agenda"), "$nombre:") !== false) {
                    $agenda = checkNombre($nombre, $telefono);
                    
                } else if (!empty($telefono)) {
                    
                    //si el nombre no existe en la agenda y se ha indicado un teléfono, lo añado
                    $agenda = filter_input(INPUT_GET, "nombre") . ":" . filter_input(INPUT_GET, "telefono") . ",";

                    //si ya tengo algun contacto incluido a la agenda, lo concateno
                    if (!empty(filter_input(INPUT_GET, "agenda"))) {
                        $agenda .= filter_input(INPUT_GET, "agenda");
                    }
                    
                } else {
                    echo "<h4 style='color:red;'>¡ATENCIÓN!</h4>"
                    . "<ul><li>Para añadir un nuevo contacto, por favor indica un teléfono.</li>"
                    . "<li>Para aliminar un contacto ya existente, por favor, escribe el nombre tal cual está registrado en la agenda</li>"
                    . "<li>Para actualizar un teléfono, por favor, escribe el nombre tal cual está registrado y el nuevo número de teléfono.</li></ul>";
                }
            }

            displayForm();
            displayContacts();
        } else {
            displayForm();
            echo "<p>No hay contactos en la agenda.</p>";
        }

        /**
         * Impresión del formulario de registro
         * 
         * @global type $nombre
         * @global type $telefono
         * @global type $agenda listado total de contactos
         */
        function displayForm() {
            global $nombre, $telefono, $agenda;

            $form = "<form>" .
                    "<input type='text' name='nombre' placeholder='nombre' value=$nombre >" .
                    "<input type='number' name='telefono' placeholder='teléfono' value=$telefono >" .
                    "<input type='hidden' name='agenda' value=$agenda >" .
                    "<input type='submit' name='submit' value='insertar' > " .
                    "<h2>AGENDA</h2>" .
                    "</form>";

            echo $form;
        }

        /**
         * Lista de los contactos de la agenda
         * 
         * @global type $agenda listado de contactos
         */
        function displayContacts() {
            global $agenda;
            $contactos = explode(",", $agenda);
            $list = "<ul>";

            foreach ($contactos as $val) {
                if (strlen($val) > 0) {
                    $list .= "<li> $val </li>";
                }
            }

            //explode retorna 1 cuando el string está vacío, por lo que en la primera posición siempre tengo
            //+ info en https://stackoverflow.com/questions/36648491/why-does-explode-on-null-return-1-element
            if (count($contactos) === 1) {
                $list = "<p>No hay contactos en agenda.</p>";
            }

            $list .= "</ul>";

            echo $list;
        }

        /**
         * 
         * Validación del nombre introducido en la agenda,
         * si el $tlf viene vacío, se elimina el contacto,
         * si tiene valor, se reemplaza en el contacto ya existente
         * 
         * @param type $nombre nuevo nombre introducido
         * @param type $tlf nuevo teléfono introducido
         * @return string agenda seteada
         */
        function checkNombre($nombre, $tlf) {
            $new_agenda = "";
            $i = 0; //contador
            $contactos = explode(",", filter_input(INPUT_GET, "agenda"));
            array_pop($contactos); //elimino el último elemento, ya que al hacer explode, el ultimo es un string vacío


            while ($i < count($contactos)) {
                $contacto = explode(":", $contactos[$i]);

                if ($contacto[0] === $nombre && strlen($tlf) === 0) {
                    //elimino el contacto de la agenda
                    echo "¡Contacto eliminado!";
                } else if ($contacto[0] === $nombre && strlen($tlf) > 0) {
                    //seteo el valor del tlf de este contacto
                    $contacto[1] = $tlf;
                    $new_agenda .= $contacto[0] . ":" . $contacto[1] . ",";
                } else {
                    $new_agenda .= $contacto[0] . ":" . $contacto[1] . ",";
                }

                $i++;
            }

            return $new_agenda;
        }
        ?>

    </body>
</html>
