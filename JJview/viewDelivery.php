<!-- 
Name: Lim Jun Kit
 Group: G6
-->
<?php
//include 'C:\xampp\htdocs\Assignment\model\database.php';
require_once '../JJcontroller/Facade.php';
//require_once 'C:\xampp\htdocs\Assignment\JJmodel\Delivery.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="viewDelivery.php" method="post">
            <input type="date" name="bday">
            <button class="btn" type="submit" name="update">Check Delivery</button>
        </form>
        <table border="1">
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Payment</th>
                <th>Payment Data</th>
                <th>Customer Name</th>
                <th>Customer ID</th>
                <th>Delivered Date</th>
                <th>Delivered Time</th>
                <th>Staff In-charged</th>
                <th>Delivery Address</th>
                <th>Status</th>
                <th colspan="2">Action</th>
            </tr>

            <?php
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $pickupDate = trim(date("Y-m-d"));
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $pickupDate = trim(date("Y-m-d"));

            if (isset($_POST['update'])) {
                $date2 = $_POST['bday'];
            } else {
                $date2 = $pickupDate;
            }
            $f = new Facade();
            $result = $f->RetrieveDelivery();
            foreach ($result as $row) {
                if ($row['status'] == "Pending" and $row['deliveredDate'] == $date2) {
                    $orderDate = $row['orderDate'];
                    $orderID = $row['orderID'];
                    $custID = $row['custID'];
                    $custName = $row['custName'];
                    $DeliveredDate = $row['deliveredDate'];
                    $status = $row['status'];
                    $staffID = $row['StaffID'];
                    $payment = $row['Payment'];
                    $paymentdate = $row['paymentDate'];
                    $address = $row['deliveryAddress'];
                    $time = $row['payTime'];



                    //echo $orderDate;
                    echo "<tr>";
                    echo "<td>$orderID</td>";
                    echo "<td>$orderDate</td>";
                    echo "<td>$payment</td>";
                    echo "<td>$paymentdate</td>";
                    echo "<td>$custName</td>";
                    echo "<td>$custID</td>";
                    echo "<td>$DeliveredDate</td>";
                    echo "<td>$time</td>";
                    echo "<td>$staffID</td>";
                    echo "<td>$address</td>";
                    echo "<td>$status</td>";
                    echo '<td><a href="ConfirmDelivery.php?update=' . $row['orderID'] . '">Confirm Delivered</a></td>';

                    echo "</tr>";
                }
            }
            ?>
        </table>

    </body>
</html>
