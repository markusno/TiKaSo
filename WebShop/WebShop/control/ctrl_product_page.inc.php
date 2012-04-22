<?php

require_once 'control/ctrl_base_controller.inc.php';

class PageController extends BasePageController {

    private $product;
    
    public function __construct() {
        parent::__construct();
        $dbObject = new DBConnection();
        $connection = $dbObject->getConnetion();
        $product_dao = new ProductDAO($connection);
        if (isset($_POST["product_id"])){
            $this->addProductToCart();
            $this->product = $product_dao->getProduct($_POST["product_id"]);
        }
        else if (isset($_GET["id"])) {
            $this->product = $product_dao->getProduct($_GET["id"]);
        } else {
            $this->product = $product_dao->getProduct(1);
        }
        if (!$this->product->getVisibility()){
            header('location: index.php');
        }
    }
    
    private function addProductToCart(){
        if (!is_numeric($_POST["amount"]) || $_POST["amount"] < 2){
            $amount = 1;
        } else {
            $amount = (int)$_POST["amount"];
        }
        $cart = $_SESSION['shopping_cart'];
        $cart->addToCart($_POST["product_id"], $amount);
        $_SESSION['shopping_cart'] = $cart;
        $this->messages[] = PRODUCT_ADDED; 
    }
    
    public function getProductName(){
        return $this->product->getName();
    }
    
    public function getProductID(){
        return $this->product->getID();
    }
    
    public function getProductDescription(){
        return $this->product->getDescription();
    }
    
    public function getProductPrice(){
        return $this->product->getPrice();
    }
}
?>
