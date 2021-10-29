<?php

//**** IMPORTANTE!! ****
//include "Felino.php"; --> Si utilizamos el cargado en el fichero index.php no 
//hay que incluirlo en los ficheros de clases

//otro ejemplo para importar: require "ruta/fichero.php" // requiere_once // include_once
//include --> Si no encuentra el fichero no para el script
//require --> Si no encuentra el fichero para la ejecución del script
//.._once --> importa una sola vez el fichero


/*
 * ANULAR MÉTODO HEREDADO DE LA CLASE PADRE
 * 
 * Para sustituir en la clase hijo el comportamiento de un método de la
 * clase padre, crearemos en la clase hijo un método con el mismo nombre que el de
 * la clase padre.
 * 
 * Si no queremos anularlo, sino añadir + cosas, podemos hacer invocando al padre desde
 * dentro con parent::nombreMetodo();
 * 
 */

/* 
 * Ejemplo clase hijo
 * 
 * final --> Para que no sea heredable, es decir que no tendrá clases hijos
 * 
 */
final Class Gato extends Felino {
    private $adoptado;
    
    //Si no se declara el constructor hereda el del padre
    
    function __construct(string $color, bool $sexo, bool $adoptado = false) {
        parent::__construct($color, $sexo);
        $this->adoptado = $adoptado;
        
        echo "contructor de la clase hijo Gato $color, $sexo y adoptado: $adoptado<br>";
    }
    
    //ideam que realizar unset($name)
    function __destruct() {
        echo "destruyendo instancia Gato<br>";
    }
    
    // se utiliza para setear una propiedad del objeto
    // o añadir una variable al objeto creado que no esta definida en si misma en la clase
    public function __set($var, $value) {
        echo "<br>Estableciendo '$var' a '$value'\n";
        $this->$var = $value;
        
        return $this->$var;
    }
    
}
