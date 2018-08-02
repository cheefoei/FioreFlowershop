<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>New Product Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1><u>Add New Product</u></h1>
        <form action="addNewProduct.php" method="POST">
            <p>Product ID:<br/>
                <input type="text" name="product_id" value="100005" size="15" /><br/><br/>       
                Name:<br/>
                <input type="text" name="product_name" value="Rose Slvar" size="15" /><br/><br/>  
                Description:<br/>
                <input type="text" name="product_description" value="pretty flower suitable for all occasions" /><br/><br/>  
                Date Created:<br/>
                <input type="date" name="date_created" value="" size="15" /><br/><br/>
                Date Expire:<br/>
                <input type="date" name="date_expired" value="" size="15" /><br/><br/>
                Total stock:<br/>
                <input type="text" name="total_stock" value="" size="15" /><br/><br/>  
                Price:<br/>
                <input type="text" name="price" value="" size="15" /><br/><br/>
                Weight:<br/>
                <input type="text" name="weight" value="" size="15" /><br/><br/>
                <button type="submit" name="add">Add</button>
            </p>
        </form>
        <?php
        require_once 'connect_db.php';

        $db = new connect_db();
        $conn = $db->connectPDO();
        if ((isset($_POST['product_id']))) {
            $product_id = trim($_POST['product_id']);
            $product_name = trim($_POST['product_name']);
            $product_description = trim($_POST['product_description']);
            $date_created = trim($_POST['date_created']);
            $date_expired = trim($_POST['date_expired']);
            $total_stock = trim($_POST['total_stock']);
            $price = trim($_POST['price']);
            $weight = trim($_POST['weight']);
            //echo $product_id . $product_name . $product_description . $date_created . $date_expired . $total_stock . $price . $weight . "<br/>";


            $query = "INSERT INTO product (product_id, product_name, product_description, date_created, date_expired, total_stock, price, weight) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $product_id);
            $stmt->bindParam(2, $product_name);
            $stmt->bindParam(3, $product_description);
            $stmt->bindParam(4, $date_created);
            $stmt->bindParam(5, $date_expired);
            $stmt->bindParam(6, $total_stock);
            $stmt->bindParam(7, $price);
            $stmt->bindParam(8, $weight);
            $stmt->execute();
            echo "<p>Product added successfully!</p><br/>";
        }
        ?>
    </body>
</html>
