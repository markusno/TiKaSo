<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ctrl_shopping_cart_block
 *
 * @author markus
 */
class ShoppingCartBlockController {
    //put your code here
    public function getNumberOfProductsIncart(){
        $cart = $_SESSION["shopping_cart"];
        return $cart->getNumberOfProducts();
    }
}

?>
