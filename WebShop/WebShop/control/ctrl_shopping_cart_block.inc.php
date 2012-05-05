<?php
/**
 * Controller for shopping cart block in navigation bar.
 *
 * @author markus
 */
class ShoppingCartBlockController {
    
    /**
     *Returns number of product in shopping cart object saved in session table.
     * @return type 
     */
    public function getNumberOfProductsIncart(){
        $cart = $_SESSION["shopping_cart"];
        return $cart->getNumberOfProducts();
    }
}

?>
