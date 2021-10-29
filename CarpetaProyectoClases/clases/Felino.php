<?php

/* 
 * Ejemplo clase padre
 * @autor victoria peñas
 * @version 1.0
 * 
 */
Class Felino extends Mamifero{
    
    //atributos
    private $color;
    private $sexo;
    
    /**
     * Constructor con parametros
     * 
     * @param string $color
     * @param bool $sexo 0 -> Hembra / 1 --> Macho
     */
    function __construct(string $color, bool $sexo){
        $this->color = $color;
        $this->sexo = $sexo;
        
        echo "Contructor clase padre Felino. Parametros recibidos: $color, $sexo <br>";
    }
    
    /**
     * final --> Para impedir que un método hijo anule este método de la clase padre.
     */
    public final function metodoPrueba(){
        echo "<br>método de pruebas<br>";
    }
    
    public function metodoClaseAbstracta() {
        parent::metodoClaseAbstracta();
        echo "Estoy dentro del hijo heredando una clase abstracta<br>";
    }

    public function metodoAbstracto() {
        echo "esto es un método abstracto, heredado de la clase padre abstracta Mamífero<br>c";
    }
    
}
