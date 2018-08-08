<?php

/**
 * Description of CatalogMaker
 *
 * @author jiaweiloo
 */
require_once 'CatalogMapper.php';
require_once 'ProductMapper.php';
require_once 'CatListMapper.php';

class CatalogMaker {

//put your code here
    private $catmapper;
    private $prodmapper;
    private $catlistmapper;

    function __construct() {
        $this->catmapper = new CatalogMapper();
        $this->prodmapper = new ProductMapper();
        $this->catlistmapper = new CatListMapper();
    }

    public function getAllcatalog() {
        return $this->catmapper->loadAll();
    }

    public function getCatalogByID($id) {
        return $this->catmapper->load($id);
    }

    public function addCatalog($newcatalog) {
        $this->catmapper->save($newcatalog);
    }

    public function updateCatalog($cat) {
        $this->catmapper->update($cat);
    }

    public function deleteCatalogByID($id) {
        $this->catmapper->delete($id);
    }

    public function getCatalogLastRow() {
        return $this->catmapper->getLastRow();
    }

    //------------------------Product Mapper-----------------------------------

    public function getAllProduct() {
        return $this->prodmapper->loadAll();
    }

    public function getProductByID($id) {       
        return $this->prodmapper->load($id);
    }

    public function addProduct($newproduct) {
        $this->prodmapper->save($newproduct);
    }

    public function updateProduct($prod) {
        $this->prodmapper->update($prod);
    }

    public function deleteProductByID($id) {
        $this->prodmapper->delete($id);
    }

    public function getProductLastRow() {       
        return $this->prodmapper->getLastRow();
    }

}
