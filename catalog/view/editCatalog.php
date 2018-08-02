<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        require_once '../model/catalog.php';
        require_once '../controller/CatalogMapper.php';

        $catmapper = new CatalogMapper();
        $stmt = $catmapper->load(200001);

        $cat = new catalog();
        while ($row = $stmt->fetch()) {
            // echo out the contents of each row into a table
            $cat->catalog_id = $row['catalog_id'];
            $cat->name = $row['name'];
            $cat->description = $row['description'];
            $cat->date_created = $row['date_created'];
            $cat->date_expired = $row['date_expired'];
            echo $cat->catalog_id . $cat->name . $cat->description . '<br/>';
        }
        $cat->name = "Fathers day.";
        echo "<br/>".$cat->name;
        $catmapper->update($cat);
        //$catmapper->delete(200002);
        echo "success";
        ?>
    </body>
</html>
