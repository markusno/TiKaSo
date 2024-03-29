<?php
require_once 'control/ctrl_product_group_page.inc.php';
$control = new PageController();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style/web_shop_style.css" />
        <title></title>
    </head>
    <body>
        <?php
        include_once 'parts/header.php';
        include_once 'parts/site_navi.php';
        include_once 'parts/product_navi.php';
        // put your code here
        ?>
        <div class="content_container">
            <div class="content">
            <h1 class ="content_heading"id="group_heading">
                <?php echo $control->getProductGroupTitle(); ?>
            </h1>
            <p class="description" id="group_description">
                <?php echo $control->getProductGroupDescription(); ?>
            </p>
            <p id="product_list">
                <?php echo $control->getProductList(); ?>
            </p>
            </div>
        </div>
        <?php
        include_once 'parts/footer.php';
        ?>
    </body>
</html>
