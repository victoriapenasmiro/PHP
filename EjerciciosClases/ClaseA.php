<?php

/**
 * Ejercicio: bloqueamos el acceso a algunas variables con los métodos mágicos __get y __set
 * 
 */
Class ClaseA {

    public $publica = 0;
    protected $protegida;
    private $privada1, $privada2, $privada3;

    function __construct($publica, $protegida, $privada1, $privada2, $privada3) {
        $this->publica = $publica;
        $this->protegida = $protegida;
        $this->privada1 = $privada1;
        $this->privada2 = $privada2;
        $this->privada3 = $privada3;
    }

    /**
     * 
     * En este __get no se permite acceder al valor del atributo $privada3
     * 
     * @param type $name 
     * @return type
     */
    public function __get($name) {
        if ($this->$name !== $this->privada3) {
            return $this->$name;
        }

        echo "<br>Intento de acceso al atributo $name. ¡No es accesible!<br>";
        return null;
    }

    /**
     * 
     * En este __set no se permite cambiar el valor del atributo $privada1
     * 
     * @param type $name
     * @param type $newValue
     * @return type
     */
    public function __set($name, $newValue) {
        
        if ($this->$name !== $this->privada1) {
            $this->$name = $newValue;
            var_dump($this);

            return;
        }

        echo "<br>No se puede cambiar el valor del atributo $name. ¡No es accesible!<br><br>";
        return null;
    }

}

$pruebaInstancia = new ClaseA(1, 2, 3, 4, 5);
var_dump($pruebaInstancia);

echo "<br>valor atributo \$privada2: $pruebaInstancia->privada2<br>";

if ($pruebaInstancia->privada3) {
    echo "<br>valor atributo \$privada3: $pruebaInstancia->privada3<br>";
}

$pruebaInstancia2 = new ClaseA(1, 2, 3, 4, 5);

$pruebaInstancia2->privada2 = 100;
