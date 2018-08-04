<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>New Catalog</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        require_once '../model/catalog.php';
        require_once '../controller/CatalogMapper.php';

        $catmap = new CatalogMapper();
        $newcatalog = new catalog();
        $stmt = $catmap->getLastRow();
        $row = $stmt->fetch();
        $lastcatid = $row["catalog_id"];
        $lastcatid = $lastcatid + 1;
        ?>
        <div class="container">  
            <form id="contact" action="newCatalog.php" method="post">
                <h3>Add new Catalog form</h3>
                <h4>Insert all the fields</h4>
                <fieldset>
                    <p>Catalog ID:</p>
                    <input placeholder="Catalog ID" type="text" name="catalog_id" value="<?php echo $lastcatid; ?>" tabindex="1" readonly required autofocus>
                </fieldset>
                <fieldset>
                    <p>Name:</p>
                    <input placeholder="Catalog name" type="text" name="name" tabindex="2" required>
                </fieldset>
                <fieldset>
                    <p>Description:</p>
                    <textarea placeholder="Type your message here...." name="description" tabindex="3" required></textarea>
                </fieldset>
                <fieldset>
                    <p>Date Created:</p>
                    <input placeholder="date_created"type="date" name="date_created" tabindex="4" required>
                </fieldset>
                <fieldset>
                    <p>Date Expire:</p>
                    <input placeholder="date_expired" type="date" name="date_expired" tabindex="5" required>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit">Submit</button>
                </fieldset>

                <?php
                if ((isset($_POST['catalog_id']))) {
                    $newcatalog->catalog_id = trim($_POST['catalog_id']);
                    $newcatalog->name = trim($_POST['name']);
                    $newcatalog->description = trim($_POST['description']);
                    $newcatalog->date_created = trim($_POST['date_created']);
                    $newcatalog->date_expired = trim($_POST['date_expired']);
                    //echo $product_id . $product_name . $product_description . $date_created . $date_expired . $total_stock . $price . $weight . "<br/>";

                    $catmap->save($newcatalog);
                    echo '<p class="copyright" >Catalog added successfully!</p>';
                }
                ?>
            </form>
        </div>
    </body>
</html>
