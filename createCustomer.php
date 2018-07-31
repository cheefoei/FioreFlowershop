
<html>

    <head>

        <meta charset="UTF-8">
        <title>Customer Registration</title>

        <?php
        include 'header.php';
        ?>

    </head>

    <body class="container">

        <br/>
        <h2>Customer Registration</h2>
        <br/>
        <br/>

        <form class="form-horizontal" action="doCreateCustomer">
            <div class="form-group">
                <label class="control-label col-sm-2">Customer Type</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="custType" checked>Consumer
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="custType">Corporate</label>   
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">First Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="first" placeholder="John">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="last" placeholder="Smith">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Address</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="5" id="address" placeholder="75, Kg Sg Ramal Luar, 43000 Kajang, Selangor, Malaysia "></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Phone Number</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="phone" placeholder="0123456789">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="example@email.com">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password</label>
                <div class="col-sm-10"> 
                    <input type="password" class="form-control" id="pwd">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Confirm Password</label>
                <div class="col-sm-10"> 
                    <input type="password" class="form-control" id="cpwd">
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </body>
</html>
