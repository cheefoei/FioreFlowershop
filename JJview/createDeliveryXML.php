<?php

include '../JJcontroller/DeliveryDatabase.php';
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="Delivery_XSL.xsl"?><Deliverys></Deliverys>');
$result = DeliveryDatabase::getInstance()->query2();
$pickupDate = trim(date("Y-m-d"));

foreach ($result as $row) {
    if ($row['status'] == "Delivered" && $row['deliveredDate']==$pickupDate) {
        $track = $xml->addChild('Delivery');
        $track->addChild('Order_ID', $row['orderID']);
        $track->addChild('orderDate', $row['orderDate']);
        $track->addChild('custID', $row['custID']);
        $track->addChild('custName', $row['custName']);
        $track->addChild('pickupDate', $row['deliveredDate']);
        $track->addChild('Payment', $row['Payment']);
        $track->addChild('paymentDate', $row['paymentDate']);
        $track->addChild('payTime', $row['payTime']);
        $track->addChild('staffID', $row['StaffID']);
        $track->addChild('address',$row['deliveryAddress']);
    }
}

Header('Content-type: text/xml');
print($xml->asXML());

?>

