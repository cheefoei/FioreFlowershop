<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>New Catalog Item</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1><u>Add Items into Catalog</u></h1>        
        <?php
        require_once 'connect_db.php';
        session_start();

        $lastCatList_id = 0;
        $prodInTheCatalog = [];
        $db = new connect_db();
        $conn = $db->connectPDO();
        $query = "SELECT * FROM catalog";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        echo '<form action="newCatalogItem.php" method="POST">';
        echo "<p>Catalog name:<select name = \"catalog\" id=\"catalog\">";
        while ($row = $stmt->fetch()) {
            // echo out the contents of each row into a table
            echo '<option value="' . $row['catalog_id'] . '">' . $row['name'] . '</option>';
        }
        echo "</select></p>";
        echo '<button type="submit" name="add">Get Catalog Item</button></p></form>';

        if ((isset($_POST['catalog']))) {
            $catalog = trim($_POST['catalog']);
            $_SESSION['catalog_id'] = $catalog;
            getCtlgList($catalog,$conn);
        }
        
        if (isset($_POST['btnAddToCtlg'])) {
            $product_idToAdd = trim($_POST['product_idToAdd']);
            $query4 = "INSERT INTO catalog_list (catlist_id, catalog_id, product_id) VALUES (?, ?, ?)";
            $stmt4 = $conn->prepare($query4);
            //$lastCatList_id = (int)$lastCatList_id;
            $lastCatList_id = (int) $_SESSION['lastCatList_id'];
            $lastCatList_id++;
            $stmt4->bindParam(1, $lastCatList_id);
            $stmt4->bindParam(2, $_SESSION['catalog_id']);
            $stmt4->bindParam(3, $product_idToAdd);
            $stmt4->execute();
            $catalog = $_SESSION['catalog_id'] ;
            getCtlgList($catalog,$conn);
        }
        
        function getCtlgList($catalog,$conn){
            $query = "SELECT * FROM catalog_list WHERE catalog_id='" . $catalog . "'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            echo "<table border=\"1\"><tr><th>Catalog list ID</th><th>Catalog ID</th><th>Product ID</th><th>Product Name</th><th>Description</th><th>Total Stock</th><th>Delete</th></tr>";

            // loop through results of database query, displaying them in the table
            $count = 1;
            $rows = $stmt->rowCount();
            while ($row = $stmt->fetch()) {
                // echo out the contents of each row into a table
                $query2 = "SELECT * FROM product WHERE product_id='" . $row['product_id'] . "'";
                $stmt2 = $conn->prepare($query2);
                $stmt2->execute();
                $row2 = $stmt2->fetch();
                $prodInTheCatalog[$count] = $row['product_id'];
                echo "<tr>";
                echo '<td>' . $row['catlist_id'] . '</td>';
                echo '<td>' . $row['catalog_id'] . '</td>';
                echo '<td>' . $row['product_id'] . '</td>';
                echo '<td>' . $row2['product_name'] . '</td>';
                echo '<td>' . $row2['product_description'] . '</td>';
                echo '<td>' . $row2['total_stock'] . '</td>';
                echo '<td><a href="controller/deleteCatListItem.php?id=' . $row['catlist_id'] . '">Delete</a></td>';
                echo "</tr>";

                if ($count == $rows) {                    
                    $lastCatList_id = $row['catlist_id'];
                    $_SESSION['lastCatList_id'] = $lastCatList_id;
                }
                $count++;
            }
            echo "</table>";     
            echo '<h1><u>Add Product Into Catalog</u></h1>'
            . '<form action="newCatalogItem.php" method="POST">';

            $query3 = "SELECT * FROM product";
            $stmt3 = $conn->prepare($query3);
            $stmt3->execute();

            $exists = 0;
            echo "<p>Product name:<select name = \"product_idToAdd\" id=\"product\">";
            while ($row = $stmt3->fetch()) {
                // echo out the contents of each row into a table
                $exists = 0;
                foreach ($prodInTheCatalog as $key => $value) {
                    echo $value;
                    if ($value == $row['product_id']) {
                        $exists = 1;
                    }
                }
                if ($exists == 0)
                    echo '<option value="' . $row['product_id'] . '">' . $row['product_id'] . " - " . $row['product_name'] . '</option>';
            }
            echo "</select></p>";
            echo '<button type="submit" id="btnAddToCtlg" name="btnAddToCtlg">Add into catalog</button></p></form>';
        }
        ?>
    </body>
</html>
