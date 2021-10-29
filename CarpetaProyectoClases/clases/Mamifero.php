<?php

/**
 * abstract --> Indica que esta clase no es instanciable
 */
abstract Class Mamifero {
    //clase abstracta que no se puede instanciar
    
    public function metodoClaseAbstracta() {
     echo "método de clase abstracta<br>";
    }
    
    /**
     * Los métodos abstractos son exclusivo de clases abstractas
     */
    public abstract function metodoAbstracto();
}

