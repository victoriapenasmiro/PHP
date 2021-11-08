<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Calcular visitas con sesiones</title>
    </head>
    <body>

        <?php
        
        session_start();

        if (isset($_SESSION['contador'])) {
            $_SESSION['contador'] = $_SESSION['contador'] + 1;
        } else {
            $_SESSION['contador'] = 0;
        }

        echo "Has visitado esta página " . $_SESSION['contador'] . " veces. <br>";

        var_dump($_SESSION);

        //remove session cookie
        // If (isset($_COOKIE[session_name()])) {
        //  setcookie(session_name(), '', time() - 3600, '/');
        //  unset($_COOKIE[session_name()]);
        // }
        
        // remove all session variables
        //session_unset();
        
        // destroy the session
        //session_destroy();
        
        ?>
    </body>
</html>
