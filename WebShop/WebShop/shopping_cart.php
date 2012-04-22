<?php
require_once 'control/ctrl_shopping_cart.inc.php';
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

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                      method ="post">
                    <table border="1">
                        <tr>
                            <th>Id</th><th>Nimi</th><th>Määrä</th>
                            <th>Vähennä</th><th>Lisää</th><th>Poista</th>
                        </tr>
                        <?php echo $control->getShoppingsList(); ?>
                    </table>
                </form>

            </div>
        </div>
        <?php
        include_once 'parts/footer.php';
        ?>
    </body>
</html>