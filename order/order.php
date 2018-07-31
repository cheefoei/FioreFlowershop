<?php
include '../header.php';
require_once 'connect_db.php';
require 'orderList.php';

$host = 'localhost';
$dbName = 'flower';
$dbuser = 'root';
$dbpassword = '';

$dsn = "mysql:host=$host;dbname=$dbName";

try {
    $db = new PDO($dsn, $dbuser, $dbpassword);
} catch (PDOException $ex) {
    echo '<script language="javascript">';
    echo 'alert("Database Error")';
    echo '</script>';
    exit;
}


$sth = $db->prepare("SELECT * FROM product");
$sth->execute();

$products = $sth->fetchAll();
//print_r($products);
//$_SESSION['products'] = $products;

$orderList = array();


session_start();
//session_destroy();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_SESSION['orderList'])) {
        $orderList = $_SESSION['orderList'];
    }

    //print_r($_SESSION["orderList"]);
    print_r($orderList);
    foreach ($products as $product) {
        $tempID = $product['product_id'];
        //print_r($tempID);
        if (isset($_POST['add' . $tempID . ''])) {
            if (empty($orderList)) {
                //$ol = new OrderList(1, $tempID, $_POST['quantity']);
                $list = array(1, $tempID, $_POST['quantity']);
                $orderList[] = $list;
                echo "hihi";
                //print_r($orderList);
            } else {
                for ($a = 0; $a < count($orderList); $a++) {
                    echo "bubu";
                    if ($orderList[$a][1] == $tempID) {
                        $orderList[$a][2] += $_POST['quantity'];
                        echo $orderList[$a][2];
                        echo "loop if";
                    } elseif ($a == count($orderList)-1) {
                        $list = array(1, $tempID, $_POST['quantity']);
                        $orderList[] = $list;
                        echo "loop elseif";
                        echo $list[2];
                    }
                }
            }
        }
    }
     $_SESSION['orderList'] = $orderList;
}
?>
<html>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
        }
    </style>
    <head>

        <meta charset="UTF-8">
        <title>Flower Order</title>
    </head>

    <body class="container">
        <br/>
        <h2>Fresh Flower Ordering</h2>
        <br/>
        <br/>
        <table>
            <thead>
            <td>Product Index</td>
            <td>Product Name</td>
            <td>Product Description</td>
            <td>Price</td>
            <td>Weight</td>
            <td>Quantity</td>
        </thead>
        <tbody>
            <?php
            foreach ($products as $product) {
                if ($product["total_stock"] > 1) {
                    echo '<form action="" method="post">';
                    echo '<tr><td>' . $product['product_id'] . '</td>';
                    echo '<td>' . $product['product_name'] . '</td>';
                    echo '<td>' . $product['product_description'] . '</td>';
                    echo '<td>' . $product['price'] . '</td>';
                    echo '<td>' . $product['weight'] . '</td>';
                    echo '<td><input type="number" min="1" max="' . $product['total_stock'] . '" name="quantity"' . $product['product_id'] . '" required/></td>';
                    echo '<td><button type="submit" name="add' . $product['product_id'] . '">Add to Cart</button></td>';
                    echo '</tr>';
                    echo '</form>';
                }
            }
            ?>

        </tbody>
    </table>
</body>

</html>

