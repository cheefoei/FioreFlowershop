<!DOCTYPE html>
<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$pickupDate = trim(date("Y-m-d"));
$time = trim(date('H:i:s'));
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    //require_once 'C:\xampp\htdocs\Assignment\model\Delivery.php';
    require_once '../JJcontroller/Facade.php';
}
?>
<?php
$newclass = new Facade();
$result = $newclass->SelectDelivery($id);
foreach ($result as $row) {
    //$name = $row['custName'];
    $custid = $row['custID'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../formCSS.css">
    </head>
    <body>
        <form method="post" action="../JJcontroller/confirmDelivered.php" >

            <div class="input-group">
                <label>Customer ID</label>
                <input type="text" name="custID" value="<?php echo $custid ?>"readonly=><br>
            </div><br>
            <div class="input-group">
                <label>Order ID</label>
                <input type="text" name="orderID" value="<?php echo $id; ?>" readonly=><br>
            </div><br>
            <div class="input-group">
                <label>Delivered Date</label>
                <input type="text" name="deliveredDate" value="<?php echo $pickupDate; ?>"readonly=><br>
            </div><br>
            <div class="input-group">
                <label>Delivered Time</label>
                <input type="text" name="deliveredTime" value="<?php echo $time; ?>"readonly=><br>
            </div><br>
            <div class="input-group">
                <label>Payment Date</label>
                <input type="text" name="paydate" value="<?php echo $pickupDate; ?>" readonly=><br>
                <input type="hidden" name="hiddenID" value="<?php echo $id; ?>">
            </div><br>
            <div class="input-group">

                <button class="btn" type="submit" name="update">Update Delivery</button>
            </div>

        </form>
    </body>
</html>
