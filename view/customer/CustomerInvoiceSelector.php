
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
        if (isset($_POST['invoice'])) {

            $month = $CustomerServicer->test_input($_POST['month']);
            $year = $CustomerServicer->test_input($_POST['year']);

            $year_month = array();
            $year_month['month'] = $month;
            $year_month['year'] = $year;

            $_SESSION['year_month'] = $year_month;
            header("Location: CustomerInvoiceViewer.php");
        }
        ?>
    </head>

    <body class="container">

        <br/>
        <a href="CustomerMainPage.php">Home</a>  
        <br/>
        <h2>Customer Invoice</h2>
        <br/>
        <br/>

        <?php $customer = $_SESSION['customer']; ?>
        <?php if ($customer instanceof Customer) { ?>
            <?php if (strcmp($customer->getType(), 'Corporate') == 0) { ?>

                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-1">Month</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="month">
                                <?php
                                for ($i = 1; $i < 13; $i++) {
                                    echo "<option value='$i'>" . date('F', mktime(0, 0, 0, $i, 10)) . "</option>";
                                }
                                ?>
                            </select>                
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-1">Year</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="year">
                                <?php
                                for ($i = 2016; $i < 2019; $i++) {
                                    echo "<option value='$i'>" . $i . "</option>";
                                }
                                ?>
                            </select>        
                        </div>
                    </div>
                    <br/>
                    <div class="form-group"> 
                        <div class="col-sm-offset-7 col-sm-5">
                            <button type="submit" class="btn btn-primary" name="invoice">Get Invoice</button>
                        </div>
                    </div>
                </form>

            <?php } else { ?>
                <div class="form-group has-error bg-danger">   
                    <p>Only corporate customer can view invoice. </p>
                </div>
            <?php } ?>
        <?php } ?>

    </body>
</html>
