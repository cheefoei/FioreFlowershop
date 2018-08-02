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
    </head>
    <body>
        <h1><u>Add New Catalog</u></h1>
        <form action="newCatalog.php" method="POST">
            <p>Product ID:<br/>
                <input type="text" name="catalog_id" value="200002" size="15" /><br/><br/>       
                Name:<br/>
                <input type="text" name="name" value="Valentine" size="15" /><br/><br/>  
                Description:<br/>
                <input type="text" name="description" value="For all the lovers" /><br/><br/>  
                Date Created:<br/>
                <input type="date" name="date_created" value="" size="15" /><br/><br/>
                Date Expire:<br/>
                <input type="date" name="date_expired" value="" size="15" /><br/><br/>
                
                <button type="submit" name="add">Add</button>
            </p>
        </form>
        <?php
        require_once 'connect_db.php';

        $db = new connect_db();
        $conn = $db->connectPDO();
        if ((isset($_POST['catalog_id']))) {
            $catalog_id = trim($_POST['catalog_id']);
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);
            $date_created = trim($_POST['date_created']);
            $date_expired = trim($_POST['date_expired']);
            //echo $product_id . $product_name . $product_description . $date_created . $date_expired . $total_stock . $price . $weight . "<br/>";


            $query = "INSERT INTO catalog (catalog_id, name, description, date_created, date_expired) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $catalog_id);
            $stmt->bindParam(2, $name);
            $stmt->bindParam(3, $description);
            $stmt->bindParam(4, $date_created);
            $stmt->bindParam(5, $date_expired);
            $stmt->execute();
            echo "<p>Catalog added successfully!</p><br/>";
        }
        ?>
    </body>
</html>
