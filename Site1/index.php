<!-- Estados de las variables de forma dinámica -->
<style>

    table, td, th {
        border: 1px solid;
        padding: 3px;
    }

    th {
        font-weight: 800;
    }

</style>

<?php
echo "<h1>ESTADOS DE LAS VARIABLES</h1>";

$output = "<table><tr><th>Contenido de \$var</th><th>isset(\$var)</th><th>empty(\$var)</th><th>(bool) \$var</th></tr>";

//listado de valores a analizar
$values_check = array(null, 0, true, false, "0", "", "foo", array(), /* 'functUnset' => function () {
          unset($GLOBALS['var']);

          if (!isset($GLOBALS['var'])) {
          return 'undefined';
          }
          } */);

//ejemplo ejecución function dentro de una variable
//echo $values_check['functUnset']();


for ($i = 0; $i < count($values_check); $i++) {

    $output .= "<tr>" . getNameValues($values_check[$i]) . "<td>";

    checkValue($values_check[$i]);

    if ($i === count($values_check) - 1) {
        $output .= "<tr><td>uset(\$var)</td><td>";
        $var = "var inicializada";
        unset($var);
        error_reporting(0); //elimino el warning que muestra al utlizar $var al desactivarla.
        checkValue($var);
    }
 
    $output .= "</tr>";
}

/**
 * Vemos el valor de la variable recibida por parámetros con isset, empty y (bool)
 * 
 * @param type $value variable a revisar
 */
function checkValue($value) {

    isset($value) ? $GLOBALS['output'] .= "true" : $GLOBALS['output'] .= "false";

    $GLOBALS['output'] .= "</td><td>";

    empty($value) ? $GLOBALS['output'] .= "true" : $GLOBALS['output'] .= "false";

    $GLOBALS['output'] .= "</td><td>";

    (bool) $value ? $GLOBALS['output'] .= "true" : $GLOBALS['output'] .= "false";

    $GLOBALS['output'] .= "</td>";
}

/**
 * Devuelve el nombre de las variable a analizar
 * @param type $value
 * @return string primera celda
 */
function getNameValues($value) {

    $output = "<td>";

    if (!isset($value)) {
        $output .= "null";
    } elseif ($value === true) {
        $output .= "true";
    } elseif ($value === false) {
        $output .= "false";
    } elseif ($value === "0") {
        $output .= "'0'";
    } elseif ($value === "") {
        $output .= "''";
    } elseif ($value === array()) {
        $output .= "array()";
    } else {
        $output .= $value;
    }

    $output .= "</td>";

    return $output;
}

function prueba() {

    if (isset($GLOBALS['var'])) {
        echo 'true';

        return true;
    }

    echo 'false';

    return false;
}

$output .= "</table>";
echo $output;
