<?php

/**
 * Description of CatalogMapper.php
 *All the functions from view and related to catalog in database will be executed here
 * @author Loo Jia Wei
 */
require_once '../connect_db.php';
require_once '../model/catalog.php';

Class CatalogMapper {

    public $error;

    public function loadAll() {
        $db = new connect_db();
        $conn = $db->connectPDO();
        // load one record from Database where id = $id
        $query = "SELECT * FROM catalog";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function load($id) {
        $db = new connect_db();
        $conn = $db->connectPDO();
        // load one record from Database where id = $id
        $query = "SELECT * FROM catalog WHERE catalog_id ='" . $id . "'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function save($newcatalog) {
        // insert new record or edit in Database
        $db = new connect_db();
        $conn = $db->connectPDO();
        $query = "INSERT INTO catalog (catalog_id, name, description, date_created, date_expired) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $newcatalog->catalog_id);
        $stmt->bindParam(2, $newcatalog->name);
        $stmt->bindParam(3, $newcatalog->description);
        $stmt->bindParam(4, $newcatalog->date_created);
        $stmt->bindParam(5, $newcatalog->date_expired);
        $stmt->execute();
    }

    public function update($cat) {
        $db = new connect_db();
        $conn = $db->connectPDO();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $query = "UPDATE catalog SET name='$cat->name',description='$cat->description',"
                    . "date_created='$cat->date_created',date_expired='$cat->date_expired' WHERE catalog_id='$cat->catalog_id'";
            $stmt = $conn->prepare($query);
            $result = $stmt->execute();
        } catch (Exception $e) {
            echo $e->getCode() . " " . $e->getMessage();
        }
    }

    public function delete($id) {
        // delete from Database
        $db = new connect_db();
        $conn = $db->connectPDO();
        $query = "DELETE FROM catalog WHERE catalog_id=" . $id;
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo "<p>Product deleted successfully!</p><br/>";
    }
    
    public function getLastRow() {
        // delete from Database
        $db = new connect_db();
        $conn = $db->connectPDO();
        $query = "SELECT * FROM catalog ORDER BY catalog_id DESC LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->execute();        
        return $stmt;
    }   

}

?>