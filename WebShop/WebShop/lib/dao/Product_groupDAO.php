<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product_groupDAO
 *
 * @author markus
 */
class Product_groupDAO {
    //put your code here
    private $connection;
    
    public function __construct(&$connection) {
        $this->connection = &$connection;
    }
    
    public function getProductGroupList(){
        $query = $this->connection->prepare("SELECT * FROM Product_group;");
        $query->execute();
        $product_goups = array();
        while ($row = $query->fetch()){
            $product_goups[$row["product_group_id"]] = new Product_group();
            $product_goups[$row["product_group_id"]]->setGroup($row);
        }
        return $product_goups;
    }
}
?>
