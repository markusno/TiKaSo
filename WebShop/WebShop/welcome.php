<?php
require_once 'control/ctrl_welcome.inc.php';
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
        ?>
        Tervetuloa <br>
        <?php
        echo $customer_name;
        ?>
        
        <?php
        include_once 'parts/footer.php';
        ?>
    </body>
</html>
