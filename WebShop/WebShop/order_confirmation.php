<?php
require_once 'control/ctrl_order_confirmation.inc.php';
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
                <h3>
                    Kiitoksia tilauksesta!                    
                </h3>
                
                <p>
                    Olemme vastaanottaneet tilauksenne numerolla: <?php echo $_GET["id"]; ?>.
                    </br>Ilmoittamaanne sähköpostiosoitteeseen on lähetetty tilausvahvistus. 
                    Mikäli tilausvahvistus ei näy sähköpostissanne muutaman tunnin kuluessa 
                    olkaa yhteydessä asiakaspalveluumme.
                </p>
            </div>
        </div>
        <?php
        include_once 'parts/footer.php';
        ?>
    </body>
</html>

