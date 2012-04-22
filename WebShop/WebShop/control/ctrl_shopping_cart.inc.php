<?php

require_once 'control/ctrl_base_controller.inc.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ctrl_shopping_cart
 *
 * @author markus
 */
class PageController extends BasePageController {

    //put your code here
    private $shopping_cart;
    private $product_dao;

    public function __construct() {
        parent::__construct();
        $dbObject = new DBConnection();
        $connection = $dbObject->getConnetion();
        $this->product_dao = new ProductDAO($connection);
        $this->shopping_cart = $_SESSION['shopping_cart'];
    }

    private function getProductsInCart($shoppings) {
        $products = array();
        foreach ($shoppings as $product_id => $value) {
            $products[$product_id] = $this->product_dao->getProduct($product_id);
        }
        return $products;
    }

    public function getShoppingsList() {
        $shoppings = $this->shopping_cart->getShoppings();
        $products = $this->getProductsInCart($shoppings);
        $shoppingsList = "";
        foreach ($products as $product_id => $product) {
            $shoppingsList = $shoppingsList . "<tr><td>" . $product_id . "</td>"
                    . "<td> <a href=\"product.php?id=" . $product_id . "\">" .
                    $product->getName() . "</a> </td>" 
                    . "<td>".$shoppings[$product_id]."</td>" ."</tr>";
        }
        return $shoppingsList;
    }

}

?>
