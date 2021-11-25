<?php

/**
 * Contacto agenda
 * 
 */
Class Contacto {

    public $nombre;
    public $telefono;
    private $conn;

    const TABLE_NAME = "contactos";

    // constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Creación de un nuevo contacto
     * Se realiza un insert del nuevo registro en la db
     * 
     * @return boolean
     */
    public function crearContacto() {
        //si el usuario existe lo actualizo en la db
        if ($this->checkIfExists()) {

            $this->actualizarContacto();
        } else {
            // insert query
            $query = "INSERT INTO " . $this::TABLE_NAME . "
                            SET
                        name = :nombre,
                        phone = :telefono";

            // prepare the query
            $stmt = $this->conn->prepare($query);

            // sanitize
            $this->nombre = htmlspecialchars(strip_tags($this->nombre));
            $this->telefono = htmlspecialchars(strip_tags($this->telefono));

            // bind the values
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':telefono', $this->telefono);

            // execute the query, also check if query was successful
            if ($stmt->execute()) {
                echo "<p style='color: green'; >Usuario creado correctamente<p>";
                return true;
            } else {
                $this->showError($stmt);

                return false;
            }
        }
        return true;
    }

    /**
     * Eliminación de un contacto de la agenda
     * en la base de datos
     * 
     * @return boolean
     */
    public function eliminarContacto() {
        // insert query
        $query = "DELETE FROM " . $this::TABLE_NAME . "
            WHERE 
        name = ?";

        // prepare the query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));

        // bind the values
        $stmt->bindParam(1, $this->nombre);

        // execute the query, also check if query was successful
        if ($stmt->execute()) {

            //si el usuario existe lo elimino de la db
            if ($stmt->rowCount()) {

                echo "<p style='color: green';>Contacto eliminado correctamente.</p>";
            } else {

                echo "<h4 class='error'>¡ATENCIÓN!</h4><p class='error'>El nombre indicado no está registrado.</p>";
            }

            return true;
        } else {
            $this->showError($stmt);

            return false;
        }
    }

    /**
     * Actualización de un contacto de la agenda
     * 
     * @return boolean
     */
    public function actualizarContacto() {
        // insert query
        $query = "UPDATE " . $this::TABLE_NAME . "
            SET phone = :telefono
            WHERE name = :nombre";

        // prepare the query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));

        // bind the values
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':telefono', $this->telefono);

        // execute the query, also check if query was successful
        if ($stmt->execute()) {
            echo "<p style='color: green';>Contacto actualizado correctamente.</p>";
            return true;
        } else {
            $this->showError($stmt);
            return false;
        }
    }

    /**
     * Función para mostrar todos los contactos 
     * existentes en una tabla
     * 
     */
    public function mostrarContactos($from_record_num, $records_per_page) {
        // query to read all user records, with limit clause for pagination
        $query = "SELECT
                *
            FROM " . $this::TABLE_NAME . "
            ORDER BY id DESC
            LIMIT ?, ?";
            
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind limit clause variables
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        // return values
        return $stmt;
    }
    
    /**
     * Recuperamos el numero total de contactos existentes
     * 
     * @return int
     */
    public function allContacts() {

        // query to select all user records
        $query = "SELECT * FROM " . $this::TABLE_NAME . "";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        // get number of rows
        $num = $stmt->rowCount();

        // return row count
        return $num;
    }
    

    /**
     * Función para buscar si un usuario existe o no en la db
     * 
     * @return boolean
     */
    public function checkIfExists() {

        // insert query
        $query = "SELECT * FROM " . $this::TABLE_NAME . "
            WHERE 
        name = ?";

        // prepare the query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));

        // bind the values
        $stmt->bindParam(1, $this->nombre);

        // execute the query, also check if query was successful
        if ($stmt->execute()) {
            return $stmt->rowCount();
        } else {
            $this->showError($stmt);

            return false;
        }
    }

    /**
     * 
     * @param Object $stmt conexión db
     */
    public function showError($stmt) {
        echo "<pre>";
        print_r($stmt->errorInfo());
        echo "</pre>";
    }

}
