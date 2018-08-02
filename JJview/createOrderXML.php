<?php
include 'C:\xampp\htdocs\FioreFlowershop\JJmodel\database2.php';
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="Order2_XSL.xsl"?><Orders></Orders>');
$result = Database::getInstance()->query5();
$pickupDate = trim(date("Y-m-d"));

foreach ($result as $row) {
    if (date("Y-m-d", strtotime($row['date'])) == $pickupDate) {
        $track = $xml->addChild('Order');
        $track->addChild('Order_ID', $row['id']);
        $track->addChild('orderDate', $row['date']);
        $track->addChild('custID', $row['customer_id']);
        $track->addChild('status', $row['status']);
        $track->addChild('amount', $row['total_amount']);
    }
}

Header('Content-type: text/xml');
print($xml->asXML());
?>

