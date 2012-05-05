<?php

/**
 * Class for accessing product information in database
 *
 * @author markus
 */
class ProductDAO {

    //put your code here

    private $connection;

    /**
     *Assigns PDO object given as parameter to be used by functions.
     * @param PDO $connection 
     */
    public function __construct(&$connection) {
        $this->connection = &$connection;
    }

    /**Gets information of one product from database.
     * Returns product object.
     *
     * @param numeric $product_ID
     * @return \Product 
     */
    public function getProduct($product_ID) {
        $query = $this->connection->prepare("SELECT * 
            FROM Product
            WHERE product_id = ?");
        $query->execute(array($product_ID));
        $product_info = $query->fetch();
        $product = new Product($product_info);
        return $product;
    }
    
    /**
     *Gets information of all products in database.
     * Returns product objects in array. 
     * @return array 
     */
    public function getAllProducts() {
        $query = $this->connection->prepare("SELECT * FROM Product;");
        $query->execute();
        $all_products = array();
        while ($product_info = $query->fetch()) {
            $all_products[] = new Product($product_info);
        }
        return $all_products;
    }

    /**
     **Gets information of all products in one product group in database.
     * Returns product objects in array.
     * @param numeric $product_group_ID
     * @return array
     */
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

    private function removeProductFromAllGroups($product_id){
        $query = $this->connection->prepare("DELETE FROM Product_in_group
            WHERE product_id = ?;");
        $query->execute(array($product_id));
    }
    
    /**
     *Updates information of existing product in database and.
     * @param type $product_info
     * @param type $product_group_ids
     * @return /Product
     */
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

    /**
     *Inserts new row into product table in database.
     * @param array $product_info
     * @param array $product_group_ids
     * @return numeric $id 
     */
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

    private function addProductInGroup($product_id, $product_group_ids) {
        $query = $this->connection->prepare("INSERT INTO Product_in_group 
            (product_id, product_group_id) VALUES (?, ?);");
        foreach ($product_group_ids as $group_id) {
            $query->execute(array($product_id, $group_id));
        }
    }

}

?>
