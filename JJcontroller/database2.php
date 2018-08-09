<?php

require_once '../JJmodel/Piclup.php';
require_once '../JJmodel/Delivery.php';

class Database {

    private static $instance = null;
    private $conn;
    private $host = 'localhost';
    private $dbName = 'JunKit';
    private $dbuser = 'root';
    private $dbpassword = '';

    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->dbName}", $this->dbuser, $this->dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $ex) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    private function __clone() {
        
    }

    public function getConnection() {
        return $this->conn;
    }

    public function query() {
        $query = "SELECT * FROM self_pickup";
        if ($this->_query = $this->conn->prepare($query)) {
            if ($this->_query->execute()) {
                $result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $result;
    }

    public function query5() {
        $query = "SELECT * FROM floral_order";
        if ($this->_query = $this->conn->prepare($query)) {
            if ($this->_query->execute()) {
                $result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $result;
    }
    
        public function query2() {
        $query = "SELECT * FROM delivery";
        if ($this->_query = $this->conn->prepare($query)) {
            if ($this->_query->execute()) {
                $result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $result;
    }

}

?>
