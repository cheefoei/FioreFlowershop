<?php
include '../../header.php';
require '../controller/manageOrder.php';

if (isset($_POST['submit'])) {
    session_start();
    $orderList = $_SESSION['orderList'];

    $order = new manageOrder();
    $id = $order->addOrder(1, $_SESSION['total'], false);

    foreach ($orderList as $list) {
        $order->addOrderList($id, $list[1], $list[2]);
    }

    unset($_SESSION['orderList']);
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
                        <input type="radio" name="checkOutType" checked value="pickup">Pick Up
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="checkOutType" value="delivery">Delivery
                    </label>   
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Date</label>
                <div class="col-sm-10">
                    <input id="datefield" type='date' min='1899-01-01' max='2000-13-13'/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Time</label>
                <div class="col-sm-10">
                    <input type="time" name="time"/>
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">Check Out</button>
                </div>
            </div>
        </form>

    </body>
</html>
