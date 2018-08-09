<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>

        <meta charset="UTF-8">
        <title>Welcome to Flora Flowershop</title>

        <?php 
        include '../header.php';
        session_start();
        if (isset($_SESSION['staff'])) {


            if (isset($_POST['logout'])) {

                echo "Logging out";
                unset($_SESSION['staff']);
                echo '<script>window.location.href = "StaffLogin.php";</script>';
            }
            ?>

        </head>

        <body class="container">

            <br/>
            <h2>Staff Main Pages</h2>
            <br/>
            <br/>

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-body" style="text-align: center">
                            <a href="View.php">Update Pick Up</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-body" style="text-align: center">
                            <a href="viewDelivery.php">Update Delivery</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-body" style="text-align: center">
                            <a href="adminReport.php">View Report</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-body" style="text-align: center">
                            <a href="../catalog/view/createTtlCatalogXML.php">View Total Catalog Report</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-body" style="text-align: center">
                            <a href="../catalog/view/createTtlProductXML.php">View Total Product Report</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-body" style="text-align: center">

                            <form id="contact" action="StaffMainPage.php" method="post">
                                <fieldset>
                                    <button name="logout" type="submit">Logout</button>
                                </fieldset>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </body>
    </html>
    <?php
} else {
    echo '<script>window.location.href = "StaffLogin.php";</script>';
}
?>