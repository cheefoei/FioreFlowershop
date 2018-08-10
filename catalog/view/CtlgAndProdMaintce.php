<!DOCTYPE html>
<!--

Description of CtlgAndProdMaintce.php
description: A list of pages available in this section
author: Loo Jia Wei

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Catalog and Product maintenance</title>
    </head>
    <link rel="stylesheet" href="css/style.css">
    <body>

        <?php
        // put your code here
        
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
            <h2>Catalog and Product maintenance</h2>
            <?php echo "Current datetime is " . date("h:i:sa    d/m/Y") . "<br/>"; ?>
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
            <a href="createTtlCatalogXML.php.php" target="_blank">Catalog Statistic</a><br/>
            <a href="createCatalogXML.php" target="_blank">Catalog Table</a><br/><br/><br/>  
            <?php
        } else {
            echo '<font color="red">No privilege to access this page!</font><br/>';
            echo '<a href="../../JJview/StaffLogin.php">Go to Staff Login</a>';
        }
        ?>
    </body>
</html>
