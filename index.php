<?php echo ini_get("session.save_path"); //phpinfo(); //xdebug_info(); echo ini_get("session.save_path");

//create a new session
session_start();

$_SESSION["favcolor"] = "yellow";

//print_r($_SESSION);

// remove all session variables
session_unset();

// destroy the session
session_destroy();


var_dump(PHP_INT_MAX);
var_dump(PHP_INT_MAX + 1);