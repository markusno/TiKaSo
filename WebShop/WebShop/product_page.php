<?php
require_once 'control/ctrl_product_page.inc.php';
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
                <p class="message"><?php echo $control->getMessages(); ?></p>
            <h1 class ="content_heading"id="product_heading">
                <?php echo $control->getProductName(); ?>
            </h1>
            <p class="description" id="product_description">
                <?php echo $control->getProductDescription(); ?>
            </p>
            <p id="price">
                <?php echo $control->getProductPrice(); ?>
            </p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                  method="post">
                <input type="text" name="amount" size="4" value="1"/>
                <input type="hidden" name="product_id" value ="
                       <?php echo $control->getProductID() ?>"/>
                <input type="submit" name="add_to_cart" value="Lisää ostoskoriin"/>
            </form>
            </div>
        </div>
        <?php
        include_once 'parts/footer.php';
        ?>
    </body>
</html>
