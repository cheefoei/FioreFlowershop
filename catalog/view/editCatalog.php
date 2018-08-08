<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Catalog</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        // put your code here
        require_once '../model/catalog.php';
        require_once '../controller/CatalogMaker.php';

        $catmaker = new CatalogMaker();
        $cat = new catalog();

        if ((isset($_POST['catalog_id']))) {
            $cat->catalog_id = trim($_POST['catalog_id']);
            $cat->name = trim($_POST['name']);
            $cat->description = trim($_POST['description']);
            $cat->date_created = trim($_POST['date_created']);
            $cat->date_expired = trim($_POST['date_expired']);

            $catmaker->addCatalog($cat);
            echo "<font color=\"white\"><b>Catalog update success</b></font>";
            echo '<script>window.location.href = "getAllCatalog.php";</script>';
        }


        $id = intval($_GET['id']);
        //$id = 200001;
        $stmt = $catmaker->getCatalogByID($id);

        $row = $stmt->fetch();

        $cat->catalog_id = $row['catalog_id'];
        $cat->name = $row['name'];
        $cat->description = $row['description'];
        $cat->date_created = $row['date_created'];
        $cat->date_expired = $row['date_expired'];
        ?>
        <div class="container">  
            <form id="contact" action="editCatalog.php?id=<?php echo $id; ?>" method="post">
                <h3>Catalog update form</h3>
                <h4>Insert the latest fields</h4>
                <fieldset>
                    <p>Catalog ID:</p>
                    <input placeholder="Catalog ID" type="text" name="catalog_id" value="<?php echo $cat->catalog_id; ?>" tabindex="1" readonly required autofocus>
                </fieldset>
                <fieldset>
                    <p>Name:</p>
                    <input placeholder="Catalog name" type="text" name="name" value="<?php echo $cat->name; ?>" tabindex="2" required>
                </fieldset>
                <fieldset>
                    <p>Description:</p>
                    <textarea placeholder="Type your message here...." name="description" tabindex="3" required><?php echo $cat->description; ?></textarea>
                </fieldset>
                <fieldset>
                    <p>Date Created:</p>
                    <input placeholder="date_created"type="date" name="date_created" value="<?php echo $cat->date_created; ?>" tabindex="4" required>
                </fieldset>
                <fieldset>
                    <p>Date Expire:</p>
                    <input placeholder="date_expired" type="date" name="date_expired" value="<?php echo $cat->date_expired; ?>" tabindex="5" required>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit">Update</button>
                </fieldset>
            </form>
        </div>

        <?php
        ?>
    </body>
</html>
