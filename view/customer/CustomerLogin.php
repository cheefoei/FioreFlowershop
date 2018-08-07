
<!-- 
Name: Leong Chee Foei
 Group: G6
-->

<html>

    <head>

        <meta charset="UTF-8">
        <title>Customer Login</title>

        <?php
        include '../../header.php';
        require_once '../../controller/customer/CustomerController.php';

        $CustomerController = new CustomerController();

        if (isset($_GET['do'])) {

            $email = $CustomerController->test_input($_POST['email']);
            $password = $CustomerController->test_input($_POST['pwd']);

            echo 'yes';
        } else {
            echo 'no';
        }
        ?>

    </head>

    <body class="container">

        <br/>
        <h2>Customer Login</h2>
        <br/>
        <br/>

        <form class="form-horizontal" method="post" action="<?= $_SERVER['PHP_SELF']; ?>?do=true">
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1" for="email">Email</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" id="email" placeholder="example@email.com" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1" for="pwd">Password</label>
                <div class="col-sm-5"> 
                    <input type="password" class="form-control" id="pwd" placeholder="********" required="required">
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-7 col-sm-5">
                    <button type="submit" class="btn btn-primary" name="submit">Login</button>
                </div>
            </div>
        </form>

    </body>
</html>