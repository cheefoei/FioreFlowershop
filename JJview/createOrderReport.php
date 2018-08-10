<!-- 
Name: Lim Jun Kit
 Group: G6
-->
<?php


require_once '../JJcontroller/database2.php';
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="Order_XSL.xsl"?><Pick_Up></Pick_Up>');

$result = Database::getInstance()->query();
$pickupDate = trim(date("Y-m-d"));

foreach ($result as $row) {
    if ($row['status'] == "Done" && $row['pickupDate']==$pickupDate) {
        $track = $xml->addChild('PICKUP');
        $track->addChild('Order_ID', $row['OrderID']);
        $track->addChild('orderDate', $row['orderDate']);
        $track->addChild('custID', $row['custID']);
        $track->addChild('custName', $row['custName']);
        $track->addChild('pickupDate', $row['pickupDate']);
        $track->addChild('Payment2', $row['Payment']);
        $track->addChild('paymentDate', $row['paymentDate']);
        $track->addChild('payTime', $row['payTime']);
        $track->addChild('staffID', $row['staffID']);
    }
}

Header('Content-type: text/xml');
print($xml->asXML());

