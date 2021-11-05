<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario Login</title>

        <!-- Plantilla: https://www.w3docs.com/learn-html/html-form-templates.html -->

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <style>
            html, body {
                display: flex;
                justify-content: center;
                font-family: Roboto, Arial, sans-serif;
                font-size: 15px;
            }
            form {
                border: 5px solid #f1f1f1;
            }
            input[type=text], input[type=password] {
                width: 100%;
                padding: 16px 8px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            button {
                background-color: #8ebf42;
                color: white;
                padding: 14px 0;
                margin: 10px 0;
                border: none;
                cursor: grabbing;
                width: 100%;
            }
            h1 {
                text-align:center;
                fone-size:18;
            }
            button:hover {
                opacity: 0.8;
            }
            .formcontainer {
                text-align: left;
                margin: 24px 50px 12px;
            }
            .container {
                padding: 16px 0;
                text-align:left;
            }
            span.psw {
                float: right;
                padding-top: 0;
                padding-right: 15px;
            }

            .error {
                color: red;
            }

        </style>
    </head>
    <body>         

        <?php
        // define variables and set to empty values
        $name = $pwd = $email = "";
        $nameErr = $pwdErr = $emailErr = "";

        //If the REQUEST_METHOD is POST, then the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = filter_input(INPUT_POST, "uname");
            $pwd = filter_input(INPUT_POST, "psw");
            $email = filter_input(INPUT_POST, "email");

            if (empty($email)) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($email);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }

            if (empty($name)) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($name);

                if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                    $nameErr = "Only letters and white space allowed";
                }
            }

            if (empty($pwd)) {
                $pwdErr = "Pwd is required";
            } else {
                $pwd = test_input($pwd);

                if (strlen($pwd) < 8) {
                    $pwdErr = "La contraseña debe incluir mínimo 8 caracteres";
                }
            }
        }

        /**
         * función básica para la validación de un formulario
         * 
         * @param type $data
         * @return type
         */
        function test_input($data) {
            //Strip unnecessary characters (extra space, tab, newline)
            $data = trim($data);

            //Remove backslashes (\)
            $data = stripslashes($data);

            //converts special characters to HTML entities
            $data = htmlspecialchars($data);

            return $data;
        }
        ?>

        <!-- The htmlspecialchars() function converts special characters to HTML entities.
        This means that it will replace HTML characters like < and > with &lt; and &gt;.
        This prevents attackers from exploiting the code by injecting HTML or Javascript code (Cross-site Scripting attacks)
        in forms. -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
            <h1>Login Form</h1>
            <div class="formcontainer">
                <hr/>
                <div class="container">
                    <label for="email"><strong>Email</strong></label><span class="error"> * <?php echo $emailErr; ?></span>
                    <input type="text" placeholder="Enter your e-mail" name="email" value="<?php echo $email;?>">
                    <label for="uname"><strong>Username</strong></label><span class="error"> * <?php echo $nameErr; ?></span>
                    <input type="text" placeholder="Enter Username" name="uname" value="<?php echo $name;?>">
                    <label for="psw"><strong>Password</strong></label><span class="error"> * <?php echo $pwdErr; ?></span>
                    <input type="password" placeholder="Enter Password" name="psw">
                </div>
                <button type="submit">Login</button>
                <div class="container" style="background-color: #eee">
                    <label style="padding-left: 15px">
                        <input type="checkbox"  checked="checked" name="remember"> Remember me
                    </label>
                    <span class="psw"><a href="#"> Forgot password?</a></span>
                </div>

                <?php
                if (!empty($name) && !empty($pwd) && !empty($email)) {
                    echo "<h2>Datos introducidos:</h2><br>";
                    echo "$name - $email : $pwd";
                }
                ?>
            </div>
        </form>


    </body>
</html>
