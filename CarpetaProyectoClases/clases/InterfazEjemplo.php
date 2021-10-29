<?php

/**
 * Todos los métodos en una interfaz deben ser públicos (de lo contrario, no sería una interfaz).
 * 
 * Las interfaces no pueden contener propiedades.
 * 
 * Solo declaran métodos que no pueden contener ningún código.
 * 
 * Para que una clase implemente un interfaz (o más) añadiremos la palabra clave ‘implements’ después del nombre de la clase.
 * Si implementa más de una interfaz, estas irán separadas por comas.
 */
Interface InterfazEjemplo {
    
    public function metodoDeInterfaz($name);
    
}

