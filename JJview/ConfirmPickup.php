<!DOCTYPE html>
<?php
$pickupDate = trim(date("Y-m-d"));
$time = trim(date('H:i:s'));
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    include 'C:\xampp\htdocs\FioreFlowershop\JJmodel\database2.php';
}
?>
<?php
$result = Database::getInstance()->query3($id);
foreach($result as $row){
    $name=$row['custID'];
    $custid=$row['custID'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../formCSS.css">
    </head>
    <body>
        <form method="post" action="../JJmodel/confirmPickup.php" >
            <div class="input-group">
                <label>Customer Name</label>
                <input type="text" name="custName" value="<?php echo $name?>" readonly=""><br>
            </div><br>
            <div class="input-group">
                <label>Customer ID</label>
                <input type="text" name="custID" value="<?php echo $custid?>" readonly=><br>
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
