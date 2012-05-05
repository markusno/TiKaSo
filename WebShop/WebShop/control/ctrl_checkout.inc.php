<?php

require_once 'control/ctrl_base_controller.inc.php';
/**
 * Page controller for checkout page.
 *
 * @author markus
 */
class PageController extends BasePageController {

    //put your code here
    private $customer;
    private $product_dao;
    private $customer_order_dao;
    private $products_in_cart;
    private $shoppings;

    /**
     *Handles information in post table from check out form.
     * 
     */
    public function __construct() {
        parent::__construct();
        $shopping_cart = $_SESSION["shopping_cart"];
        $this->customer = $_SESSION["customer"];
        $dbObject = new DBConnection();
        $connection = $dbObject->getConnetion();
        $this->product_dao = new ProductDAO($connection);
        $this->customer_order_dao = new Customer_orderDAO($connection);
        if (isset($_POST["empty"])) {
            $this->emptyCart();
            header("location: index.php");
        }
        if ($shopping_cart->getNumberOfProducts() == 0) {
            header("location: index.php");
        }
        $this->getProductsInCart($shopping_cart);
        if ($this->customer->getID() == 0) {
            $this->messages[] = NOT_LOGGED;
            return;
        }
        if (isset($_POST["make_order"])) {
            $this->makeOrder();
        }
    }

    private function makeOrder() {
        $order_id = $this->customer_order_dao->
                makeOrder($this->customer->getID(), $this->shoppings);
        if ($order_id != NULL && $order_id > 0) {
            $emailObject = new Email_logic();
            $emailObject->send_order_confirmation
                    ($this->customer, $order_id, $this->getOrderInfoForMail());
            $this->emptyCart();
            header("location: order_confirmation.php?id=".$order_id);
        } else {
            $this->messages[] = ORDER_NOT_SAVED;
        }
    }

    private function emptyCart() {
        $_SESSION["shopping_cart"] = new Shopping_cart();
    }

    private function getProductsInCart(&$shopping_cart) {
        $shoppings = $shopping_cart->getShoppings();
        $products = array();
        foreach ($shoppings as $product_id => $value) {
            $products[$product_id] = $this->product_dao->getProduct($product_id);
        }
        $this->shoppings = $shoppings;
        $this->products_in_cart = $products;
    }

    /**
     *Getter for information of currently logged in customer.
     * If no customer is logged returns links to login and registeration pages.
     * @return customer info as html string (</br> used as line break).
     */
    public function getCustomerInfo() {
        if ($this->customer->getID() == 0) {
            return '<a href="login.php">Kirjaudu sisään</a> || <a href="register.php">Rekisteröidy</a>';
        }
        return $this->customer->toHTMLString();
    }

    /**
     *Getter for price of the whole shopping cart.
     * @return price as double 
     */
    public function getPrice() {
        $price;
        foreach ($this->products_in_cart as $product_id => $product) {
            $shopping_price = (double) $product->getPrice() * (int) $this->shoppings[$product_id];
            $price = $price + $shopping_price;
        }
        return $price;
    }

    /**
     *Getter for information of products in shopping cart.
     * If no shoppings are made returns empty string.
     * @return order info as html string (</br> used as line break).
     */
    public function getOrderInfo() {
        $orderInfo = "";
        foreach ($this->products_in_cart as $product_id => $product) {
            $price = (double) $product->getPrice() * (int) $this->shoppings[$product_id];
            $orderInfo = $orderInfo
                    . $this->shoppings[$product_id] . " "
                    . $product->getName() . " "
                    . $price . " €<br/>";
        }
        return $orderInfo;
    }
    
    private function getOrderInfoForMail() {
        $orderInfo = "";
        foreach ($this->products_in_cart as $product_id => $product) {
            $price = (double) $product->getPrice() * (int) $this->shoppings[$product_id];
            $orderInfo = $orderInfo
                    . $this->shoppings[$product_id] . " "
                    . $product->getName() . " "
                    . $price . " €\n";
        }
        return $orderInfo;
    }

}

?>
