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
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        require_once '../model/product.php';
        require_once '../controller/CatalogMaker.php';

        $prod = new product();
        $catmaker = new CatalogMaker();
        //SELECT * FROM product ORDER BY ID DESC LIMIT 1
        ?>
        <div class="container">  
            <form id="contact" action="addNewProduct.php" method="post">
                <h3>Add new product form</h3>
                <h4>Insert all the fields</h4>
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

                    $catmaker->addProduct($prod);
                    echo '<p class="copyright" >Product '.$prod->product_id.' added successfully!</p>';
                }

                $stmt = $catmaker->getProductLastRow();
                $row = $stmt->fetch();
                $lastProduct_id = (int) $row['product_id'];
                $lastProduct_id++;
                ?>
                <fieldset>
                    <p>Product ID:</p>
                    <input placeholder="Product ID" type="text" name="product_id" value="<?php echo $lastProduct_id; ?>" tabindex="1" readonly required autofocus>
                </fieldset>
                <fieldset>
                    <p>Product Name:</p>
                    <input placeholder="Product name" type="text" name="product_name" tabindex="2" required>
                </fieldset>
                <fieldset>
                    <p>Product Type:</p>
<!--                    <input placeholder="Product name" type="text" name="product_type" tabindex="3" required>-->
                    <select name="product_type" size="1" tabindex="3" required>
                        <option value="fresh_flower">Fresh Flowers</option>
                        <option value="bouquet">Bouquet</option>
                        <option value="floral_arrangements">Floral Arrangements</option>
                        <option value="seasonal_promotion_item">seasonal promotion item</option>
                    </select>
                </fieldset>
                <fieldset>
                    <p>Product Description:</p>
                    <textarea placeholder="Type your message here...." name="product_description" tabindex="4" required></textarea>
                </fieldset>
                <fieldset>
                    <p>Date Created:</p>
                    <input placeholder="date_created" type="date" name="date_created" tabindex="5" value="<?php echo date("Y-m-d"); ?>" required>
                </fieldset>
                <fieldset>
                    <p>Date Expire:</p>
                    <input placeholder="date_expired" type="date" name="date_expired" tabindex="6" value="<?php echo date("Y-m-30"); ?>" required>
                </fieldset>
                <fieldset>
                    <p>Total stock:</p>
                    <input placeholder="total_stock" type="text" name="total_stock" tabindex="7" required>
                </fieldset>
                <fieldset>
                    <p>Price:</p>
                    <input placeholder="Price" type="text" name="price" tabindex="8" required>
                </fieldset>
                <fieldset>
                    <p>Weight:</p>
                    <input placeholder="weight" type="text" name="weight" tabindex="9" required>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit">Submit</button>
                </fieldset>                
            </form>
        </div>
    </body>
</html>
