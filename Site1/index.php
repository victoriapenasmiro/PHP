

<!DOCTYPE html>
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
                $aux = 0;
                echo "<tr>";

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
</html>


