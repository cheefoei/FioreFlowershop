<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.


 */

class manageOrder {

    private $conn;

    function __construct() {
        require_once '../connect_db.php';
        $db = database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function addOrder($cust_id, $amount, $status) {
        $stmt = $this->conn->prepare("INSERT INTO floral_order(customer_id,total_amount,status) VALUES(?,?,?)");
        $stmt->bindParam(1, $cust_id);
        $stmt->bindParam(2, $amount);
        $stmt->bindParam(3, $status);
        $stmt->execute();
        
        return $this->conn->lastInsertId() ;
    }
    
    public function addOrderList($order_id, $product_id, $quantity) {
        $stmt = $this->conn->prepare("INSERT INTO order_list(order_id,product_id,quantity) VALUES(?,?,?)");
        $stmt->bindParam(1, $order_id);
        $stmt->bindParam(2, $product_id);
        $stmt->bindParam(3, $quantity);
        $stmt->execute();
    }

    public function getProduct() {
        $stmt = $this->conn->prepare("SELECT * FROM product");
        $stmt->execute();

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function reduceProductStock($id, $quantity) {
        $stmt = $this->conn->prepare('UPDATE product SET total_stock = total_stock - ' . $quantity . ' WHERE product_id = ' . $id . '');
        $stmt->execute();
    }

    public function addProductStock($id, $quantity) {
        $stmt = $this->conn->prepare('UPDATE product SET total_stock = total_stock + ' . $quantity . ' WHERE product_id = ' . $id . '');
        $stmt->execute();
    }

    public function showOrderList($orderList, $products) {
        echo '<table>
    <thead>
    <td>Flower Name</td>
    <td>Flower Description</td>
    <td>Unit Price (RM)</td>
    <td>Quantity</td>
    <td>Subtotal (RM)</td>
    </thead>';
        if (empty($orderList)) {
            echo '<tr><td colspan="5" align="center">No record</td></tr>';
            echo '</table>';
        } else {
            $total = 0;
            foreach ($orderList as $list) {
                foreach ($products as $product) {
                    if ($list[1] == $product['product_id']) {
                        $total += $product['price'] * $list[2];
                        echo '<tr>
        <td>' . $product['product_name'] . '</td>
        <td>' . $product['product_description'] . '</td>
        <td>' . $product['price'] . '</td>
        <td>' . $list[2] . '</td>
        <td>' . $product['price'] * $list[2] . '</td>
        <td><form action="" method="post">
    <button type="submit" name="remove' . $list[1] . '" class="btn btn-primary">Remove</button>
</form></td>
        </tr>';
                    }
                }
            }
            echo '<tr><td></td><td></td><td></td><td>Total :</td><td>'.$total.'</td></tr>';
            echo '</table>';
            echo '<br/>
        <br/>
        <br/>
        <form action="checkout.php" method="post">
            <button type="submit" class="btn btn-primary" name="checkOut">Check Out</button>
        </form>';
            
            $_SESSION['total'] = $total;
        }
    }

}
