<?php

require_once 'control/ctrl_base_controller.inc.php';

class PageController extends BasePageController {

    private $product_dao;
    private $product_group_dao;
    private $product_group;


    public function __construct() {
        parent::__construct();
        $dbObject = new DBConnection();
        $connection = $dbObject->getConnetion();
        $this->product_dao = new ProductDAO($connection);
        $this->product_group_dao = new Product_groupDAO($connection);
        if (isset($_GET["id"])) {
            $this->product_group = $this->getProductGroup($_GET["id"]);
        } else {
            $this->product_group = $this->getProductGroup(1);
        }
    }

    private function getProductGroup($group_id) {
        return $this->product_group_dao->getProductGroup($group_id);
    }
    
    private function getProductsInGroup() {
        return $this->product_dao->getProductsInGroup($this->product_group->getID());
    }
    
    public function getProductGroupTitle(){
        return $this->product_group->getName();
    }
    
    public function getProductGroupDescription(){
        return $this->product_group->getDescription();
    }
    
    public function getProductList() {
        $products_in_group = $this->getProductsInGroup();
        $product_list = "";
        foreach ($products_in_group as $product) {
            if ($product->getVisibility()) {
                $product_list = $product_list . "<a href=\"product_page.php?id=" .
                        $product->getID() . "\">" . $product->getName() . "</a> " .
                        $product->getPrice()."<br>";
            }
        }
        return $product_list;
    }

}

?>
