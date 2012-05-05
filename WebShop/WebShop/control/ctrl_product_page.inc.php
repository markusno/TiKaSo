<?php
/**
 *Page controller for product page.
 *  
 */
require_once 'control/ctrl_base_controller.inc.php';

class PageController extends BasePageController {

    private $product;
    
    /**
     * Uses information from get table to get information from apropriate product.
     */
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
    
    /**
     *Returns name of current product.
     * @return name as string. 
     */
    public function getProductName(){
        return $this->product->getName();
    }
    
    /**
     *Returns id of current product.
     * @return id as string. 
     */
    public function getProductID(){
        return $this->product->getID();
    }
    
    /**
     *Returns description of current product.
     * @return descrition as string. 
     */
    public function getProductDescription(){
        return $this->product->getDescription();
    }
    
    /**
     *Returns unit price of current product.
     * @return unit price as string. 
     */
    public function getProductPrice(){
        return $this->product->getPrice();
    }
}
?>
