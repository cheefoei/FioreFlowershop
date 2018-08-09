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
        require_once '../controller/CatalogMaker.php';

        $catmaker = new CatalogMaker();
        $newcatalog = new catalog();
        ?>
        <div class="container">  
            <form id="contact" action="newCatalog.php" method="post">
                <h3>Add new Catalog form</h3>
                <h4>Insert all the fields</h4>
                <?php
                if ($_POST) {
                    $errors = array();
                    if (!preg_match_all('/^[A-Za-z -]+$/', $_POST['name'])) {
                        $errors['product_name'] = "Your product_name must made up of a-z characters";
                    }
                    if (!preg_match_all('/^[A-Za-z -]+$/', $_POST['description'])) {
                        $errors['product_name'] = "Your description must made up of a-z characters";
                    } 
                    $totalerror = '';
                    foreach ($errors as $error) {
                        $totalerror = $totalerror . $error . ' ';
                    }
                    if ($totalerror != '') {
                        echo '<p class="copyright" >Error occured:  ' . $totalerror . ' Unable to proceed!</p>';
                    } else {
                        $newcatalog->catalog_id = trim($_POST['catalog_id']);
                        $newcatalog->name = trim($_POST['name']);
                        $newcatalog->description = trim($_POST['description']);
                        $newcatalog->date_created = trim($_POST['date_created']);
                        $newcatalog->date_expired = trim($_POST['date_expired']);
                        //echo $product_id . $product_name . $product_description . $date_created . $date_expired . $total_stock . $price . $weight . "<br/>";

                        $catmaker->addCatalog($newcatalog);
                        echo '<p class="copyright" >Catalog ' . $newcatalog->catalog_id . ' added successfully!</p>';
                    }
                }
                $stmt = $catmaker->getCatalogLastRow();
                $row = $stmt->fetch();
                $lastcatid = $row["catalog_id"];
                $lastcatid = $lastcatid + 1;
                ?>
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
                    <input placeholder="date_created"type="date" name="date_created" tabindex="4" value="<?php echo date("Y-m-d"); ?>" required>
                </fieldset>
                <fieldset>
                    <p>Date Expire:</p>
                    <input placeholder="date_expired" type="date" name="date_expired" tabindex="5" value="<?php echo date("Y-m-30"); ?>" required>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit">Submit</button>
                </fieldset>                
            </form>
        </div>
    </body>
</html>
