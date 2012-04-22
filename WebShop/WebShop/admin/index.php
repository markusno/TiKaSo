<?php
require_once 'control/ctrl_admin_index_login.php';
$control = new PageController();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div class="error_message">
        <?php echo $control->getMessages() ?>
        </div>
        <?php
        include_once 'parts/admin_login.php';
        ?>
    </body>
</html>
