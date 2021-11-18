<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Visitas a una página con cookies</title>
    </head>
    <body>
        <?php
        
        $cookie_name = "contador";
        $cookie_contador = htmlspecialchars($_COOKIE[$cookie_name]);
        $cookie_value;

        if (!isset($cookie_contador)) {
            $cookie_value = 0;
            echo "Cookie named '" . $cookie_name . "' is not set!";
        } else {
            $cookie_value = $cookie_contador + 1;
            echo "Cookie '" . $cookie_name . "' is set!<br>";
            echo "Value is: " . $cookie_value;
        }

        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        
        //remove session cookie
        // If (isset($_COOKIE[$cookie_name])) {
        //  setcookie($cookie_name, '', time() - 3600, '/');
        //  unset($_COOKIE[$cookie_name]);
        // }
        ?>
    </body>
</html>
