<?php

/*
 * Ejemplo __get, __set y __call
 * 
 */

Class MiClase {

    private $var = 0;
    private $valor;

    // constructor con parametros.
    // Si no se declara, las instancias se declarar sin (), como MiClase;z
    public function __construct($valor) {
        $this->valor = $valor;
    }

    // cuando se intenta recuperar un valor invisible, automáticamente se ejecuta esta función
    public function __get($var) {
        return $this->$var;
    }

    // se utiliza para setear una propiedad del objeto
    public function __set($var, $value) {
        echo "<br>Estableciendo '$var' a '$value'\n";
        $this->$var = $value;
        return $this->$var;
    }

    // es lanzado al invocar un método inaccesible en un contexto de objeto.
    public function __call($name, $arguments) {
        // Nota: el valor $name es sensible a mayúsculas.
        echo "<br>Llamando al método de objeto '$name' "
        . implode(', ', $arguments) . "\n";
    }

}

//Si no tengo constructor puedo instanciar sin () como new MiClase;
$prueba = new MiClase("prueba");
echo "Valor de la prop \$var $prueba->var";

$prueba->var = 4;

$prueba->metodoInexistente('param1', 'Param2');
