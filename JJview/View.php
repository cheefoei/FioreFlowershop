<?php
//include 'C:\xampp\htdocs\Assignment\model\database.php';
require_once '../JJcontroller/Facade.php';
//include_once '../JJcontroller/Facade.php'; 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="View.php" method="post">
            <input type="date" name="bday">
            <button class="btn" type="submit" name="update">Check Pickup</button>
        </form>

        <table border="1">
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Payment</th>
                <th>Payment Data</th>
                <th>Customer Name</th>
                <th>Customer ID</th>
                <th>Pickup Date</th>
                <th>Pickup Time</th>
                <th>Staff In-charged</th>
                <th>Status</th>
                <th colspan="2">Action</th>
            </tr>

            <?php
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $pickupDate = trim(date("Y-m-d"));
          
            if (isset($_POST['update'])) {
                 $date2 = $_POST['bday'];
            }
            else{
                 $date2 = $pickupDate;
            }
            
            $class = new Facade();
            $result = $class->RetrievePickup();
            
            //$result=$class->getAllpickup();
            foreach ($result as $row) {
                if ($row['status'] == "Pending" and $row['pickupDate'] == $date2) {
                    $orderDate = $row['orderDate'];
                    $orderID = $row['OrderID'];
                    $custID = $row['custID'];
                    $custName = $row['custName'];
                    $pickupdate = $row['pickupDate'];
                    $time = $row['payTime'];
                    $status = $row['status'];
                    $staffID = $row['staffID'];
                    $payment = $row['Payment'];
                    $paymentdate = $row['paymentDate'];

                    //echo $orderDate;
                    echo "<tr>";
                    echo "<td>$orderID</td>";
                    echo "<td>$orderDate</td>";
                    echo "<td>$payment</td>";
                    echo "<td>$paymentdate</td>";
                    echo "<td>$custName</td>";
                    echo "<td>$custID</td>";
                    echo "<td>$pickupdate</td>";
                    echo "<td>$time</td>";
                    echo "<td>$staffID</td>";
                    echo "<td>$status</td>";
                    echo '<td><a href="ConfirmPickup.php?edit=' . $row['OrderID'] . '">Confirm Pickup</a></td>';
                    echo "</tr>";
                }
            }
            // print_r($result); //print whole array
            ?>
        </table>

    </body>
</html>
