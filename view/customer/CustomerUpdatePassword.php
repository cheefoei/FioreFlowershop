
<!-- 
Name: Leong Chee Foei
 Group: G6
-->

<html>

    <head>

        <meta charset="UTF-8">
        <title>Flora Flowershop - Customer Change Password</title>

        <?php
        include '../../header.php';
        require_once '../../controller/CustomerServicer.php';

        // Check any user already log in
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['customer'])) {
            header("Location: ../../index.php");
        }

        $CustomerServicer = new CustomerServicer();
        $customer = $_SESSION['customer'];
        $password_error = '';

        if (isset($_POST['update_pwd'])) {

            $password = $CustomerServicer->test_input($_POST['pwd']);
            $cpassword = $CustomerServicer->test_input($_POST['cpwd']);

            if (strcmp($password, $cpassword) == 0) {
                $CustomerServicer->UpdateCustomerPassword($customer, $password);
            } else {
                $password_error = 'Password and confirm password are not match.';
            }
        }
        ?>

    </head>

    <body class="container">

        <br/>
        <a href="CustomerMainPage.php">Home</a>  
        <br/>
        <h2> Customer Change Password</h2>
        <br/>

        <?php if ($customer instanceof Customer) { ?>

            <form class="form-horizontal" method="post">
                <div class="form-group has-error bg-danger">   
                    <?php echo $password_error; ?>
                </div>
                <?php if (isset($_SESSION['customer_update_password'])) { ?>
                    <?php $response = $_SESSION['customer_update_password']; ?>
                    <?php if ($response["success"]) { ?>
                        <div class="form-group has-error bg-success">   
                            <p><?php echo $response["msg"]; ?></p>
                        </div>
                    <?php } else { ?>
                        <div class="form-group has-error bg-danger">   
                            <p><?php echo $response["msg"]; ?></p>
                        </div>
                    <?php } ?>
                    <?php unset($_SESSION['customer_update_password']); ?>
                <?php } ?>

                <div class="form-group">
                    <label class="control-label col-sm-2 col-sm-offset-1" for="pwd">Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="pwd" placeholder="********" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 col-sm-offset-1" for="pwd">Confirm Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="cpwd" placeholder="********" required="required">
                    </div>
                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-6 col-sm-6">
                        <button type="submit" class="btn btn-danger" name="update_pwd">Change Password</button>
                    </div>
                </div>
            </form>

        <?php } ?>

    </body>
</html>
