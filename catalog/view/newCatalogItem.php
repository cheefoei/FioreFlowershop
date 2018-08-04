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
        require_once '../connect_db.php';
        require_once '../model/catalog.php';
        require_once '../controller/CatalogMapper.php';
        require_once '../controller/CatListMapper.php';
        require_once '../controller/ProductMapper.php';
        session_start(); //to grab data from session

        $catmapper = new CatalogMapper();
        $cat = new catalog();
        $catlistmapper = new CatListMapper();
        
        $lastCatList_id = 0;
        $prodInTheCatalog = [];


        $stmt = $catmapper->loadAll();

        echo '<form action="newCatalogItem.php" method="POST">';
        echo "<p>Catalog name:<select name = \"catalog\" id=\"catalog\">";
        while ($row = $stmt->fetch()) {
            // echo out the contents of each row into a table
            echo '<option value="' . $row['catalog_id'] . '">' . $row['catalog_id'] . " - " . $row['name'] . '</option>';
        }
        echo "</select></p>";
        echo '<button type="submit" name="add">Get Catalog Item</button></p></form>';

        if ((isset($_POST['catalog']))) {
            $catalog = trim($_POST['catalog']);
            $_SESSION['catalog_id'] = $catalog;
            getCtlgList($catalog);
        }

        if (isset($_POST['btnAddToCtlg'])) {
            $newcatlist = new catalog_list();
            $product_idToAdd = trim($_POST['product_idToAdd']);
            //$lastCatList_id = (int)$lastCatList_id;
            $lastCatList_id = (int) $_SESSION['lastCatList_id'];
            $lastCatList_id++;
            $newcatlist->catlist_id = $lastCatList_id;
            $newcatlist->catalog_id = $_SESSION['catalog_id'];
            $newcatlist->product_id = $product_idToAdd;

            $catlistmapper->save($newcatlist);
            $catalog = $_SESSION['catalog_id'];
            getCtlgList($catalog);
        }

        function getCtlgList($catalog_id) {
            $catmapper = new CatalogMapper();
            $catlistmapper = new CatListMapper();
            $prodmapper = new ProductMapper();
            $stmt = $catlistmapper->getCatList($catalog_id);

            echo "<table border=\"1\"><tr><th>Catalog list ID</th><th>Catalog ID</th><th>Product ID</th><th>Product Name</th><th>Description</th><th>Total Stock</th><th>Delete</th></tr>";

            // loop through results of database query, displaying them in the table
            $count = 1;
            $rows = $stmt->rowCount();
            while ($row = $stmt->fetch()) {
                // echo out the contents of each row into a table
                $stmt2 = $prodmapper->load($row['product_id']);
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

            $stmt3 = $prodmapper->loadAll();
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
