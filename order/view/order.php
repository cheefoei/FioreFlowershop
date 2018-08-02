<?php
include '../../header.php';
require '../controller/manageOrder.php';
require '../controller/getCatalog.php';



$catalogProduct = new catalog();
$order = new manageOrder();
$products = $order->getProduct();

//session_start();
//session_destroy();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

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
                    if ( $orderList[$a][1] == $tempID) {
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
    print_r($orderList);
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
        <h2>Fresh Flower Ordering</h2><a href="orderReportXML.php">Famous People</a>
        <br/>
        <br/>
        <?php
        $catalogArray = $catalogProduct->getCatalog();
        foreach ($catalogArray as $product) {
            if (date('Y-m-d') <= $product['c_expiredDate']) {
                echo '<h3>Catalog : ' . $product['name'] . '</h3>';

                echo '<table>
            <thead>
            <td>Flower Name</td>
            <td>Flower Description</td>
            <td>Price (RM)</td>
            <td>Weight (G)</td>
            <td>Quantity</td>
        </thead>';

                for ($a = 0; $a < count($product) - 4; $a++) {
                    if ($product[$a]['total_stock'] > 1) {
                        echo '<form action="" method="post">';
                        echo '<tr><td>' . $product[$a]['product_name'] . '</td>';
                        echo '<td>' . $product[$a]['product_description'] . '</td>';
                        echo '<td>' . $product[$a]['price'] . '</td>';
                        echo '<td>' . $product[$a]['weight'] . '</td>';
                        echo '<td><input type="number" min="1" max="' . $product[$a]['total_stock'] . '" name="quantity' . $product[$a]['product_id'] . '"' . $product[$a]['product_id'] . '" required/>(Stock Left: ' . $product[$a]['total_stock'] . ')</td>';
                        echo '<td><button type="submit" name="add' . $product[$a]['product_id'] . '" class="btn btn-primary">Add to Cart</button></td>';
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
        <form action="cart.php" method="post">
            <button type="submit" class="btn btn-primary" name="goCart">Go to Cart</button>
        </form>


    </tbody>
</table>
</body>

</html>

