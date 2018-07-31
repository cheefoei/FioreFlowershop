<?php

class database {

    private $dbName = null, $dbHost = null, $dbPass = null, $dbUser = null;
    private static $instance = null;

    private function __construct($dbDetails = array()) {

        // Please note that this is Private Constructor

        $this->dbName = $dbDetails['db_name'];
        $this->dbHost = $dbDetails['db_host'];
        $this->dbUser = $dbDetails['db_user'];
        $this->dbPass = $dbDetails['db_pass'];

        $this->dbh = new PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUser, $this->dbPass);
    }

    public static function connect($dbDetails = array()) {

        if (self::$instance == null) {
            self::$instance = new database($dbDetails);
        }

        return self::$instance;
    }

}

?>