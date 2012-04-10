<?php
require_once 'control/ctrl_product_navi.inc.php';
$product_navi_controller = new ProductNaviController();
var_dump($product_navi_controller);
?>
<div id="product_navi">
    
    <?php echo $product_navi_controller->getNavigation(); ?>
    
</div>
