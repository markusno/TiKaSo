<?php
require_once 'control/ctrl_welcome.inc.php';
$control = new PageController();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once $header;
        include_once 'parts/site-navi.php';
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
