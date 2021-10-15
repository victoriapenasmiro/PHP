<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario básico con php</title>
    </head>
    <body>
        <?php
        
        error_reporting(0); //peta porque las var nombre, edad y email no existen
        // no es necesario declararlas aqui
        $nombre = "";
        $edad = "";
        $email = "";

        //$_GET para recuperar los parametros de la URL
        if (isset($_GET['submit'])) {
            echo 'Formulario enviado correctamente';
        } else {
            displayForm();
        }

        function displayForm() {
            ?>

            <h1>Registro de usuario</h1>
            <!-- Si no especicamos method, por defecto es GET. Si no especificamos action, por defecto coge el script del propio fichero -->
            <form>
                <input type="text" name="nombre" placeholder="nombre" value=<?php $GLOBALS['nombre']; ?> >
                <input type="text" name="edad" placeholder="edad" value=<?php $GLOBALS['edad']; ?> >
                <input type="text" name="email" placeholder="email" value=<?php $GLOBALS['email']; ?> >
                <input type="submit" name="submit" />
            </form>
    <?php
}
?>
    </body>
</html>
