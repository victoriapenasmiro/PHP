<?php

// 'user' object
class User {

    // database connection and table name
    private $conn;
    private $table_name = "login";
    // object properties
    public $id;
    public $username;
    public $pw;

    // constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    function loginExists() {

        // query to check if email exists
        $query = "SELECT id, username, pw
            FROM " . $this->table_name . "
            WHERE username = ? AND pw = ? LIMIT 1";
        // prepare the query
        $stmt = $this->conn->prepare($query);

        // bind given email value
        $stmt->bindParam(1, $this->username);
        $stmt->bindParam(2, $this->pw);

        // execute the query
        $stmt->execute();

        // get number of rows
        $num = $stmt->rowCount();

        // if email exists, assign values to object properties for easy access and use for php sessions
        if ($num > 0) {

            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // assign values to object properties
//            $this->id = $row['id'];
//            $this->username = $row['username'];
//            $this->pw = $row['pw'];

            echo "login correcto";
            // return true because login exists in the database
            return true;
        }

        echo "login incorrecto";
        // return false if login does not exist in the database
        return false;
    }

}
