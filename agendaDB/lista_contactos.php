<?php

// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// set number of records per page
$records_per_page= 6;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// read all users from the database
$stmt = $contacto->mostrarContactos($from_record_num, $records_per_page);

// count retrieved contacts by page
$rows_page = $stmt->rowCount();

$list = "<div style='margin-top: 60px; display:block;' ><h2>LISTADO DE CONTACTOS</h2>";

if ($rows_page > 0) {

    $list .= "<table>";

    // table headers
    $list .= "<tr>";
    $list .= "<th>Nombre</th>";
    $list .= "<th>Telefono</th>";
    $list .= "</tr>";
    
    // loop through the user records
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        // display user details
        $list .= "<tr>";
        $list .= "<td>{$name}</td>";
        $list .= "<td>{$phone}</td>";
        $list .= "</tr>";
    }

    $list .= "</table>";
    
        
} else {
    $list .= "<p>No existe ningún contacto en la agenda.</p>";
}

$list .= "</div>";
echo $list;

// to identify page for paging
$page_url = "index.php?";

include "paging.php";