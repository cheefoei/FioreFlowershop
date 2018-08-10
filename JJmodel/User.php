<!-- 
Name: Lim Jun Kit
 Group: G6
-->
<?php

class User {

    private $id;
    private $type;
    private $name;
    private $status;
    private $password;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getType() {
        return $this->type;
    }

    function getName() {
        return $this->name;
    }

    function getStatus() {
        return $this->status;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setPassword($password) {
        $this->password = $password;
    }
}
