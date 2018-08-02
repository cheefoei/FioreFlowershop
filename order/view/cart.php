<?php
include '../../header.php';
require '../controller/manageOrder.php';
require '../controller/getCatalog.php';
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
        <title>Cart</title>
    </head>

    <body class="container">
        <br/>
        <h2>Cart</h2>
        <br/>
        <br/>
        <?php
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            session_start();
            $orderList = $_SESSION['orderList'];

            $order = new manageOrder();
            $products = $order->getProduct();
            if (isset($_POST['goCart'])) {
                $order->showOrderList($orderList, $products);
            } elseif (isset($_POST['cart'])) {
                $order->showOrderList($orderList, $products);
            }
            foreach ($orderList as $key => $list) {
                if (isset($_POST['remove' . $list[1] . ''])) {
                    $order->addProductStock($list[1], $list[2]);
                    unset($orderList[$key]);
                    $orderList = array_values($orderList);
                    $order->showOrderList($orderList, $products);
                }
            }
            $_SESSION['orderList'] = $orderList;
        }
        ?>
        <br/>
        <br/>
        <br/>
        <form action="order.php" method="post">
            <button type="submit" class="btn btn-primary" name="goOrder">Go to Catalog</button>
        </form>
    </body>
</html>