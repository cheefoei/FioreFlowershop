<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../controller/CatalogMaker.php';
$catmaker = new CatalogMaker();
$stmt = $catmaker->getAllcatalog();

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="../catalog.xsl"?><catalogs></catalogs>');
while ($row = $stmt->fetch()) {
    $track = $xml->addChild('catalog');
    $track->addChild('catalog_id', $row['catalog_id']);
    $track->addChild('name', $row['name']);
    $track->addChild('description', $row['description']);
    $track->addChild('date_created', $row['date_created']);
    $track->addChild('date_expired', $row['date_expired']);
}

Header('Content-type: text/xml');
print($xml->asXML());
//Include this 2 to initiate download
//header('Content-Disposition: attachment; filename="product.xml"');
//echo($xml->asXML());
?>