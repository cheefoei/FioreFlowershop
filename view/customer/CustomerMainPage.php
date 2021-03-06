
<!-- 
Name: Leong Chee Foei
 Group: G6
-->

<html>

    <head>
        <meta charset="UTF-8">
        <title>Flora Flowershop - Customer Main Page</title>

        <?php
        include '../../header.php';
        require_once '../../controller/CustomerServicer.php';

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['customer'])) {
            header("Location: ../../index.php");
        }

        $CustomerServicer = new CustomerServicer();
        if (isset($_GET['logout'])) {
            $CustomerServicer->CustomerLogout();
        }
        ?>
    </head>

    <body class="container">

        <br/>
        <h2>Customer Main Page</h2>
        <br/>
        <br/>

        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-warning">
                    <div class="panel-heading" style="text-align: center">
                        <a href="../../order/view/order.php">Order</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: center">
                        <a href="../../order/view/orderReportXML.php">Order History</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center">
                        <a href="CustomerInvoiceSelector.php.php">Invoice</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: center">
                        <a href="CustomerProfile.php">Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-danger">
                    <div class="panel-heading" style="text-align: center">
                        <a href="CustomerMainPage.php?logout=true">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
