<?php
class Order {

    private $conn;
    private $orderStatus = "Paid";

    function __construct() {
        require_once 'database2.php';
        $db = database::getInstance();
        $this->conn = $db->getConnection();
    }
    
    
    public function updateOrder($id) {
        $query = "UPDATE floral_order SET status='$this->orderStatus' where id='$id'";
        $this->_query = $this->conn->prepare($query);
        $this->_query->execute();
    }

    public function query5() {
        $query = "SELECT * FROM floral_order";
        if ($this->_query = $this->conn->prepare($query)) {
            if ($this->_query->execute()) {
                $result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $result;
    }

}
