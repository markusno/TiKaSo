<?php
require_once 'control/ctrl_shopping_cart_block.inc.php';
$cartBlockController = new ShoppingCartBlockController();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="shopping_cart_block">
    <a href="shopping_cart.php">Ostoskori: 
        <?php echo $cartBlockController->getNumberOfProductsIncart(); ?></a>
</div>
