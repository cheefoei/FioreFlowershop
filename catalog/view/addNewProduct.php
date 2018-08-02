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
            <?php
            require_once '../connect_db.php';
            require_once '../model/product.php';
            require_once '../controller/ProductMapper.php';

            $db = new connect_db();
            $conn = $db->connectPDO();

            $prod = new product();
            $productmap = new ProductMapper();
            $query2 = "SELECT * FROM product ORDER BY product_id DESC LIMIT 1";
            $stmt2 = $conn->prepare($query2);
            $stmt2->execute();
            $row = $stmt2->fetch();
            $lastProduct_id = (int) $row['product_id'];
            $lastProduct_id++;
            //SELECT * FROM product ORDER BY ID DESC LIMIT 1
            ?>
            <p>Product ID:<br/>
                <input type="text" name="product_id" value="<?php echo $lastProduct_id; ?>" size="15" /><br/><br/>       
                Name:<br/>
                <input type="text" name="product_name" value="Rose Slvar" size="15" /><br/><br/>
                Type:<br/>
                <input type="text" name="product_type" value="Seasonal Item" size="30" /><br/><br/>  
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
        if ((isset($_POST['product_id']))) {
            $prod->product_id = trim($_POST['product_id']);
            $prod->product_name = trim($_POST['product_name']);
            $prod->product_type = trim($_POST['product_type']);
            $prod->product_description = trim($_POST['product_description']);
            $prod->date_created = trim($_POST['date_created']);
            $prod->date_expired = trim($_POST['date_expired']);
            $prod->total_stock = trim($_POST['total_stock']);
            $prod->price = trim($_POST['price']);
            $prod->weight = trim($_POST['weight']);
           
            $productmap->save($prod);
            echo "<p>Product added successfully!</p><br/>";
            header("Refresh:0");
        }
        ?>
    </body>
</html>
