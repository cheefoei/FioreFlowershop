<?php

/**
 * This is the mapper that has the function relating cataloglist in database and all the view(.php file)
 * in the mvc to access database.
 *
 * @author Loo Jia Wei
 */
require_once '../connect_db.php';
require_once '../model/catalog_list.php';

class CatListMapper {

    //put your code here
    public $error;

    public function loadAll() {
        $db = new connect_db();
        $conn = $db->connectPDO();
        // load one record from Database where id = $id
        $query = "SELECT * FROM catalog_list";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function load($id) {
        $db = new connect_db();
        $conn = $db->connectPDO();
        // load one record from Database where id = $id
        $query = "SELECT * FROM catalog_list WHERE catlist_id ='" . $id . "'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getCatList($catalog_id) {
        $db = new connect_db();
        $conn = $db->connectPDO();
        // load one record from Database where id = $id
        $query = "SELECT * FROM catalog_list WHERE catalog_id ='" . $catalog_id . "'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function save($newcatlist) {
        // insert new record or edit in Database
        $db = new connect_db();
        $conn = $db->connectPDO();
        $query = "INSERT INTO catalog_list (catlist_id, catalog_id, product_id) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $newcatlist->catlist_id);
        $stmt->bindParam(2, $newcatlist->catalog_id);
        $stmt->bindParam(3, $newcatlist->product_id);
        $stmt->execute();
    }

    public function update($newcatlist) {
        $db = new connect_db();
        $conn = $db->connectPDO();
        try {
            $query = "UPDATE catalog_list SET catalog_id='$newcatlist->catalog_id',product_id='$newcatlist->product_id', WHERE catlist_id='$newcatlist->catlist_id'";
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
        $query = "DELETE FROM catalog_list WHERE catlist_id=" . $id;
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo "<p>Product deleted successfully!</p><br/>";
    }

}
