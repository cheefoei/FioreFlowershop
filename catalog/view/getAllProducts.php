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
    <body>
        <?php
        // put your code here
        require_once '../connect_db.php';

        $db = new connect_db();
        $conn = $db->connectPDO();

        //$query = "INSERT INTO subjects(code, title,credit,yearOfStudy) VALUES (?, ?, ?, ?)";
        $query = "SELECT * FROM product";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo "<table border=\"1\"><tr><th>Product ID</th><th>Name</th><th>Description</th><th>Date Created</th><th>Date Expire</th><th>Total stock</th><th>Price</th><th>Weight</th><th>Edit</th><th>Delete</th></tr>";
        //echo "<tr>";
        // loop through results of database query, displaying them in the table

        while ($row = $stmt->fetch()) {
            // echo out the contents of each row into a table
            echo "<tr>";
            echo '<td>' . $row['product_id'] . '</td>';
            echo '<td>' . $row['product_name'] . '</td>';
            echo '<td>' . $row['product_description'] . '</td>';
            echo '<td>' . $row['date_created'] . '</td>';
            echo '<td>' . $row['date_expired'] . '</td>';
            echo '<td>' . $row['total_stock'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['weight'] . '</td>';
            echo '<td><a href="edit.php?id=' . $row['product_id'] . '">Edit</a></td>';
            echo '<td><a href="delete.php?id=' . $row['product_id'] . '">Delete</a></td>';
            echo "</tr>";
        }

        echo "</table>";
        $db = null;
        ?>
        <br/>
        <br/>
        <a href="../createProductXML.php">Download in XML</a>
    </body>
</html>
