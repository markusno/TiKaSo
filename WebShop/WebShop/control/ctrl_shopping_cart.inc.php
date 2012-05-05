<?php

require_once 'control/ctrl_base_controller.inc.php';
/**
 * Page controller for shopping cart page.
 *
 * @author markus
 */
class PageController extends BasePageController {

    //put your code here
    private $shopping_cart;
    private $product_dao;
    
    /**
     *Handles information in post table from shopping cart form. 
     */
    public function __construct() {
        parent::__construct();
        $dbObject = new DBConnection();
        $connection = $dbObject->getConnetion();
        $this->product_dao = new ProductDAO($connection);
        $this->shopping_cart = $_SESSION['shopping_cart'];
        if (isset($_POST["checkout"])){
            $this->checkout();
        }
        if (isset($_POST["remove"])){
            $this->removeProduct();
        }
        if (isset($_POST["decrease"])){
            $this->decreaseProductAmount();
        }
        if (isset($_POST["increase"])){
            $this->increaseProductAmount();
        }
        if (isset($_POST["empty"])){
            $this->emptyCart();
        }
        $_SESSION['shopping_cart'] = $this->shopping_cart;
    }
    
    private function checkout(){
        if($this->shopping_cart->getNumberOfProducts() == 0){
            $this->messages[] = SHOPPING_CART_EMPTY;
            return;
        }
        header("location: checkout.php");
    }


    private function emptyCart(){
        $this->shopping_cart = new Shopping_cart();
    }
    
    private function decreaseProductAmount(){
        $product_id;
        foreach ($_POST["decrease"] as $id => $value) {
            $product_id = $id;
        }
        $this->shopping_cart->decreaseAmount($product_id);
    }
    
    private function increaseProductAmount(){
        $product_id;
        foreach ($_POST["increase"] as $id => $value) {
            $product_id = $id;
        }
        $this->shopping_cart->increaseAmount($product_id);
    }
    
    private function removeProduct(){
        $product_id;
        foreach ($_POST["remove"] as $id => $value) {
            $product_id = $id;
        }
        $this->shopping_cart->removeProduct($product_id);
    }
    
    private function getProductsInCart($shoppings) {
        $products = array();
        foreach ($shoppings as $product_id => $value) {
            $products[$product_id] = $this->product_dao->getProduct($product_id);
        }
        return $products;
    }

    /**
     *Builds html table rows and columns from shoppings in cart.
     * @return html table rows and columns
     */
    public function getShoppingsList() {
        $shoppings = $this->shopping_cart->getShoppings();
        $products = $this->getProductsInCart($shoppings);
        $shoppingsList = "";
        $whole_price;
        foreach ($products as $product_id => $product) {
            $price = (double)$product->getPrice() * (int)$shoppings[$product_id];
            $whole_price = $whole_price + $price;
            $shoppingsList = $shoppingsList . "<tr><td>" . $product_id . "</td>"
                    . "<td> <a href=\"product.php?id=" . $product_id . "\">" .
                    $product->getName() . "</a> </td>"                     
                    . "<td> <input type = \"submit\" 
                        name = \"decrease[". $product_id."]\" value = \"-\"/></td>"
                    . "<td>".$shoppings[$product_id]."</td>"
                    . "<td> <input type = \"submit\" 
                        name = \"increase[". $product_id."]\" value = \"+\"/>"
                    . "<td> <input type = \"submit\" 
                        name = \"remove[". $product_id."]\" value = \"X\"/>"
                    ."<td>". $price ." €</td>"
                    ."</tr>";
        }
        $shoppingsList = $shoppingsList . "<tr><td></td><td></td><td></td>
            <td>".  array_sum($shoppings)."</td><td></td><td></td>
                <td>".$whole_price." €</td></tr>";
        return $shoppingsList;
    }

}

?>
