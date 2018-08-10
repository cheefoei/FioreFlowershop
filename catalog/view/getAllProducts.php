<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>All products</title>
    </head>
    <link rel="stylesheet" href="css/table.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <body>
        <?php
        // put your code here
        require_once '../model/product.php';
        require_once '../controller/CatalogMaker.php';


        session_start();
        if (isset($_SESSION['staff'])) {
            ?>
            <ul>
                <li><a href="CtlgAndProdMaintce.php">Catalog Menu</a></li>
                <li><a href="createTtlCatalogXML.php">Catalog Statistic</a></li>
                <li><a href="createTtlProductXML.php">Product Statistic</a></li>
                <li><a href="getAllCatalog.php.php">View Products by Catalog</a></li>
                <li style="float:right"> 
                    <form action="../controller/logout.php" method="post">
                        <fieldset>
                            <button name="logout" type="submit">Logout</button>
                        </fieldset>
                    </form></li>
            </ul>
            <form action="getAllProducts.php" method="POST">
                <p>Product Type:
                    <select name = "product_type" id="product_type">                
                        <option value="fresh_flower">Fresh Flowers</option>
                        <option value="bouquet">Bouquet</option>
                        <option value="floral_arrangements">Floral Arrangements</option>
                        <option value="seasonal_promotion_item">seasonal promotion item</option>
                    </select>
                    <button type="submit" name="search">Search</button>
            </form>
            <?php
            if ((isset($_POST['product_type']))) {
                $type = trim($_POST['product_type']);
                $catmaker = new CatalogMaker();
                $stmt = $catmaker->getProductByProductType($type);
                echo '<h3 style="text-align:center">All Products table</h3>';
                echo "<table border=\"1\"><tr><th>Product ID</th><th>Name</th><th>Type</th><th width=\"200\">Description</th><th>Date Created</th><th>Date Expire</th><th>Total stock</th><th>Price</th><th>Weight</th><th>Edit</th></tr><tbody>";
                //echo "<tr>";
                // loop through results of database query, displaying them in the table

                while ($row = $stmt->fetch()) {
                    // echo out the contents of each row into a table
                    echo "<tr>";
                    echo '<td>' . $row['product_id'] . '</td>';
                    echo '<td>' . $row['product_name'] . '</td>';
                    echo '<td>' . $row['product_type'] . '</td>';
                    echo '<td>' . $row['product_description'] . '</td>';
                    echo '<td>' . $row['date_created'] . '</td>';
                    echo '<td>' . $row['date_expired'] . '</td>';
                    echo '<td>' . $row['total_stock'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>' . $row['weight'] . '</td>';
                    echo '<td><a href="editProduct.php?id=' . $row['product_id'] . '">Edit</a></td>';
                    //echo '<td><a href="delete.php?id=' . $row['product_id'] . '">Delete</a></td>';
                    echo "</tr>";
                }

                echo "</tbody></table>";
                $db = null;
                echo ' <a href="../createProductXML.php">Download in XML</a>';
            }
            ?>
            <br/>
            <br/>

            <?php
        } else {
            echo '<font color="red">No privilege to access this page!</font><br/>';
            echo '<a href="../../JJview/StaffLogin.php">Go to Staff Login</a>';
        }
        ?>
    </body>
</html>
