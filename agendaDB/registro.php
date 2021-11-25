<?php

// set page title
$page_title = "Agenda con DB y Clases";

/**
 * Formulario de registro
 * 
 * @global type $nombre
 * @global type $telefono
 */
function displayForm() {
    global $nombre, $telefono;

    $output = "<form action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' method='post' >" .
            "<h1>Formulario de registro</h1>" .
            "<div class='formcontainer'>" .
            "<hr/><div class='container'>" .
            "<input type='text' name='nombre' placeholder='nombre' value=$nombre ><br><br>" .
            "<input type='number' name='telefono' placeholder='telefono' value=$telefono ><br><br>" .
            "<button type='submit'>Añadir</button>" .
            "</div></div></form>";

    echo $output;
}

/**
 * Validación de los formatos y campos vacíos
 * 
 * @global type $nombre
 * @global type $telefono
 * @return boolean true si no hay errores, false si no pasa la validación
 */
function checkConditions($contacto) {

    //valido que el usuario haya introducido el nombre del nuevo contacto a registrar
    if (empty($contacto->nombre)) {

        echo "<h4 class='error'>¡ATENCIÓN!</h4><p class='error'>El nombre es obligatorio.</p>";

        return;
    } else if (empty($contacto->telefono)) {

        $contacto->eliminarContacto();

        return;
    } else if (strlen($contacto->telefono) < 9) {

        echo "<h4 class='error'>¡ATENCIÓN!</h4><p class='error'>El teléfono indicado no es válido."
        . " Por favor, sigue  el formato 9 dígitos entre 0 y 9, ambos incluidos. </p>";

        return;
    } else {
        $contacto->crearContacto();
    }

    return;
}
