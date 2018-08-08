
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
        require_once '../../controller/customer/CustomerController.php';

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['customer'])) {
            header("Location: ../../index.php");
        }

        $CustomerController = new CustomerController();
        if (isset($_GET['logout'])) {
            $CustomerController->CustomerLogout();
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
                        <a href="">Order</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: center">
                        <a href="view/customer/CustomerLogin.php">Invoice</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center">
                        <a href="view/customer/CustomerLogin.php">Report</a>
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
