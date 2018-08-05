<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Catalog and Product maintenance</title>
    </head>
    <body>
        <h2>Catalog and Product maintenance</h2>
        <?php
        // put your code here
        echo "Current datetime is " . date("h:i:sa    d/m/Y") . "<br/>";
        ?>

        <hr>
        <br/>
        <a href="addNewProduct.php" target="_blank">Add New Product</a><br/>
        <a href="getAllProducts.php" target="_blank">Get All Product</a><br/>
        <hr>
        <br/>
        <a href="newCatalog.php" target="_blank">Add New Catalog</a><br/>
        <a href="getAllCatalog.php" target="_blank">Get All Catalog</a><br/>
        <hr>
        <br/>
        <a href="newCatalogItem.php" target="_blank">Add item into Catalog</a><br/>
        <h3>Reporting</h3>
        <a href="createProductXML.php" target="_blank">Product Table</a><br/>
        <a href="createTtlProductXML.php" target="_blank">Product Statistic</a><br/>
    </body>
</html>
