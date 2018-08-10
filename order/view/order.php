<?php
include '../../header.php';
require '../controller/manageOrder.php';
require '../controller/getCatalog.php';
require_once '../../model/Customer.php';



$catalogProduct = new catalog();
$order = new manageOrder();
$products = $order->getProduct();

session_start();
//session_destroy();
if (!isset($_SESSION['customer'])) {
    echo '<script language="javascript">';
    echo 'alert("You have to login as customer to access this page");';
    echo 'window.location.href = "../../view/customer/CustomerLogin.php";';
    echo '</script>';
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_SESSION['orderList'])) {
        $orderList = $_SESSION['orderList'];
    }

    //print_r($_SESSION["orderList"]);
    foreach ($products as $product) {
        $tempID = $product['product_id'];
        //print_r($tempID);
        if (isset($_POST['add' . $tempID . ''])) {
            if (empty($orderList)) {
                //$ol = new OrderList(1, $tempID, $_POST['quantity']);
                $list = array(1, $tempID, $_POST['quantity' . $tempID . '']);
                $orderList[] = $list;
                //print_r($orderList);
            } else {
                for ($a = 0; $a < count($orderList); $a++) {
                    if ($orderList[$a][1] == $tempID) {
                        $orderList[$a][2] = $_POST['quantity' . $tempID . ''] + $orderList[$a][2];
                        break;
                    } elseif ($a == count($orderList) - 1) {
                        $list = array(1, $tempID, $_POST['quantity' . $tempID . '']);
                        $orderList[] = $list;
                        break;
                    }
                }
            }
            $order->reduceProductStock($tempID, $_POST['quantity' . $tempID . '']);
        }
    }
    $_SESSION['orderList'] = $orderList;
    //print_r($orderList);
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
        <a href="../../view/customer/CustomerMainPage.php">Home</a>
        <br/>
        <br/>
        <div class="row">
            <h2 class="pull-left">Fresh Flower Ordering</h2>
            <br/>
            <form action="cart.php" method="post">
                <button type="submit" class="btn btn-primary pull-right" name="goCart">Go to Cart</button>
            </form>
        </div>
        <br/>

        <?php
        $catalogArray = $catalogProduct->getCatalog();
        foreach ($catalogArray as $product) {
            if (date('Y-m-d') <= $product['c_expiredDate']) {
                echo '<h4>Catalog : ' . $product['name'] . '</h4>';

                echo '<table class="table table-bordered" style="font-size:16">
            <thead>
            <td>Flower Name</td>
            <td>Flower Type</td>
            <td>Flower Description</td>
            <td>Price (RM)</td>
            <td>Weight (G)</td>
            <td>Quantity</td>
        </thead>';

                for ($a = 0; $a < count($product) - 4; $a++) {
                    if ($product[$a]['total_stock'] > 1) {
                        echo '<form action="" method="post">';
                        echo '<tr><td>' . $product[$a]['product_name'] . '</td>';
                        echo '<td>' . $product[$a]['product_type'] . '</td>';
                        echo '<td>' . $product[$a]['product_description'] . '</td>';
                        echo '<td>' . $product[$a]['price'] . '</td>';
                        echo '<td>' . $product[$a]['weight'] . '</td>';
                        echo '<td><input type="number" min="1" max="' . $product[$a]['total_stock'] . '" name="quantity' . $product[$a]['product_id'] . '"' . $product[$a]['product_id'] . '" required/><br/>(Stock Left: ' . $product[$a]['total_stock'] . ')</td>';
                        echo '<td><button type="submit" name="add' . $product[$a]['product_id'] . '" class="btn btn-success">Add to Cart</button></td>';
                        echo '</tr>';
                        echo '</form>';
                    }
                }
                echo '</table>';
            }
        }
        ?>
        <br/>
        <br/>
        <br/>

        <!--        <form action="/FioreFlowershop/view/customer/CustomerMainPage.php" method="post">
                    <button type="submit" class="btn btn-primary" name="goCart">Back to Menu</button>
                </form>-->


    </body>

</html>

