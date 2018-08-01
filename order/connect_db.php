<?php

class database {

    private $conn;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "flower";

    // Connecting to database
    public function connect() {

        // Connecting to mysql database
        $dsn = "mysql:host=$this->host;dbname=$this->db";

        try {
            $this->conn = new PDO($dsn, $this->user, $this->password);
        } catch (PDOException $ex) {
            echo '<script language="javascript">';
            echo 'alert("Database Error")';
            echo '</script>';
            exit;
        }
        // return database object
        return $this->conn;
    }

}

?>