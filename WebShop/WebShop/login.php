<?php
require_once 'control/ctrl_login.inc.php';
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
        <div class="content_container">
        <div class="content">
        <p class="error_message">
            <?php
            echo $control->getMessages();
            ?>
        </p>
        <?php include_once 'parts/login_form.php'; ?>
        </div>
        </div> 
        <?php
        include_once 'parts/footer.php';
        ?>
    </body>
</html>
