<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //function __autoload --> ya no está soportado en versión8 de PHP
        
        /*
         * En caso de que haya + de un directorio con clases, se podría crear
         * una función por cada ruta y crear un cargador para cada función,
         * de modo que si al declarar una instancia no se encuentra en el primer cargados
         * se busca en el segundo
         * 
         * Ejemplo:
         * 
         * function cargador1($clase) { include "clases/$clase.php"; }
         * function cargador2($clase) { include "clases222/$clase.php"; }
         * 
         * spl_autoload_register("cargador1");
         * spl_autoload_register("cargador2");
         * 
         */

        /* opcion 1
         * function cargadorDeClases($nombre_fichero) {
          include "clases/$nombre_fichero.php";
          }

          spl_autoload_register("cargadorDeClases");
         */

        /* opcion 2: Ejemplo con función anónima
            spl_autoload_register(function ($clase) {
                include 'clases/' . $clase . '.php';
            });
        */

        /*
         * Opcion 3 ---- Mejor opcion
         */
        $clases = [
            "Gato" => "clases/Gato.php",
            "Felino" => "clases/Felino.php",
            "Mamifero" => "clases/Mamifero.php",
            "Persona" => "clases/Persona.php",
            "InterfazEjemplo" => "clases/InterfazEjemplo.php",
            "Coche" => "clases/Coche.php" //esta clase no existe, pero no da error, si no se intancia
        ];

        spl_autoload_register(function ($clase) {
            global $clases;
            include $clases[$clase];
            
        });

        $obj_felino = new Felino('rojo', 1);
        $pers = new Persona();
        $pers->metodoDeInterfaz("\$pers");
        
        //$gatoSinParametros = new Gato; // --> No funciona porqué no le envío los parámetros que espera
        $gato = new Gato('rojo', 1);
        $gato->nombre= "miki"; //Con la function __set creo un nuevo atributo para este objeto, que no existe en la clase
        
        echo "<br>";
        var_dump($gato);
        
        $gato->metodoPrueba();
        $gato->metodoClaseAbstracta();
        $gato->metodoAbstracto();
        
        unset($gato); //llama al destructor si está definido
        $gato->metodoPrueba(); // recupero un error porqué la instancia se ha desactivado
        
        ?>
    </body>
</html>


