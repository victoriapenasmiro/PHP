<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario básico con php</title>
    </head>
    <body>
        <?php
        if (filter_input(INPUT_GET, "submit")) {
            $numeros = explode(",", filter_input(INPUT_GET, "numeros")); // split string to an Array

            foreach ($numeros as $num) {
                echo (int) $num;
            }
        } else {
            //echo displayForm();
            ordenacionBurbuja();
        }

        /**
         * 
         * @return string formulario para añadir numeros manualmente
         */
        function displayForm() {
            $output = "<h1>Algoritmos de ordenación</h1><h2>Burbuja</h2>" .
                    "<form>" .
                    "<label for='numeros'>Por favor, introduce un listado de números enteros separados por coma.</label></br>" .
                    "<input type='text' name='numeros' id='numeros' />" .
                    "<input type='submit' name='submit' />" .
                    "</form>";

            return $output;
        }

        /**
         * Ordenación de un array método burbuja
         * 
         */
        function ordenacionBurbuja() {
            $array = [34, 45, 78, 1, 2, 0, 100, 324, 23];
            $cont = $aux = 0; //contador y auxiliar para controlar la ordenación

            echo "array inicial sin ordenar: ";
            var_dump($array);
            echo "</br></br>";

            do {
                $aux = 0;
                for ($i = 0; $i < count($array); $i++) {
                    if ($i < count($array) - 1) {
                        giroValor($aux, $array, $i);
                    }
                }

                $cont++;
            } while ($aux > 0 && $cont < count($array));

            echo "array ordenada método burbuja: ";
            var_dump($array);
        }

        /**
         * Intercambia el valor entre dos posiciones
         * 
         * @param type $aux auxiliar para controlar si se producen giros
         * @param type $array lista de numeros a ordenar
         * @param type $i puntero que indica la posicion en $array
         */
        function giroValor(&$aux, &$array, $i) {
            if ($array[$i] > $array[$i + 1]) {
                $mayor = $array[$i];

                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $mayor;
                $aux++;
            }
        }
        ?>

    </body>
</html>