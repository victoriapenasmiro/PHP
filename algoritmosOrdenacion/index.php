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
            insercionDirecta();
            seleccionDirecta();
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
            $cont = $aux = 0; //contador y auxiliar para controlar la ordenación
            $array = [34, 45, 78, 1, 2, 0, 100, 324, 23];

            echo "<h2>ORDENACIÓN BURBUJA</h2>";
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

        /**
         * Ordenación de una array método inserción Directa
         * 
         */
        function insercionDirecta() {
            $array = [12, 5, 780, 10, 29, 0, 120, 24, 3];
            $newArray = [];

            echo "<h2>INSERCIÓN DIRECTA</h2>";
            echo "array inicial sin ordenar: ";
            var_dump($array);
            echo "</br></br>";

            for ($i = 0; $i < count($array); $i++) {

                if ($i === 0) {
                    $newArray[] = $array[$i];
                } else {
                    cargarNumID($newArray, $array[$i]);
                }
            }

            echo "array ordenada: ";
            var_dump($newArray);
        }

        /**
         * 
         * Función para añadir 
         * 
         * @param type $newArray nueva array ordenada
         * @param type $num numero a insertar
         */
        function cargarNumID(&$newArray, $num) {
            $j = 0;
            $cargado = false;

            while (!$cargado && $j < count($newArray)) {

                if ($newArray[$j] > $num) {

                    array_splice($newArray, $j, 0, $num);
                    $cargado = true;
                } else if ($j === count($newArray) - 1) {
                    array_splice($newArray, count($newArray), 0, $num);
                    $cargado = true;
                }

                $j++;
            }
        }
        
        /**
         *  Ordenación de una array método selección Directa
         */
        function seleccionDirecta(){
            $array = [121, 35, 80, 0, 259, 10, 20, 4, 1];
            $min = $pos = "";
                        
            echo "<h2>SELECCIÓN DIRECTA</h2>";
            echo "array inicial sin ordenar: ";
            var_dump($array);
            echo "</br></br>";
            
            for($i = 0; $i < count($array); $i++) {
                
                $array_aux = array_slice($array, $i); //me quedo con la parte del array a buscar el min
                $min = min($array_aux); //valor minimo
                $pos = array_search($min, $array); //ubicación valor minimo
                
                array_splice($array, $pos, 1); //elimino elemento en su pos actual
                array_splice($array, $i, 0, $min); //añado numero min en pos actual

            }
            
            echo "array ordenada: ";
            var_dump($array);
        }
        
        
        ?>

    </body>
</html>