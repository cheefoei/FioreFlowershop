<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../connect_db.php';
$db = database::getInstance();
$conn = $db->getConnection();
$query = "SELECT * FROM product";
$stmt1 = $conn->prepare($query);
$stmt1->execute();
$stmt2 = $conn->prepare("SELECT * FROM order_list");
$stmt2->execute();
$stmt3 = $conn->prepare("SELECT * FROM floral_order");
$stmt3->execute();
$order = $stmt3->fetchAll(PDO::FETCH_ASSOC);
$orderList = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$products = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="order.xsl"?><orders></orders>');
foreach ($order as $key) {
    $track = $xml->addChild('order');
    $track->addChild('order_id', $key['id']);
    $track->addChild('order_date', $key['date']);
    $track->addChild('total_amount', $key['total_amount']);
    $track->addChild('status', $key['status']);
    foreach ($orderList as $key2) {
        if ($key['id'] == $key2['order_id']) {
            $track2 = $track->addChild('orderlist');
            $track2->addChild('orderlistID', $key2['id']);
            $track2->addChild('productID', $key2['id']);
            $track2->addChild('quantity', $key2['quantity']);
            foreach ($products as $key3) {
                if ($key3['product_id'] == $key2['product_id']) {
                    $track2->addChild('productName', $key3['product_name']);
                    $track2->addChild('unitPrice', $key3['price']);
                    $track2->addChild('subtotal', $key3['price']*$key2['quantity']);
                }
            }
        }
    }
}


/*while ($row = $stmt3->fetch()) {
    $track = $xml->addChild('order');
    $track->addChild('order_id', $row['id']);
    $track->addChild('order_date', $row['date']);
    $track->addChild('total_amount', $row['total_amount']);
    $track->addChild('status', $row['status']);
    while ($row = $stmt2->fetch()) {
        $track2 = $track->addChild('orderlist');
        $track2->addChild('date_expired', $row['date_expired']);
        $track2->addChild('total_stock', $row['total_stock']);
        $track2->addChild('price', $row['price']);
        $track2->addChild('weight', $row['weight']);
    }
}*/

Header('Content-type: text/xml');
print($xml->asXML());
//Include this 2 to initiate download
//header('Content-Disposition: attachment; filename="product.xml"');
//echo($xml->asXML());