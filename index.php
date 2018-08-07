<?php
//include_once 'C:\xampp\htdocs\FioreFlowershop\JJcontroller\controller.php';
//$controller = new controller();
//$controller->invoke();
?>

<html>

    <head>

        <meta charset="UTF-8">
        <title>Welcome to Flora Flowershop</title>

        <?php
        include 'header.php';
        ?>

    </head>

    <body class="container">

        <br/>
        <h2>Welcome to Flora Flowershop</h2>
        <br/>
        <br/>

        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-body" style="text-align: center">
                        <a href="view/customer/CustomerLogin.php">Customer</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-body" style="text-align: center">
                        <a href="view/customer/CustomerLogin.php">Staff</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
