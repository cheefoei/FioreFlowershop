<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../controller/CatalogMapper.php';
require_once '../controller/ProductMapper.php';
require_once '../controller/CatListMapper.php';
$catmapper = new CatalogMapper();
$prodmapper = new ProductMapper();
$catlistmapper = new CatListMapper();
$stmt = $catmapper->loadAll();
$totalProduct = 0;

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="../totalCatalog.xsl"?> <catalogs></catalogs>');
while ($row = $stmt->fetch()) {
    $totalProduct = 0;
    $catalog = $xml->addChild('catalog');
    $catalog->addChild('catalog_id', $row['catalog_id']);
    $catalog->addChild('name', $row['name']);
    $catalog->addChild('description', $row['description']);
    $catalog->addChild('date_created', $row['date_created']);
    $catalog->addChild('date_expired', $row['date_expired']);
    $stmt2 = $catlistmapper->getCatList($row['catalog_id']);
    $product = $catalog->addChild('products');

    $prodid='';
    while ($row2 = $stmt2->fetch()) {
        $prodid = $prodid.$row2['product_id'].', ';        
        $totalProduct = $totalProduct + 1;
    }
    $product->addChild('product_id', $prodid);
    $catalog->addChild('total_product', $totalProduct);
}

Header('Content-type: text/xml');
print($xml->asXML());
//Include this 2 to initiate download
//header('Content-Disposition: attachment; filename="catalog.xml"');
//echo($xml->asXML());
?>