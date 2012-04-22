<?php
require_once 'lib/base.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//        $eval = new Evaluation();
        $productInfo["unit_price"] = "45 645,00€";
//        if ($eval->checkMonetaryValue($productInfo["unit_price"])){
//            echo '5';
//        }
        $trim = new Trimmer();
        echo $trim->moneyToDecimal($productInfo["unit_price"]);
        
        ?>
    </body>
</html>
