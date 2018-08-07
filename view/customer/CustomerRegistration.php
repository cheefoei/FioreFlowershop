
<!-- 
Name: Leong Chee Foei
 Group: G6
-->

<html>

    <head>

        <meta charset="UTF-8">
        <title>Flora Flowershop - Customer Registration</title>

        <?php
        include '../../header.php';
        require_once '../../controller/customer/CustomerController.php';

        $CustomerController = new CustomerController();
        $password_error = '';

        if (isset($_POST['register'])) {

            $password = $CustomerController->test_input($_POST['pwd']);
            $cpassword = $CustomerController->test_input($_POST['cpwd']);

            if (strcmp($password, $cpassword) == 0) {

                $type = $CustomerController->test_input($_POST['custType']);
                $fname = $CustomerController->test_input($_POST['fname']);
                $lname = $CustomerController->test_input($_POST['lname']);
                $address = $CustomerController->test_input($_POST['address']);
                $phone = $CustomerController->test_input($_POST['phone']);
                $email = $CustomerController->test_input($_POST['email']);

                $customer = new Customer();
                $customer->setType($type);
                $customer->setFname($fname);
                $customer->setLname($lname);
                $customer->setAddress($address);
                $customer->setPhone_number($phone);
                $customer->setEmail($email);
                $customer->setPassword($password);
                $CustomerController->CreateCustomer($customer);
            } else {
                $password_error = 'Password and confirm password are not match.';
            }
        }
        ?>

    </head>

    <body class="container">

        <br/>
        <h2>Customer Registration</h2>
        <br/>

        <form class="form-horizontal" method="post">
            <div class="form-group has-error bg-danger">   
                <?php echo $password_error; ?>
            </div>
            <?php if (isset($_SESSION['customer_reg'])) { ?>
                <?php $response = $_SESSION['customer_reg']; ?>
                <?php if ($response["success"]) { ?>
                    <div class="form-group has-error bg-info">   
                        <p><?php echo $response["msg"]; ?></p>
                    </div>
                <?php } else { ?>
                    <div class="form-group has-error bg-danger">   
                        <p><?php echo $response["msg"]; ?></p>
                    </div>
                <?php } ?>
                <?php unset($_SESSION['customer_reg']); ?>
            <?php } ?>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1">Which type of you?</label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                        <input type="radio" name="custType" value="Consumer" checked>Consumer
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="custType" value="Corporate">Corporate</label>   
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1">First Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="fname" placeholder="John" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1">Last Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="lname" placeholder="Smith" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1">Address</label>
                <div class="col-sm-5">
                    <textarea class="form-control" rows="5" name="address" placeholder="75, Kg Sg Ramal Luar, 43000 Kajang, Selangor, Malaysia " required="required"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1">Phone Number</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="phone" placeholder="0123456789" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1" for="email">Email</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="email" placeholder="example@email.com" required="required">
                </div>
            </div>
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
                <div class="col-sm-offset-7 col-sm-5">
                    <button type="submit" class="btn btn-primary" name="register">Submit</button>
                </div>
            </div>
        </form>

    </body>
</html>
