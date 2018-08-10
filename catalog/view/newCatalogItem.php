<!--

Description of newCatalogItem.php
description: Allow user to add Product into Catalog by inserting into catalog_list database.
author: Loo Jia Wei

-->
<html>
    <head>
        <title>New Catalog Item</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <link rel="stylesheet" href="css/style.css">
    <body>


        <?php
        require_once '../model/catalog.php';
        require_once '../controller/CatalogMaker.php';
        session_start(); //to grab data from session

        if (isset($_SESSION['staff'])) {
            $catmaker = new CatalogMaker();
            $cat = new catalog();
            $lastCatList_id = 0;
            $prodInTheCatalog = [];
            $stmt = $catmaker->getAllcatalog();
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
            echo '<h1><u>Add Items into Catalog</u></h1>        ';
            echo '<form action="newCatalogItem.php" method="POST">';
            echo "<p>Catalog name:<select name = \"catalog\" id=\"catalog\">";
            while ($row = $stmt->fetch()) {
                // echo out the contents of each row into a table
                echo '<option value="' . $row['catalog_id'];
//            if ($row['catalog_id'] == $catalog) {
//                echo 'selected';
//            }
                echo '">' . $row['catalog_id'] . " - " . $row['name'] . '</option>';
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
                $catmaker->addCatList($newcatlist);
                $catalog = $_SESSION['catalog_id'];
                getCtlgList($catalog);
            }
        } else {
            echo '<font color="red">No privilege to access this page!</font><br/>';
            echo '<a href="../../JJview/StaffLogin.php">Go to Staff Login</a>';
        }

        function getCtlgList($catalog_id) {
            //ob_end_clean();
            $catmaker = new CatalogMaker();
            $catlistmapper = new CatListMapper();
            $stmt = $catmaker->getCatListByCatalogID($catalog_id);
            $_SESSION['red_catalog_id'] = $catalog_id;
            echo "<table border=\"1\"><tr><th>Catalog list ID</th><th>Catalog ID</th><th>Product ID</th><th>Product Name</th><th>Description</th><th>Total Stock</th><th>Delete</th></tr>";

            // loop through results of database query, displaying them in the table
            $count = 1;
            $rows = $stmt->rowCount();
            while ($row = $stmt->fetch()) {
                // echo out the contents of each row into a table
                $stmt2 = $catmaker->getProductByID($row['product_id']);
                $row2 = $stmt2->fetch();
                $prodInTheCatalog[$count] = $row['product_id'];
                echo "<tr>";
                echo '<td>' . $row['catlist_id'] . '</td>';
                echo '<td>' . $row['catalog_id'] . '</td>';
                echo '<td>' . $row['product_id'] . '</td>';
                echo '<td>' . $row2['product_name'] . '</td>';
                echo '<td>' . $row2['product_description'] . '</td>';
                echo '<td>' . $row2['total_stock'] . '</td>';
                echo '<td><a href="../controller/deleteCatListItem.php?id=' . $row['catlist_id'] . '">Delete</a></td>';
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

            $stmt3 = $catmaker->getAllProduct();
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
