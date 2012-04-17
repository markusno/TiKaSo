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
        include_once $header;
        include_once 'parts/site_navi.php';
        ?>
        <div class="content">
        <p class="error_message">
            <?php
            echo $control->getMessages();
            ?>
        </p>
        <div id ="login">
            <form action="<?php echo htmlspecialchars($PHP_SELF) ?>" method="post">
                Käyttäjänimi: <input type="text" name="user_name"> <br>
                Salasana: <input type="password" name="password"> <br>
                <input type="submit" name="login" value="Kirjaudu">
            </form>
        </div>
        </div>
        <?php
        include_once 'parts/footer.php';
        ?>
    </body>
</html>
