
<!-- 
Name: Leong Chee Foei
 Group: G6
-->

<html>

    <head>

        <meta charset="UTF-8">
        <title>Flora Flowershop - Customer Login</title>

        <?php
        include '../../header.php';
        require_once '../../controller/customer/CustomerController.php';

        $CustomerController = new CustomerController();

        if (isset($_POST['login'])) {

            $email = $CustomerController->test_input($_POST['email']);
            $password = $CustomerController->test_input($_POST['pwd']);

            $customer = new Customer();
            $customer->setEmail($email);
            $customer->setPassword($password);
            $CustomerController->AuthCustomer($customer);
        }
        ?>

    </head>

    <body class="container">

        <br/>
        <h2>Customer Login</h2>
        <br/>
        <br/>

        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1" for="email">Email</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1" for="pwd">Password</label>
                <div class="col-sm-5"> 
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="********" required="required">
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-7 col-sm-5">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>
            </div>
            <div class="form-group has-error bg-danger">     
                <?php if (isset($_SESSION['customer_login_error'])) { ?>
                    <p class="error help-block"><?php echo $_SESSION['customer_login_error']; ?></p>
                    <?php unset($_SESSION['customer_login_error']); ?>
                <?php } ?>
            </div>
        </form>

    </body>
</html>
