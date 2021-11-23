<?php

include_once './database/Database.php';
include './clases/User.php';

$login = $password = $userLogged = "";

//If the REQUEST_METHOD is POST, then the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    $login = filter_input(INPUT_POST, "login");
    $password = filter_input(INPUT_POST, "pw");

    if (empty($login) || empty($password)) {
        
        echo "All data is required<br><br>";
    } else {
        $userLogged = new User($db);
        $login = test_input($login);
        $password = test_input($password);
        
        $userLogged->username = $login;
        $userLogged->pw = $password;
        
        $userLogged->loginExists();
        
    }

}

function test_input($data) {
    //Strip unnecessary characters (extra space, tab, newline)
    $data = trim($data);

    //Remove backslashes (\)
    $data = stripslashes($data);

    //converts special characters to HTML entities
    $data = htmlspecialchars($data);

    return $data;
}
