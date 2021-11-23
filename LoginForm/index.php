<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Form</title>
    </head>
    <body>
        <?php
        ?>

        <h1>Formulario de Login</h1>
        <form action="<?php echo htmlspecialchars('login.php'); ?>" method="post">
            <input type="text" name="login" placeholder="Login" /><br><br>
            <input type="password" name="pw" placeholder="contraseña" /><br><br>
            <input type="submit" />
        </Form>
    </body>
</html>
