<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../controller/CatalogMaker.php';
$catmaker = new CatalogMaker();
$stmt = $catmaker->getAllProduct();

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="../totalProduct.xsl"?><products></products>');
while ($row = $stmt->fetch()) {
    $track = $xml->addChild('product');
    $track->addChild('product_id', $row['product_id']);
    $track->addChild('product_name', $row['product_name']);
    $track->addChild('product_description', $row['product_description']);
    $track->addChild('date_created', $row['date_created']);
    $track->addChild('date_expired', $row['date_expired']);
    $track->addChild('total_stock', $row['total_stock']);
    $track->addChild('price', $row['price']);
    $track->addChild('weight', $row['weight']);
}

Header('Content-type: text/xml');
print($xml->asXML());
//Include this 2 to initiate download
//header('Content-Disposition: attachment; filename="product.xml"');
//echo($xml->asXML());
?>