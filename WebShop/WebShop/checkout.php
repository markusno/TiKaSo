<?php
require_once 'control/ctrl_checkout.inc.php';
$control = new PageController();
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
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
                <p class="error_message">
                    <?php echo $control->getMessages(); ?>
                </p>
                <fieldset>
                    <legend>
                        Asiakas tiedot:
                    </legend>
                    <p id="order_info">
                        <?php echo $control->getCustomerInfo(); ?>
                    </p>
                </fieldset>
                </br>
                <fieldset>
                    <legend>
                        Tilauksen tiedot:
                    </legend>
                    <p id="order_info">
                        <?php echo $control->getOrderInfo(); ?> </br>
                        Yhteensä: <?php echo $control->getPrice(); ?> €
                    </p>
                </fieldset>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                      method ="post">
                    <input type="submit" name="empty" value="Tyhjennä ostoskori"/>
                    <input type="submit" name="make_order" value="Tilaa"/>
                </form>

            </div>
        </div>
        <?php
        include_once 'parts/footer.php';
        ?>
    </body>
</html>
