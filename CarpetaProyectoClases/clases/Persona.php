<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

Class Persona implements InterfazEjemplo {
    public function __construct() {
        echo "instanciando clase Persona <br>";
    }

    public function metodoDeInterfaz($name) {
        echo "método de interfaz heredado a desarrollar para el objeto $name<br>";
    }

}