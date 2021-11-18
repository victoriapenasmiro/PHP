<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario son subida de archivos</title>
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
        $name = $file = $email = "";
        $nameErr = $fileErr = $emailErr = "";

        //If the REQUEST_METHOD is POST, then the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = filter_input(INPUT_POST, "uname");
            $email = filter_input(INPUT_POST, "email");
            $file = $_FILES["file"]["name"];

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

            //validación de fichero
            switch ($_FILES["file"]["error"]) {
                case 0:
                    $fileErr = "fichero enviado correctamente";
                    $uploads_dir = '/Users/victoriapenas/Sites/PHP/Forms/archivos';
                    $tmp_name = $_FILES["file"]["tmp_name"];
                    // basename() puede evitar ataques de denegación de sistema de ficheros;
                    $file_name = basename($_FILES["file"]["name"]);
                    
                    move_uploaded_file($tmp_name, "$uploads_dir/$file_name");

                    break;
                case 1:
                    $fileErr = "Tamaño del fichero inválido, es muy grande";
                    break;
                case 2:
                    $fileErr = "Tamaño del fichero inválido, es muy grande";
                    break;
                case 4:
                    $fileErr = "Es obligatorio adjuntar un archivo";
                    break;
                case 6:
                    $fileErr = "Error de servidor, no se ha podido almacenar el fichero.";
                    break;
                case 7:
                    $fileErr = "Error de servidor, el fichero no se ha podido escribir en el disco";
                    break;
                default:
                    $fileErr = "Error de carga";
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

        //instrucción para mover archivos en PHP
        //https://www.php.net/manual/es/function.move-uploaded-file.php
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"  enctype="multipart/form-data">
            <h1>Formulario con subida de archivos</h1>
            <div class="formcontainer">
                <hr/>
                <div class="container">
                    <label for="email"><strong>Email</strong></label><span class="error"> * <?php echo $emailErr; ?></span>
                    <input type="text" placeholder="Enter your e-mail" name="email" value="<?php echo $email; ?>">
                    <label for="uname"><strong>Username</strong></label><span class="error"> * <?php echo $nameErr; ?></span>
                    <input type="text" placeholder="Enter Username" name="uname" value="<?php echo $name; ?>">
                    <label for="file"><strong>Archivo</strong></label><span class="error"> * <?php echo $fileErr; ?></span>
                    <input type="file" name="file">

<?php
$output = "<p>";
$output .= strlen($file) ? "Fichero enviado:" . $file : "" . "</p>";

echo $output;
?>

                </div>
                <button type="submit">Login</button>

            </div>

<?php
var_dump($_FILES);
?>

        </form>
    </body>
</html>
