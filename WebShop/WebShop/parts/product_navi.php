<?php
require_once 'control/ctrl_product_navi.inc.php';
$product_navi_controller = new ProductNaviController();
?>
<div id="product_navi">
    
    <?php echo $product_navi_controller->getNavigation(); ?>
    
</div>
