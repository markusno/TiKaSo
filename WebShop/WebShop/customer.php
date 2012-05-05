<?php
require_once 'control/ctrl_base_controller.inc.php';
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
        ?>
        <div class="content_container">
            <div class="content">
                <a href="customer_info.php">Asiakas tiedot</a>
                <a href="customer_order.php">Tilaukset</a>
            </div>
        </div>
        <?php
        include_once 'parts/footer.php';
        ?>
    </body>
</html>
