
<html>

    <head>

        <meta charset="UTF-8">
        <title>Customer Registration</title>

        <?php
        include '../../header.php';
        ?>

    </head>

    <body class="container">

        <br/>
        <h2>Customer Registration</h2>
        <br/>
        <br/>

        <form class="form-horizontal" action="../../controller/customer/CustomerController.php">
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1">Which type of you?</label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                        <input type="radio" name="custType" checked>Consumer
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="custType">Corporate</label>   
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1">First Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="first" placeholder="John" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1">Last Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="last" placeholder="Smith" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1">Address</label>
                <div class="col-sm-5">
                    <textarea class="form-control" rows="5" id="address" placeholder="75, Kg Sg Ramal Luar, 43000 Kajang, Selangor, Malaysia " required="required"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-1">Phone Number</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="phone" placeholder="0123456789" required="required">
                </div>
            </div>
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
                <label class="control-label col-sm-2 col-sm-offset-1" for="pwd">Confirm Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" id="cpwd" placeholder="********" required="required">
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-7 col-sm-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </body>
</html>
