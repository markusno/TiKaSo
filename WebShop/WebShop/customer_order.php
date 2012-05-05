<?php
require_once 'control/ctrl_customer_order.inc.php';
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
                <p class="error_message">
                    <?php echo $control->getMessages(); ?>
                </p>
                
                <form action ="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>"
                      method ="post">
                    <fieldset>
                        <legend>Tilaukset</legend>
                    <table>
                        <th>Tilausnumero</th><th>Maksettu</th>
                        <th>Suunniteltu toimitus</th><th>Toimitettu</th>
                        <?php echo $control->getOrdersList(); ?>
                    </table>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo $control->getOrderID(); ?></legend>
                        <?php echo $control->getOrderInfo(); ?>
                    </fieldset>                        
                </form>

            </div>
        </div>
        <?php
        include_once 'parts/footer.php';
        ?>
    </body>
</html>
