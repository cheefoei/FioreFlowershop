<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>All Catalogs</title>
    </head>
    <link rel="stylesheet" href="css/table.css"/>
    <body>
        <?php
        // put your code here
        require_once '../model/catalog.php';
        require_once '../controller/CatalogMaker.php';

        $catmaker = new CatalogMaker();
        $stmt = $catmaker->getAllcatalog();
        
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
        ?>
    </body>
</html>
