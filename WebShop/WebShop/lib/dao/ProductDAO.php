<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductDAO
 *
 * @author markus
 */
class ProductDAO {

    //put your code here

    private $connection;

    public function __construct(&$connection) {
        $this->connection = &$connection;
    }

    public function getProduct($product_ID) {
        $query = $this->connection->prepare("SELECT * 
            FROM Product
            WHERE product_id = ?");
        $query->execute(array($product_ID));
        $product_info = $query->fetch();
        $product = new Product($product_info);
        return $product;
    }

    public function getAllProducts() {
        $query = $this->connection->prepare("SELECT * FROM Product;");
        $query->execute();
        $all_products = array();
        while ($product_info = $query->fetch()) {
            $all_products[] = new Product($product_info);
        }
        return $all_products;
    }

    public function getProductsInGroup($product_group_ID) {
        $query = $this->connection->prepare("SELECT Product_id 
            FROM Product_in_group 
            WHERE Product_in_group.product_group_id = ?;");
        $query->execute(array($product_group_ID));
        $products_in_group = array();
        while ($row = $query->fetch()) {
            $products_in_group[] = $this->getProduct($row["product_id"]);
        }
        return $products_in_group;
    }

    public function removeProductFromAllGroups($product_id){
        $query = $this->connection->prepare("DELETE FROM Product_in_group
            WHERE product_id = ?;");
        $query->execute(array($product_id));
    }
    
    public function saveExistingProduct(&$product_info, &$product_group_ids) {
        $query = $this->connection->prepare("UPDATE Product 
            SET name = ?, description = ?, unit_price = ?
            WHERE product_id = ?;");
        $query->execute(array($product_info["name"],
            $product_info["description"], $product_info["unit_price"], $product_info["product_id"]));
        $this->removeProductFromAllGroups($product_info["product_id"]);
        $this->addProductInGroup($product_info["product_id"], $product_group_ids);
        return $this->getProduct($product_info["product_id"]);
    }

    public function saveNewProduct(&$product_info, &$product_group_ids) {
        $query = $this->connection->prepare("INSERT INTO Product
            (name, description, unit_price) VALUES (?, ?, ?);");
        $query->execute(array($product_info["name"],
            $product_info["description"], $product_info["unit_price"]));
        $query2 = $this->connection->prepare("SELECT currval(pg_get_serial_sequence('Product', 'product_id'));");
        $query2->execute();
        $idRow = $query2->fetch();
        $id = $idRow[0];
        $this->addProductInGroup($id, $product_group_ids);
        return $this->getProduct($id);
    }

    public function addProductInGroup($product_id, $product_group_ids) {
        $query = $this->connection->prepare("INSERT INTO Product_in_group 
            (product_id, product_group_id) VALUES (?, ?);");
        foreach ($product_group_ids as $group_id) {
            $query->execute(array($product_id, $group_id));
        }
    }

}

?>
