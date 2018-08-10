<!DOCTYPE html>
<!-- 
Name: Lim Jun Kit
 Group: G6
-->
<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$pickupDate = trim(date("Y-m-d"));
$time = trim(date('H:i:s'));
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    require_once'../JJcontroller/Facade.php';
}
?>
<?php
//$result = Database::getInstance()->query3($id);
$facde2 = new Facade();
$result = $facde2->SelectPickup($id);
foreach ($result as $row) {
    $name=$row['custName'];
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
        <form method="post" action="../JJcontroller/confirmPickup.php" >
            <div class="input-group">
                <label>Customer Name</label>
                <input type="text" name="custID" value="<?php echo $name ?>" readonly=><br>
            </div><br>
            <div class="input-group">
                <label>Customer ID</label>
                <input type="text" name="custID" value="<?php echo $custid ?>" readonly=><br>
            </div><br>
            <div class="input-group">
                <label>Order ID</label>
                <input type="text" name="orderID" value="<?php echo $id; ?>" readonly=><br>
            </div><br>
            <div class="input-group">
                <label>Pickup Date</label>
                <input type="text" name="pickupdate" value="<?php echo $pickupDate; ?>"><br>
            </div><br>
            <div class="input-group">
                <label>Pickup Time</label>
                <input type="text" name="pickuptime" value="<?php echo $time; ?>"><br>
            </div><br>
            <div class="input-group">
                <label>Payment Date</label>
                <input type="text" name="paydate" value="<?php echo $pickupDate; ?>"><br>
                <input type="hidden" name="hiddenID" value="<?php echo $id; ?>">
            </div><br>
            <div class="input-group">

                <button class="btn" type="submit" name="save">Update Pickup</button>
            </div>

        </form>
    </body>
</html>
