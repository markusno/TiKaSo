<?php

/**
 * Class for accessing product group information in database.
 *
 * @author markus
 */
class Product_groupDAO {

    //put your code here
    private $connection;

    /**
     *Assigns PDO object given as parameter to be used by functions.
     * @param PDO $connection 
     */
    public function __construct(&$connection) {
        $this->connection = &$connection;
    }
    
    /**
     *Gets information of all product groups in database.
     * Returns product group objects in array.
     * @return \Product_group 
     */
    public function getProductGroupList() {
        $query = $this->connection->prepare("SELECT * FROM Product_group;");
        $query->execute();
        $product_goups = array();
        while ($row = $query->fetch()) {
            $product_goups[$row["product_group_id"]] = new Product_group($row);
        }
        return $product_goups;
    }

    /**
     *Gets information in which groups one product belongs.
     * Returns product group ids in array.
     * @param numeric $product_id
     * @return array 
     */
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

    /**
     *Gets information of one product group from database.
     * Returns product group object.
     * @param type $product_group_id
     * @return \Product_group 
     */
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
