<html>

    <head>

        <meta charset="UTF-8">
        <title>Flora Flowershop - Staff Login</title>

        <?php
        include '../header.php';
        require_once '../JJcontroller/StaffLoginControl.php';

        // Check any user already log in
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        } 
        if (isset($_SESSION['customer'])) {
            header("Location: ../view/customer/CustomerMainPage.php");
        }
        if (isset($_SESSION['staff'])) {
            header("Location: StaffMainPage.php");
        }

        $StaffLoginControl = new StaffLoginControl();
        if (isset($_POST['login'])) {
            $user = new User();
            $user->setId($_POST['id']);
            $user->setPassword($_POST['pwd']);
            $StaffLoginControl->UserLogin($user);
        }
        ?>

    </head>

    <body class="container">

        <br/>
        <h2>Staff Login</h2>
        <br/>
        <br/>

        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1">User ID</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="email" name="id" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1" for="pwd">Password</label>
                <div class="col-sm-5"> 
                    <input type="password" class="form-control" id="pwd" name="pwd" required="required">
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-7 col-sm-5">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>
            </div>
            <div class="form-group has-error bg-danger">     
                <?php if (isset($_SESSION['staff_login_error'])) { ?>
                    <p class="error help-block"><?php echo $_SESSION['staff_login_error']; ?></p>
                    <?php unset($_SESSION['staff_login_error']); ?>
                <?php } ?>
            </div>
        </form>

    </body>
</html>
