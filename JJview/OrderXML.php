<?php

require_once '../JJcontroller/Facade.php';
$catmaker = new Facade();
$stmt = $catmaker->RetrieveDelivery();
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="Order2_XSL.xsl"?><Deliverys></Deliverys>');
foreach($stmt as $row) {
    $ststs = $xml->addChild('Delivery');
        $ststs->addChild('Order_ID', $row['orderID']);
        $ststs->addChild('orderDate', $row['orderDate']);
        $ststs->addChild('custID', $row['custID']);
        //$track->addChild('custName', $row['custName']);
        $ststs->addChild('pickupDate', $row['deliveredDate']);
        $ststs->addChild('Payment', $row['Payment']);
        $ststs->addChild('paymentDate', $row['paymentDate']);
        $ststs->addChild('payTime', $row['payTime']);
        $ststs->addChild('staffID', $row['StaffID']);
        $ststs->addChild('address',$row['deliveryAddress']);

}

Header('Content-type: text/xml');
print($xml->asXML());
//Include this 2 to initiate download
//header('Content-Disposition: attachment; filename="product.xml"');
//echo($xml->asXML());
