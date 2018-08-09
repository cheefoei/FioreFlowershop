
<!-- 
Name: Leong Chee Foei
 Group: G6
-->

<html>

    <head>

        <meta charset="UTF-8">
        <title>Flora Flowershop - Customer Profile Update</title>

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

        $customer = $_SESSION['customer'];

        if (isset($_POST['update'])) {

            $CustomerServicer = new CustomerServicer();

            $fname = $CustomerServicer->test_input($_POST['fname']);
            $lname = $CustomerServicer->test_input($_POST['lname']);
            $address = $CustomerServicer->test_input($_POST['address']);
            $phone = $CustomerServicer->test_input($_POST['phone']);
            $email = $CustomerServicer->test_input($_POST['email']);

            $customer->setFname($fname);
            $customer->setLname($lname);
            $customer->setAddress($address);
            $customer->setPhone_number($phone);
            $customer->setEmail($email);
            $CustomerServicer->UpdateCustomerProfile($customer);
        }
        ?>

    </head>

    <body class="container">

        <br/>
        <a href="CustomerMainPage.php">Home</a>  
        <br/>
        <h2> Customer Profile Update</h2>
        <br/>

        <?php if ($customer instanceof Customer) { ?>

            <form class="form-horizontal" method="post">
                <?php if (isset($_SESSION['customer_update_profile'])) { ?>
                    <?php $response = $_SESSION['customer_update_profile']; ?>
                    <?php if ($response["success"]) { ?>
                        <div class="form-group has-error bg-success">   
                            <p><?php echo $response["msg"]; ?></p>
                        </div>
                    <?php } else { ?>
                        <div class="form-group has-error bg-danger">   
                            <p><?php echo $response["msg"]; ?></p>
                        </div>
                    <?php } ?>
                    <?php unset($_SESSION['customer_update_profile']); ?>
                <?php } ?>

                <div class="form-group">
                    <label class="control-label col-sm-2 col-sm-offset-1">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="fname" required="required" value="<?php echo $customer->getFname() ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 col-sm-offset-1">Last Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="lname" required="required" value="<?php echo $customer->getLname() ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 col-sm-offset-1">Address</label>
                    <div class="col-sm-5">
                        <textarea class="form-control" rows="5" name="address" required="required"><?php echo $customer->getAddress() ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 col-sm-offset-1">Phone Number</label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" name="phone" required="required" value="<?php echo $customer->getPhone_number() ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 col-sm-offset-1" for="email">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" required="required" value="<?php echo $customer->getEmail() ?>" />
                    </div>
                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-7 col-sm-5">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                </div>
            </form>

        <?php } ?>

    </body>
</html>
