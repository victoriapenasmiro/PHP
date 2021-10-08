<?php

$output = "<table style='border: 1px solid;'><tr><td style='border: 1px solid;'></td>";

const TOTAL_TABLES = 10;

for ($i = 0; $i <= TOTAL_TABLES; $i++) {

    if ($i === 0) {
        for ($j = 0; $j <= TOTAL_TABLES; $j++) {
            $output .= "<td style='border: 1px solid;'> $j </td>";
        }

        $output .= "</tr>";
    } else {
        for ($j = 0; $j <= TOTAL_TABLES; $j++) {
            if ($j === 0) {
                $output .= "<td style='border: 1px solid;'>$i</td>";
            }

            $output .= "<td style='border: 1px solid;'>" . $i * $j . "</td>";
        }
    }

    if ($i > 0) {
        $output .= "<tr>";
    }
}

$output .= "</table>";

echo $output;

/*
 * Tabla de multiplicar --res profesor
 */
define('MAX_MULTIPLICANDO', 10);
define('MAX_MULTIPLICADOR', 10);

$output2 = '<table border="2" align="center"><thead><tr><th>*</th>';
for ($i = 0; $i <= MAX_MULTIPLICADOR; $i++) {
    $output2 .= "<th>$i</th>";
}
$output2 .= '</tr></thead><tbody>';

for ($f = 0; $f < MAX_MULTIPLICANDO; $f++) {
    $output2 .= "<tr><th>$f</th>";
    for ($c = 0; $c <= MAX_MULTIPLICADOR; $c++) {
        $output2 .= '<td align="right">' . $f * $c . '</td>';
    }
    $output2 .= '</tr>';
}
$output2 .= '</tbody></table>';

echo $output2;
?>

<!--<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tablas de multiplicar</title>
        <style> td {
                border: 1px solid;
            }</style>
    </head>
    <body>
        <h1>Tablas de multiplicar</h1>
        <table style="border: 1px solid;">
            <?php
            $num = 0;

            for ($x = 0; $x <= 11; $x++) {
                $aux = 0; //incremental para multiplicar
                echo "<tr style='color:red;'>";

                if ($x === 0) {
                    echo "<td></td>";
                } else {
                    echo "<td>" . $num - 1 . "</td>";
                }

                while ($aux <= 10) {
                    if ($x === 0) {
                        echo "<td>$aux</td>";
                    } else {
                        echo "<td>" . ($num - 1) * $aux. "</td>";
                    }

                    $aux++;
                }

                echo "</tr>";

                $num++;
            }
            ?>
        </table>
    </body>
</html> -->

