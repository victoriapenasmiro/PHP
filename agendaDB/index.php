<?php

// include register functions
include_once "registro.php";

// include clases
include_once "db/Database.php";
include_once "clases/Contacto.php";

// include page header HTML
include_once "layout_head.php";

// get database connection
$contacto = new Contacto(Database::getConnection());

$nombre = $telefono = $created = "";

//If the REQUEST_METHOD is POST, then the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim(strtolower(filter_input(INPUT_POST, "nombre")));
    $telefono = trim(strtolower(filter_input(INPUT_POST, "telefono")));

    $contacto->nombre = $nombre;
    $contacto->telefono = $telefono;

    checkConditions($contacto);
}

displayForm();

include_once "lista_contactos.php";

// include page footer HTML
include_once "layout_foot.php";

