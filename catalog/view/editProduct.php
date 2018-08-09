<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Product</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        // put your code here
        require_once '../model/product.php';
        require_once '../controller/CatalogMaker.php';

        $catmaker = new CatalogMaker();
        $prod = new product();

        $id = intval($_GET['id']);
        ?>
        <div class="container">  
            <form id="contact" action="editProduct.php?id=<?php echo $id; ?>" method="post">
                <h3>Edit product form</h3>
                <h4>Insert the latest fields</h4>
                <?php
                if ($_POST) {
                    $errors = array();
                    if (!preg_match_all('/^[A-Za-z -]+$/', $_POST['product_name'])) {
                        $errors['product_name'] = "Your product_name must made up of a-z characters";
                    }
                    if (!is_numeric($_POST['total_stock'])) {
                        $errors['total_stock'] = "total_stock must made up of numerics characters<br/>";
                    }
                    if (!is_numeric($_POST['price'])) {
                        $errors['price'] = "price must made up of numerics characters<br/>";
                    }
                    if (!is_numeric($_POST['weight'])) {
                        $errors['weight'] = "weight must made up of numerics characters<br/>";
                    }


                    $totalerror = '';
                    foreach ($errors as $error) {
                        $totalerror = $totalerror . $error . ' ';
                    }
                    if ($totalerror != '') {
                        echo '<p class="copyright" >Error occured:  ' . $totalerror . ' Unable to proceed!</p>';
                    } else {
                        //all verified
                        $prod->product_id = trim($_POST['product_id']);
                        $prod->product_name = trim($_POST['product_name']);
                        $prod->product_type = trim($_POST['product_type']);
                        $prod->product_description = trim($_POST['product_description']);
                        $prod->date_created = trim($_POST['date_created']);
                        $prod->date_expired = trim($_POST['date_expired']);
                        $prod->total_stock = trim($_POST['total_stock']);
                        $prod->price = trim($_POST['price']);
                        $prod->weight = trim($_POST['weight']);
                        $catmaker->updateProduct($prod);
                        //echo "<font color=\"white\"><b>Product update success</b></font>";
                        echo '<script>window.location.href = "getAllProducts.php";</script>';
                        //echo '<p class="copyright" >Product ' . $prod->product_id . ' update successfully!</p>';
                    }
                }


                //$id = 100002;
                $stmt = $catmaker->getProductByID($id);

                $row = $stmt->fetch();

                $prod->product_id = $row['product_id'];
                $prod->product_name = $row['product_name'];
                $prod->product_type = $row['product_type'];
                $prod->product_description = $row['product_description'];
                $prod->date_created = $row['date_created'];
                $prod->date_expired = $row['date_expired'];
                $prod->total_stock = $row['total_stock'];
                $prod->price = $row['price'];
                $prod->weight = $row['weight'];
                ?>
                <fieldset>
                    <p>Product ID:</p>
                    <input placeholder="Product ID" type="text" name="product_id" value="<?php echo $prod->product_id; ?>" tabindex="1" readonly required autofocus>
                </fieldset>
                <fieldset>
                    <p>Product Name:</p>
                    <input placeholder="Product name" type="text" name="product_name" value="<?php echo $prod->product_name; ?>" tabindex="2" required>
                </fieldset>
                <fieldset>
                    <p>Product Type:</p>
<!--                    <input placeholder="Product name" type="text" name="product_type" tabindex="3" required>-->
                    <select name="product_type" size="1" tabindex="3" required>
                        <option value="fresh_flower" <?php if ($prod->product_type == 'fresh_flower') echo 'selected'; ?>>Fresh Flowers</option>
                        <option value="bouquet" <?php if ($prod->product_type == 'bouquet') echo 'selected'; ?>>Bouquet</option>
                        <option value="floral_arrangements" <?php if ($prod->product_type == 'floral_arrangements') echo 'selected'; ?>>Floral Arrangements</option>
                        <option value="seasonal_promotion_item" <?php if ($prod->product_type == 'seasonal_promotion_item') echo 'selected'; ?>>seasonal promotion item</option>
                    </select>
                </fieldset>
                <fieldset>
                    <p>Product Description:</p>
                    <textarea placeholder="Type your message here...." name="product_description" tabindex="4" required><?php echo $prod->product_description; ?></textarea>
                </fieldset>
                <fieldset>
                    <p>Date Created:</p>
                    <input placeholder="date_created" type="date" name="date_created" value="<?php echo $prod->date_created; ?>" tabindex="5" required>
                </fieldset>
                <fieldset>
                    <p>Date Expire:</p>
                    <input placeholder="date_expired" type="date" name="date_expired" value="<?php echo $prod->date_expired; ?>" tabindex="6" required>
                </fieldset>
                <fieldset>
                    <p>Total stock:</p>
                    <input placeholder="total_stock" type="text" name="total_stock" value="<?php echo $prod->total_stock; ?>" tabindex="7" required>
                </fieldset>
                <fieldset>
                    <p>Price:</p>
                    <input placeholder="Price" type="text" name="price" value="<?php echo $prod->price; ?>" tabindex="8" required>
                </fieldset>
                <fieldset>
                    <p>Weight:</p>
                    <input placeholder="weight" type="text" name="weight" value="<?php echo $prod->weight; ?>" tabindex="9" required>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit">Submit</button>
                </fieldset>
            </form>
        </div>
    </body>
</html>
