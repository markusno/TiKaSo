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

    public function getProductGroupList() {
        $query = $this->connection->prepare("SELECT * FROM Product_group;");
        $query->execute();
        $product_goups = array();
        while ($row = $query->fetch()) {
            $product_goups[$row["product_group_id"]] = new Product_group($row);
        }
        return $product_goups;
    }

    public function getProductGroupIdListForProduct($product_id) {
        $query = $this->connection->prepare("SELECT product_group_id
            FROM Product_in_group
            WHERE product_id = ?;");
        $query->execute(array($product_id));
        $product_group_ids = array();
        while ($ids = $query->fetch()) {
            $product_group_ids[] = $ids[0];
        }
        return $product_group_ids;
    }

    public function getProductGroup($product_group_id) {
        $query = $this->connection->prepare("SELECT * 
            FROM Product_group
            WHERE product_group_id = ?;");
        $query->execute(array($product_group_id));
        $product_group_info = $query->fetch();
        $product_group = new Product_group($product_group_info);
        return $product_group;
    }

}

?>
