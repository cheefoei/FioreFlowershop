<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class catalog {

    private $conn;

    function __construct() {
        require_once 'connect_db.php';
        $db = new database();
        $this->conn = $db->connect();
    }

    function getCatalog() {
        //$stmt = $this->conn->prepare("SELECT p.product_name, p.product_description, p.date_expired, p.total_stock, p.price, p.weight, c.name, c.description, c.date_expired as c_expiredDate, cl.catlist_id FROM product p, catalog c, catalog_list cl WHERE p.product_id = cl.product_id AND cl.catalog_id = c.catalog_id");
        $stmt = $this->conn->prepare("SELECT DISTINCT c.catalog_id, c.name, c.description, c.date_expired as c_expiredDate FROM product p, catalog c, catalog_list cl WHERE p.product_id = cl.product_id AND cl.catalog_id = c.catalog_id");
        //$stmt = $this->conn->prepare("SELECT * from product");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = $this->conn->prepare("SELECT c.catalog_id, p.product_id, p.product_name, p.product_description, p.date_expired, p.total_stock, p.price, p.weight, cl.catlist_id FROM product p, catalog c, catalog_list cl WHERE p.product_id = cl.product_id AND cl.catalog_id = c.catalog_id");
        $stmt->execute();
        $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        for ($a = 0; $a < count($result); $a++) {
            for ($b = 0; $b < count($result2); $b++) {
                if ($result[$a]['catalog_id']==$result2[$b]['catalog_id']) {
                    $result[$a][] = $result2[$b];
                }
            }
        }
        //print_r($result);
        return($result);
    }

}
