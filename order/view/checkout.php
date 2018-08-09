<?php
include '../../header.php';
require '../controller/manageOrder.php';
require_once '../model/orderClass.php';
require_once '../model/orderListClass.php';
require '../controller/shippingClass.php';
require_once '../../model/Customer.php';

date_default_timezone_set('Asia/Kuala_Lumpur');

if (isset($_POST['submit'])) {
    session_start();
    $customer = $_SESSION['customer'];
    $orderList = $_SESSION['orderList'];
    $orderHelper = new manageOrder();
    $order = new Order($customer->getId(), $_SESSION['total']);
    

    $id = $orderHelper->addOrder($order);

    foreach ($orderList as $list) {
        $orderItem = new OrderList($id, $list[1], $list[2]);
        $orderHelper->addOrderList($orderItem);
    }
    $customerFullName  = $customer->getFname(). " " .$customer->getLname() ;

    if (isset($_POST['checkOutType'])) {
            $shipping = new Shipping;
        if ($_POST['checkOutType'] == "delivery") {
            $shipping->shipping("delivery");
            $test = $shipping->getShippingMethod();
            $test->addDelivery($customerFullName, $customer->getId(), $id, date('Y-m-d h:i:s'), $customer->getAddress(), $_POST['date'], $_SESSION['total']);
            //$order->addDelivery ($custName, $custID, $orderID, $orderDate, $deliveryAddress, $deliveredDate);
            echo '<script language="javascript">';
            echo 'alert("Your order '.date('Y-m-d h:i:s').' is estimated to be arrived at ' . $_POST['date'] . ' on ' . date('h:i a', strtotime($_POST['time'])) . '")';
            echo '</script>';
        } elseif ($_POST['checkOutType'] == "pickup") {
            $shipping->shipping("pickup");
            $test = $shipping->getShippingMethod();
            $test->addPickUp($customerFullName, $customer->getId(), $id, date('Y-m-d h:i:s'), $_POST['date'], $_SESSION['total']);
            echo '<script language="javascript">';
            echo 'alert("You can '.date('Y-m-d h:i:s').' pick up your order at ' . $_POST['date'] . ' on ' . date('h:i a', strtotime($_POST['time'])) . '")';
            echo '</script>';
        }
        //print_r($_SERVER['HTTP_REFERER']);
        unset($_SESSION['total']);
        unset($_SESSION['orderList']);

        //$order->test();
        /*echo '<script type="text/javascript">';
        echo 'window.location.href = "order.php";';
        echo '</script>';*/
    }
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
    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datefield").setAttribute("max", today);</script>
    <head>

        <meta charset="UTF-8">
        <title>Check Out</title>
    </head>

    <body class="container">
        <br/>
        <h2>Check Out</h2>
        <br/>
        <br/>
        <form class="form-horizontal" action="" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-2">Check Out Type</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="checkOutType" value="pickup" checked="">Pick Up
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="checkOutType" value="delivery">Delivery
                    </label>   
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Date</label>
                <div class="col-sm-10">
                    <input id="datefield" type='date' min='1899-01-01' max='2000-13-13' name="date" required=""/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Time</label>
                <div class="col-sm-10">
                    <input type="time" name="time" required=""/>
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">Check Out</button>
                </div>
            </div>
        </form>
        <form class="form-horizontal" action="cart.php" method="POST">

            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="cart">Go to Cart</button>
                </div>
            </div>
        </form>
    </body>
</html>
