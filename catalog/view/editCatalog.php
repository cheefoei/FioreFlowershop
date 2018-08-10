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
        session_start();
        if (isset($_SESSION['staff'])) {
            $id = intval($_GET['id']);
            //$id = 200001;
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
            <div class="container">  
                <form id="contact" action="editCatalog.php?id=<?php echo $id; ?>" method="post">
                    <h3>Catalog update form</h3>
                    <h4>Insert the latest fields</h4>
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
                            $cat->catalog_id = trim($_POST['catalog_id']);
                            $cat->name = trim($_POST['name']);
                            $cat->description = trim($_POST['description']);
                            $cat->date_created = trim($_POST['date_created']);
                            $cat->date_expired = trim($_POST['date_expired']);
                            //echo $product_id . $product_name . $product_description . $date_created . $date_expired . $total_stock . $price . $weight . "<br/>";

                            $catmaker->updateCatalog($cat);
                            echo '<p class="copyright" >Catalog ' . $cat->catalog_id . ' update successfully!</p>';
                            //echo '<script>window.location.href = "getAllCatalog.php";</script>';
                        }
                    }
                    $stmt = $catmaker->getCatalogByID($id);
                    $row = $stmt->fetch();
                    $cat->catalog_id = $row['catalog_id'];
                    $cat->name = $row['name'];
                    $cat->description = $row['description'];
                    $cat->date_created = $row['date_created'];
                    $cat->date_expired = $row['date_expired'];
                    ?>
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
        } else {
            echo '<font color="red">No privilege to access this page!</font><br/>';
            echo '<a href="../../JJview/StaffLogin.php">Go to Staff Login</a>';
        }
        ?>
    </body>
</html>
