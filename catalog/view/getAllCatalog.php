<!DOCTYPE html>
<!--

Description of getAllCatalog.php
description: Allow user to retrieve all catalog row from database
author: Loo Jia Wei

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>All Catalogs</title>
    </head>
    <link rel="stylesheet" href="css/table.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <body>
        <?php
        // put your code here
        require_once '../model/catalog.php';
        require_once '../controller/CatalogMaker.php';

        $catmaker = new CatalogMaker();
        $stmt = $catmaker->getAllcatalog();
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
            <?php
            echo "<table border=\"1\"><thead><tr><th>Catalog ID</th><th>Name</th><th width=\"200\">Description</th><th>Date Created</th><th>Date Expire</th><th>Edit</th></tr></thead><tbody>";

            // loop through results of database query, displaying them in the table

            while ($row = $stmt->fetch()) {
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['catalog_id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['description'] . '</td>';
                echo '<td>' . $row['date_created'] . '</td>';
                echo '<td>' . $row['date_expired'] . '</td>';
                echo '<td><a href="editCatalog.php?id=' . $row['catalog_id'] . '">Edit</a></td>';
                //echo '<td><a href="delete.php?id=' . $row['catalog_id'] . '">Delete</a></td>';
                echo "</tr>";
            }

            echo "<tbody></table>";
            $db = null;
        } else {
            echo '<font color="red">No privilege to access this page!</font><br/>';
            echo '<a href="../../JJview/StaffLogin.php">Go to Staff Login</a>';
        }
        ?>
    </body>
</html>
