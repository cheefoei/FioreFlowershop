<?php

require_once '../connect_db.php';
require_once '../model/product.php';

Class ProductMapper {

    public $error;

    public function loadAll() {
        $db = new connect_db();
        $conn = $db->connectPDO();
        // load one record from Database where id = $id
        $query = "SELECT * FROM product";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function load($id) {
        $db = new connect_db();
        $conn = $db->connectPDO();
        // load one record from Database where id = $id
        $query = "SELECT * FROM product WHERE product_id ='" . $id . "'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function save($newproduct) {
        // insert new record or edit in Database
        $db = new connect_db();
        $conn = $db->connectPDO();
        $query = "INSERT INTO product (product_id, product_name, product_type, product_description, date_created, date_expired, total_stock, price, weight) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $newproduct->product_id);
        $stmt->bindParam(2, $newproduct->product_name);
        $stmt->bindParam(3, $newproduct->product_type);
        $stmt->bindParam(4, $newproduct->product_description);
        $stmt->bindParam(5, $newproduct->date_created);
        $stmt->bindParam(6, $newproduct->date_expired);
        $stmt->bindParam(7, $newproduct->total_stock);
        $stmt->bindParam(8, $newproduct->price);
        $stmt->bindParam(9, $newproduct->weight);
        $stmt->execute();
    }

    public function update($prod) {
        $db = new connect_db();
        $conn = $db->connectPDO();
        try {
            $query = "UPDATE product SET product_name='$prod->product_name',product_type='$prod->product_type',"
                    . "product_description='$prod->product_description',date_created='$prod->date_created,"
                    . "date_expired='$prod->date_expired,total_stock='$prod->total_stock,price='$prod->price',"
                    . "weight='$prod->weight WHERE product_id='$prod->product_id'";
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
        $query = "DELETE FROM product WHERE product_id=" . $id;
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo "<p>Product deleted successfully!</p><br/>";
    }

}

?>