<?php
//include 'C:\xampp\htdocs\Assignment\model\database.php';
include 'C:\xampp\htdocs\FioreFlowershop\JJmodel\database2.php';
//require_once 'C:\xampp\htdocs\Assignment\JJmodel\Delivery.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
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
                <th>Status</th>
                <th colspan="2">Action</th>
            </tr>

            <?php
            $result = Database::getInstance()->query2();
            foreach ($result as $row) {
                if ($row['status'] == "Pending") {
                    $orderDate = $row['orderDate'];
                    $orderID = $row['orderID'];
                    $custID = $row['custID'];
                    $custName = $row['custName'];
                    $DeliveredDate = $row['deliveredDate'];
                    $status = $row['status'];
                    $staffID = $row['StaffID'];
                    $payment = $row['Payment'];
                    $paymentdate = $row['paymentDate'];
                    $time =$row['payTime'];
                    
                    
                            
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
                    echo "<td>$status</td>";
                    echo '<td><a href="JJview/ConfirmDelivery.php?update=' . $row['orderID'] . '">Confirm Delivered</a></td>';
                   
                    echo "</tr>";
                }
            }
            // print_r($result); //print whole array
            ?>
    </table>
        
</body>
</html>
