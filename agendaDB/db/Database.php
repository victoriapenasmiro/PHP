<?php

// used to get mysql database connection
class Database {

    /* Esto es un singleton:
    constructor privado para que no se pueda instanciar método statico para ejecutar la conexión a la db
    todas las propiedades son privadas la propiedad de la conexión es static
    */
    private const DRIVER = "mysql";
    private const HOST = "localhost";
    private const DB_NAME = "agenda";
    private const USERNAME = "root";
    private const PW = "";
    private static $conn;

    public static function getConnection() {
        if (self::$conn !== null) {
            return self::$conn;
        }

        try {
            self::$conn = new PDO(self::DRIVER . ":host=" . self::HOST . ";dbname=" . self::DB_NAME, self::USERNAME, self::PW);
            self::$conn->exec('set names utf8');

            echo "Conexión a la db realizada correctamente<br><br>";
        } catch (PDOException $exception) {
            echo "Error de conexión " . $exception->getMessage();
        }

        return self::$conn;
    }

}
